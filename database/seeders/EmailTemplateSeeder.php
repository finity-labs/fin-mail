<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Database\Seeders;

use FinityLabs\FinMail\Models\EmailTemplate;
use FinityLabs\FinMail\Models\EmailTheme;
use FinityLabs\FinMail\Settings\GeneralSettings;
use Illuminate\Database\Seeder;

class EmailTemplateSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedDefaultTheme();
        $this->seedTemplates();
    }

    protected function seedDefaultTheme(): void
    {
        EmailTheme::firstOrCreate(
            ['name' => 'Default'],
            [
                'colors' => EmailTheme::defaultColors(),
                'is_default' => true,
            ]
        );
    }

    protected function seedTemplates(): void
    {
        $theme = EmailTheme::where('is_default', true)->first();
        $configuredLocales = $this->getConfiguredLocales();
        $templates = $this->getTemplateDefinitions();

        foreach ($templates as $data) {
            $filtered = $data;

            foreach (['name', 'subject', 'preheader', 'body'] as $field) {
                $filtered[$field] = array_intersect_key(
                    $data[$field],
                    array_flip($configuredLocales)
                );

                // Fallback: ensure at least one locale has content
                if (empty($filtered[$field])) {
                    $fallbackLocale = $configuredLocales[0] ?? 'en';
                    $filtered[$field] = [
                        $fallbackLocale => $data[$field]['en'] ?? reset($data[$field]),
                    ];
                }
            }

            EmailTemplate::firstOrCreate(
                ['key' => $filtered['key']],
                array_merge($filtered, [
                    'email_theme_id' => $theme?->id,
                    'is_active' => true,
                    'is_locked' => $data['is_locked'] ?? false,
                ])
            );
        }
    }

    /**
     * @return array<int, string>
     */
    protected function getConfiguredLocales(): array
    {
        try {
            $languages = app(GeneralSettings::class)->languages;

            return array_column($languages, 'code');
        } catch (\Throwable) {
            return [app()->getLocale()];
        }
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    protected function getTemplateDefinitions(): array
    {
        return [
            $this->welcomeTemplate(),
            $this->verifyEmailTemplate(),
            $this->passwordResetTemplate(),
            $this->passwordChangedTemplate(),
            $this->generalNotificationTemplate(),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    protected function welcomeTemplate(): array
    {
        return [
            'key' => 'user-welcome',
            'is_locked' => true,
            'name' => [
                'en' => 'Welcome New User',
                'de' => 'Neuen Benutzer begrüßen',
                'hu' => 'Új felhasználó üdvözlése',
            ],
            'category' => 'system',
            'subject' => [
                'en' => 'Welcome to {{ config.app.name }}, {{ user.name }}!',
                'de' => 'Willkommen bei {{ config.app.name }}, {{ user.name }}!',
                'hu' => 'Üdvözöljük a {{ config.app.name }}-nál, {{ user.name }}!',
            ],
            'preheader' => [
                'en' => "We're glad you're here.",
                'de' => 'Wir freuen uns, dass Sie hier sind.',
                'hu' => 'Örülünk, hogy itt van.',
            ],
            'body' => [
                'en' => <<<'HTML'
<h2>Welcome aboard, {{ user.name }}!</h2>
<p>Thanks for joining <strong>{{ config.app.name }}</strong>. We're excited to have you.</p>
<p>Here are a few things you can do to get started:</p>
<ul>
    <li>Complete your profile</li>
    <li>Explore the dashboard</li>
    <li>Check out our documentation</li>
</ul>
<p>If you have any questions, just reply to this email — we're here to help.</p>
<p>Cheers,<br>The {{ config.app.name }} Team</p>
HTML,
                'de' => <<<'HTML'
<h2>Willkommen an Bord, {{ user.name }}!</h2>
<p>Vielen Dank, dass Sie sich bei <strong>{{ config.app.name }}</strong> registriert haben. Wir freuen uns, Sie dabei zu haben.</p>
<p>Hier sind einige Dinge, die Sie zum Einstieg tun können:</p>
<ul>
    <li>Vervollständigen Sie Ihr Profil</li>
    <li>Erkunden Sie das Dashboard</li>
    <li>Lesen Sie unsere Dokumentation</li>
</ul>
<p>Bei Fragen antworten Sie einfach auf diese E-Mail — wir helfen Ihnen gerne.</p>
<p>Mit freundlichen Grüßen,<br>Das {{ config.app.name }} Team</p>
HTML,
                'hu' => <<<'HTML'
<h2>Üdvözöljük, {{ user.name }}!</h2>
<p>Köszönjük, hogy csatlakozott a <strong>{{ config.app.name }}</strong> szolgáltatáshoz. Örülünk, hogy itt van.</p>
<p>Íme néhány dolog, amivel elkezdheti:</p>
<ul>
    <li>Töltse ki a profilját</li>
    <li>Fedezze fel az irányítópultot</li>
    <li>Tekintse meg a dokumentációt</li>
</ul>
<p>Ha bármilyen kérdése van, egyszerűen válaszoljon erre az e-mailre — szívesen segítünk.</p>
<p>Üdvözlettel,<br>A {{ config.app.name }} csapata</p>
HTML,
            ],
            'token_schema' => [
                ['token' => 'user.name', 'description' => 'Full name of the registered user', 'example' => 'John Doe'],
                ['token' => 'user.email', 'description' => 'Email address of the user', 'example' => 'john@example.com'],
                ['token' => 'config.app.name', 'description' => 'Application name', 'example' => 'MyApp'],
            ],
        ];
    }

    /**
     * @return array<string, mixed>
     */
    protected function verifyEmailTemplate(): array
    {
        return [
            'key' => 'user-verify-email',
            'is_locked' => true,
            'name' => [
                'en' => 'Verify Email Address',
                'de' => 'E-Mail-Adresse bestätigen',
                'hu' => 'E-mail cím megerősítése',
            ],
            'category' => 'system',
            'subject' => [
                'en' => 'Verify your email address',
                'de' => 'Bestätigen Sie Ihre E-Mail-Adresse',
                'hu' => 'Erősítse meg az e-mail címét',
            ],
            'preheader' => [
                'en' => 'Please confirm your email to activate your account.',
                'de' => 'Bitte bestätigen Sie Ihre E-Mail, um Ihr Konto zu aktivieren.',
                'hu' => 'Kérjük, erősítse meg e-mail címét a fiókja aktiválásához.',
            ],
            'body' => [
                'en' => <<<'HTML'
<h2>Verify your email address</h2>
<p>Hi {{ user.name }},</p>
<p>Please click the button below to verify your email address.</p>
<div data-type="customBlock" data-id="emailButton" data-config="{&quot;label&quot;:&quot;Verify Email Address&quot;,&quot;url&quot;:&quot;{{ url }}&quot;,&quot;align&quot;:&quot;center&quot;}"></div>
<p>If you did not create an account, no further action is required.</p>
<p>Thanks,<br>{{ config.app.name }}</p>
HTML,
                'de' => <<<'HTML'
<h2>Bestätigen Sie Ihre E-Mail-Adresse</h2>
<p>Hallo {{ user.name }},</p>
<p>Bitte klicken Sie auf die Schaltfläche unten, um Ihre E-Mail-Adresse zu bestätigen.</p>
<div data-type="customBlock" data-id="emailButton" data-config="{&quot;label&quot;:&quot;E-Mail bestätigen&quot;,&quot;url&quot;:&quot;{{ url }}&quot;,&quot;align&quot;:&quot;center&quot;}"></div>
<p>Wenn Sie kein Konto erstellt haben, ist keine weitere Aktion erforderlich.</p>
<p>Mit freundlichen Grüßen,<br>{{ config.app.name }}</p>
HTML,
                'hu' => <<<'HTML'
<h2>Erősítse meg az e-mail címét</h2>
<p>Kedves {{ user.name }},</p>
<p>Kérjük, kattintson az alábbi gombra az e-mail címe megerősítéséhez.</p>
<div data-type="customBlock" data-id="emailButton" data-config="{&quot;label&quot;:&quot;E-mail megerősítése&quot;,&quot;url&quot;:&quot;{{ url }}&quot;,&quot;align&quot;:&quot;center&quot;}"></div>
<p>Ha nem Ön hozta létre a fiókot, nincs további teendője.</p>
<p>Üdvözlettel,<br>{{ config.app.name }}</p>
HTML,
            ],
            'token_schema' => [
                ['token' => 'user.name', 'description' => 'User name', 'example' => 'John Doe'],
                ['token' => 'url', 'description' => 'Verification URL', 'example' => 'https://example.com/verify/...'],
                ['token' => 'config.app.name', 'description' => 'Application name', 'example' => 'MyApp'],
            ],
        ];
    }

    /**
     * @return array<string, mixed>
     */
    protected function passwordResetTemplate(): array
    {
        return [
            'key' => 'user-password-reset',
            'is_locked' => true,
            'name' => [
                'en' => 'Password Reset Request',
                'de' => 'Passwort zurücksetzen',
                'hu' => 'Jelszó visszaállítás',
            ],
            'category' => 'system',
            'subject' => [
                'en' => 'Reset your password',
                'de' => 'Setzen Sie Ihr Passwort zurück',
                'hu' => 'Jelszó visszaállítása',
            ],
            'preheader' => [
                'en' => 'You requested a password reset.',
                'de' => 'Sie haben eine Passwort-Zurücksetzung angefordert.',
                'hu' => 'Jelszó visszaállítást kért.',
            ],
            'body' => [
                'en' => <<<'HTML'
<h2>Reset your password</h2>
<p>Hi {{ user.name }},</p>
<p>We received a request to reset your password. Click the button below to choose a new one.</p>
<div data-type="customBlock" data-id="emailButton" data-config="{&quot;label&quot;:&quot;Reset Password&quot;,&quot;url&quot;:&quot;{{ url }}&quot;,&quot;align&quot;:&quot;center&quot;}"></div>
<p>This link will expire in 60 minutes.</p>
<p>If you didn't request this, you can safely ignore this email.</p>
<p>Thanks,<br>{{ config.app.name }}</p>
HTML,
                'de' => <<<'HTML'
<h2>Passwort zurücksetzen</h2>
<p>Hallo {{ user.name }},</p>
<p>Wir haben eine Anfrage zum Zurücksetzen Ihres Passworts erhalten. Klicken Sie auf die Schaltfläche unten, um ein neues Passwort zu wählen.</p>
<div data-type="customBlock" data-id="emailButton" data-config="{&quot;label&quot;:&quot;Passwort zurücksetzen&quot;,&quot;url&quot;:&quot;{{ url }}&quot;,&quot;align&quot;:&quot;center&quot;}"></div>
<p>Dieser Link läuft in 60 Minuten ab.</p>
<p>Wenn Sie dies nicht angefordert haben, können Sie diese E-Mail ignorieren.</p>
<p>Mit freundlichen Grüßen,<br>{{ config.app.name }}</p>
HTML,
                'hu' => <<<'HTML'
<h2>Jelszó visszaállítása</h2>
<p>Kedves {{ user.name }},</p>
<p>Kaptunk egy kérést a jelszava visszaállítására. Kattintson az alábbi gombra egy új jelszó választásához.</p>
<div data-type="customBlock" data-id="emailButton" data-config="{&quot;label&quot;:&quot;Jelszó visszaállítása&quot;,&quot;url&quot;:&quot;{{ url }}&quot;,&quot;align&quot;:&quot;center&quot;}"></div>
<p>Ez a link 60 perc múlva lejár.</p>
<p>Ha nem Ön kérte ezt, nyugodtan hagyja figyelmen kívül ezt az e-mailt.</p>
<p>Üdvözlettel,<br>{{ config.app.name }}</p>
HTML,
            ],
            'token_schema' => [
                ['token' => 'user.name', 'description' => 'User name', 'example' => 'John Doe'],
                ['token' => 'url', 'description' => 'Password reset URL', 'example' => 'https://example.com/reset/...'],
                ['token' => 'config.app.name', 'description' => 'Application name', 'example' => 'MyApp'],
            ],
        ];
    }

    /**
     * @return array<string, mixed>
     */
    protected function passwordChangedTemplate(): array
    {
        return [
            'key' => 'user-password-changed',
            'is_locked' => true,
            'name' => [
                'en' => 'Password Changed Confirmation',
                'de' => 'Passwort geändert',
                'hu' => 'Jelszó megváltoztatva',
            ],
            'category' => 'system',
            'subject' => [
                'en' => 'Your password has been changed',
                'de' => 'Ihr Passwort wurde geändert',
                'hu' => 'A jelszava megváltozott',
            ],
            'preheader' => [
                'en' => 'Your account password was updated.',
                'de' => 'Ihr Kontopasswort wurde aktualisiert.',
                'hu' => 'A fiókja jelszava frissítve lett.',
            ],
            'body' => [
                'en' => <<<'HTML'
<h2>Password changed</h2>
<p>Hi {{ user.name }},</p>
<p>Your password for <strong>{{ config.app.name }}</strong> was successfully changed.</p>
<p>If you did not make this change, please contact us immediately.</p>
<p>Thanks,<br>{{ config.app.name }}</p>
HTML,
                'de' => <<<'HTML'
<h2>Passwort geändert</h2>
<p>Hallo {{ user.name }},</p>
<p>Ihr Passwort für <strong>{{ config.app.name }}</strong> wurde erfolgreich geändert.</p>
<p>Wenn Sie diese Änderung nicht vorgenommen haben, kontaktieren Sie uns bitte umgehend.</p>
<p>Mit freundlichen Grüßen,<br>{{ config.app.name }}</p>
HTML,
                'hu' => <<<'HTML'
<h2>Jelszó megváltoztatva</h2>
<p>Kedves {{ user.name }},</p>
<p>A <strong>{{ config.app.name }}</strong> fiókjának jelszava sikeresen megváltozott.</p>
<p>Ha nem Ön végezte ezt a módosítást, kérjük, azonnal lépjen kapcsolatba velünk.</p>
<p>Üdvözlettel,<br>{{ config.app.name }}</p>
HTML,
            ],
            'token_schema' => [
                ['token' => 'user.name', 'description' => 'User name', 'example' => 'John Doe'],
                ['token' => 'config.app.name', 'description' => 'Application name', 'example' => 'MyApp'],
            ],
        ];
    }

    /**
     * @return array<string, mixed>
     */
    protected function generalNotificationTemplate(): array
    {
        return [
            'key' => 'general-notification',
            'name' => [
                'en' => 'General Notification',
                'de' => 'Allgemeine Benachrichtigung',
                'hu' => 'Általános értesítés',
            ],
            'category' => 'notification',
            'subject' => [
                'en' => '{{ subject | "Notification from " }}{{ config.app.name }}',
                'de' => '{{ subject | "Benachrichtigung von " }}{{ config.app.name }}',
                'hu' => '{{ subject | "Értesítés a " }}{{ config.app.name }}{{ subject | "-tól" }}',
            ],
            'preheader' => [
                'en' => '',
                'de' => '',
                'hu' => '',
            ],
            'body' => [
                'en' => <<<'HTML'
<p>Hi {{ user.name | "there" }},</p>
<p>{{ message }}</p>
<p>Thanks,<br>{{ config.app.name }}</p>
HTML,
                'de' => <<<'HTML'
<p>Hallo {{ user.name | "dort" }},</p>
<p>{{ message }}</p>
<p>Mit freundlichen Grüßen,<br>{{ config.app.name }}</p>
HTML,
                'hu' => <<<'HTML'
<p>Kedves {{ user.name | "Felhasználó" }},</p>
<p>{{ message }}</p>
<p>Üdvözlettel,<br>{{ config.app.name }}</p>
HTML,
            ],
            'token_schema' => [
                ['token' => 'user.name', 'description' => 'Recipient name (optional)', 'example' => 'John'],
                ['token' => 'subject', 'description' => 'Email subject (optional)', 'example' => 'Important Update'],
                ['token' => 'message', 'description' => 'The notification message body', 'example' => 'Your report is ready.'],
                ['token' => 'config.app.name', 'description' => 'Application name', 'example' => 'MyApp'],
            ],
        ];
    }
}
