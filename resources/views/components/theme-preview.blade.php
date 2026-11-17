<div style="background-color: {{ $theme['background'] ?? '#f4f4f7' }}; padding: 24px; border-radius: 8px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
    <div style="max-width: 500px; margin: 0 auto;">

        {{-- Content area --}}
        <div style="background-color: {{ $theme['content_bg'] ?? '#ffffff' }}; border-radius: 8px; padding: 24px; border: 1px solid {{ $theme['border'] ?? '#e8e8e8' }};">

            <h2 style="color: {{ $theme['heading'] ?? '#1a1a1a' }}; margin: 0 0 12px 0; font-size: 18px;">
                Welcome to Our Service
            </h2>

            <p style="color: {{ $theme['text'] ?? '#333333' }}; margin: 0 0 12px 0; font-size: 14px; line-height: 1.6;">
                Hello <strong>John</strong>, thanks for signing up! We're excited to have you on board.
                Here's a quick look at how your emails will appear.
            </p>

            <p style="color: {{ $theme['text_light'] ?? '#666666' }}; margin: 0 0 16px 0; font-size: 13px; line-height: 1.6;">
                This is secondary text, useful for less prominent information or disclaimers.
                You can also include <a href="#" style="color: {{ $theme['link'] ?? '#4F46E5' }}; text-decoration: underline;">links like this</a>.
            </p>

            {{-- Button --}}
            <div style="text-align: center; margin: 20px 0;">
                <span style="display: inline-block; background-color: {{ $theme['button_bg'] ?? '#4F46E5' }}; color: {{ $theme['button_text'] ?? '#ffffff' }}; padding: 10px 24px; border-radius: 6px; font-size: 14px; font-weight: 600; text-decoration: none;">
                    Get Started
                </span>
            </div>

            {{-- Callouts --}}
            @foreach(['info', 'warning', 'success'] as $variant)
                <div style="background-color: {{ $theme[$variant.'_bg'] ?? '#f4f4f7' }}; color: {{ $theme[$variant.'_text'] ?? '#333333' }}; padding: 8px 12px; border-radius: 6px; font-size: 12px; line-height: 1.5; margin: 0 0 6px 0;">
                    {{ __('fin-mail::fin-mail.template.blocks.variant_'.$variant) }}
                </div>
            @endforeach
        </div>

        {{-- Footer --}}
        <div style="background-color: {{ $theme['footer_bg'] ?? '#f4f4f7' }}; padding: 16px; text-align: center; margin-top: 8px; border-radius: 0 0 8px 8px;">
            <p style="color: {{ $theme['footer_text'] ?? '#999999' }}; margin: 0; font-size: 11px;">
                &copy; {{ date('Y') }} Your Company &middot;
                <a href="#" style="color: {{ $theme['link'] ?? '#4F46E5' }}; text-decoration: none;">Unsubscribe</a> &middot;
                <a href="#" style="color: {{ $theme['link'] ?? '#4F46E5' }}; text-decoration: none;">Privacy Policy</a>
            </p>
        </div>

        {{-- Extra colors from config fin-mail.theme_colors --}}
        @php($extraColors = \FinityLabs\FinMail\Models\EmailTheme::extraColorDefinitions())
        @if($extraColors !== [])
            <div style="margin-top: 12px; display: flex; flex-wrap: wrap; gap: 6px 14px;">
                @foreach($extraColors as $key => $definition)
                    <span style="display: inline-flex; align-items: center; gap: 6px; font-size: 11px; color: {{ $theme['text_light'] ?? '#666666' }};">
                        <span style="display: inline-block; width: 14px; height: 14px; border-radius: 3px; border: 1px solid rgba(0, 0, 0, 0.15); background-color: {{ $theme[$key] ?? $definition['default'] }};"></span>
                        {{ __($definition['label']) }}
                    </span>
                @endforeach
            </div>
        @endif
    </div>
</div>
