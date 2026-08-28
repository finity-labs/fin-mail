<?php

declare(strict_types=1);

use FinityLabs\FinMail\Helpers\TokenReplacer;
use FinityLabs\FinMail\Helpers\TokenValue;
use Illuminate\Database\Eloquent\Model;

beforeEach(function () {
    config()->set('fin-mail.tokens.open', '{{');
    config()->set('fin-mail.tokens.close', '}}');
    config()->set('fin-mail.tokens.allowed_config_keys', ['app.name', 'app.url']);
    config()->set('app.name', 'TestApp');
    config()->set('app.url', 'https://testapp.com');
});

it('replaces simple model tokens', function () {
    $replacer = new TokenReplacer;

    $user = new class extends Model
    {
        protected $attributes = ['name' => 'John Doe', 'email' => 'john@example.com'];
    };

    $result = $replacer->replace('Hello {{ user.name }}, your email is {{ user.email }}', ['user' => $user]);

    expect($result)->toBe('Hello John Doe, your email is john@example.com');
});

it('replaces config tokens', function () {
    $replacer = new TokenReplacer;

    $result = $replacer->replace('Welcome to {{ config.app.name }}');

    expect($result)->toBe('Welcome to TestApp');
});

it('blocks disallowed config keys', function () {
    $replacer = new TokenReplacer;

    $result = $replacer->replace('Secret: {{ config.database.password }}');

    expect($result)->toBe('Secret: {{ config.database.password }}');
});

it('replaces tokens with fallback values', function () {
    $replacer = new TokenReplacer;

    $result = $replacer->replace("Hello {{ user.name | 'Valued Customer' }}", []);

    expect($result)->toBe('Hello Valued Customer');
});

it('uses model value over fallback', function () {
    $replacer = new TokenReplacer;

    $user = new class extends Model
    {
        protected $attributes = ['name' => 'Jane'];
    };

    $result = $replacer->replace("Hello {{ user.name | 'Valued Customer' }}", ['user' => $user]);

    expect($result)->toBe('Hello Jane');
});

it('handles conditional blocks — truthy', function () {
    $replacer = new TokenReplacer;

    $user = new class extends Model
    {
        protected $attributes = ['is_premium' => true];
    };

    $result = $replacer->replace(
        '{% if user.is_premium %}You are premium!{% endif %}',
        ['user' => $user]
    );

    expect($result)->toBe('You are premium!');
});

it('handles conditional blocks — falsy', function () {
    $replacer = new TokenReplacer;

    $user = new class extends Model
    {
        protected $attributes = ['is_premium' => false];
    };

    $result = $replacer->replace(
        '{% if user.is_premium %}You are premium!{% endif %}',
        ['user' => $user]
    );

    expect($result)->toBe('');
});

it('handles if/else conditionals', function () {
    $replacer = new TokenReplacer;

    $user = new class extends Model
    {
        protected $attributes = ['is_premium' => false];
    };

    $result = $replacer->replace(
        '{% if user.is_premium %}Premium{% else %}Free{% endif %}',
        ['user' => $user]
    );

    expect($result)->toBe('Free');
});

it('handles top-level tokens without dot notation', function () {
    $replacer = new TokenReplacer;

    $result = $replacer->replace(
        'Click here: {{ url }}',
        ['url' => TokenValue::make('https://example.com/verify')]
    );

    expect($result)->toBe('Click here: https://example.com/verify');
});

it('handles array models', function () {
    $replacer = new TokenReplacer;

    $result = $replacer->replace(
        'Order #{{ order.number }}',
        ['order' => ['number' => 'INV-001', 'total' => 100]]
    );

    expect($result)->toBe('Order #INV-001');
});

it('leaves unresolved tokens unchanged', function () {
    $replacer = new TokenReplacer;

    $result = $replacer->replace('Hello {{ unknown.token }}', []);

    expect($result)->toBe('Hello {{ unknown.token }}');
});

it('extracts token keys from content', function () {
    $tokens = TokenReplacer::extractTokens(
        'Hello {{ user.name }}, your order {{ order.number }} at {{ config.app.name }}'
    );

    expect($tokens)->toContain('user.name', 'order.number', 'config.app.name');
});

it('extracts tokens and strips fallbacks', function () {
    $tokens = TokenReplacer::extractTokens(
        "Hello {{ user.name | 'Customer' }}"
    );

    expect($tokens)->toBe(['user.name']);
});

it('handles whitespace in tokens gracefully', function () {
    $replacer = new TokenReplacer;

    $user = new class extends Model
    {
        protected $attributes = ['name' => 'John'];
    };

    $result = $replacer->replace('Hello {{  user.name  }}', ['user' => $user]);

    expect($result)->toBe('Hello John');
});

it('handles date casting', function () {
    $replacer = new TokenReplacer;

    $result = $replacer->replace(
        'Created: {{ order.date }}',
        ['order' => ['date' => new DateTime('2026-02-25')]]
    );

    expect($result)->toBe('Created: Feb 25, 2026');
});

it('handles nested conditionals in the truthy branch', function () {
    $replacer = new TokenReplacer;

    $user = new class extends Model
    {
        protected $attributes = ['is_premium' => true, 'has_invoice' => true];
    };

    $result = $replacer->replace(
        '{% if user.is_premium %}Premium{% if user.has_invoice %} with invoice{% endif %}{% endif %}',
        ['user' => $user],
    );

    expect($result)->toBe('Premium with invoice');
});

it('drops nested conditional content when the outer condition is falsy', function () {
    $replacer = new TokenReplacer;

    $user = new class extends Model
    {
        protected $attributes = ['is_premium' => false, 'has_invoice' => true];
    };

    $result = $replacer->replace(
        'Start{% if user.is_premium %}Premium{% if user.has_invoice %} with invoice{% endif %}{% endif %}End',
        ['user' => $user],
    );

    expect($result)->toBe('StartEnd');
});

it('handles else branches on both outer and nested levels', function () {
    $replacer = new TokenReplacer;

    $user = new class extends Model
    {
        protected $attributes = ['is_premium' => true, 'has_invoice' => false];
    };

    $result = $replacer->replace(
        '{% if user.is_premium %}{% if user.has_invoice %}Invoice{% else %}No invoice{% endif %}{% else %}Free{% endif %}',
        ['user' => $user],
    );

    expect($result)->toBe('No invoice');
});

it('handles a nested conditional inside an else branch', function () {
    $replacer = new TokenReplacer;

    $user = new class extends Model
    {
        protected $attributes = ['is_premium' => false, 'is_trial' => true];
    };

    $result = $replacer->replace(
        '{% if user.is_premium %}Premium{% else %}{% if user.is_trial %}Trial{% else %}Free{% endif %}{% endif %}',
        ['user' => $user],
    );

    expect($result)->toBe('Trial');
});

it('handles sibling conditionals independently', function () {
    $replacer = new TokenReplacer;

    $user = new class extends Model
    {
        protected $attributes = ['is_premium' => true, 'has_invoice' => false];
    };

    $result = $replacer->replace(
        '{% if user.is_premium %}A{% endif %}-{% if user.has_invoice %}B{% endif %}-C',
        ['user' => $user],
    );

    expect($result)->toBe('A--C');
});

it('handles deeply nested conditionals without a depth limit', function () {
    $replacer = new TokenReplacer;

    $user = new class extends Model
    {
        protected $attributes = ['is_premium' => true];
    };

    $depth = 25;
    $content = str_repeat('{% if user.is_premium %}', $depth).'Core'.str_repeat('{% endif %}', $depth);

    expect($replacer->replace($content, ['user' => $user]))->toBe('Core');
});

it('leaves an unclosed conditional visible instead of dropping content', function () {
    $replacer = new TokenReplacer;

    $user = new class extends Model
    {
        protected $attributes = ['is_premium' => true];
    };

    $result = $replacer->replace(
        'Before {% if user.is_premium %}Premium after',
        ['user' => $user],
    );

    expect($result)->toBe('Before {% if user.is_premium %}Premium after');
});

it('leaves stray else and endif tags visible', function () {
    $replacer = new TokenReplacer;

    expect($replacer->replace('A {% endif %} B {% else %} C'))
        ->toBe('A {% endif %} B {% else %} C');
});
