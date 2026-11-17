<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $locale ?? app()->getLocale()) }}" dir="{{ $direction ?? 'ltr' }}" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>{{ config('app.name') }}</title>

    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->

    <style>
        /* Reset */
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        body { margin: 0; padding: 0; width: 100% !important; height: 100% !important; }
        a[x-apple-data-detectors] { color: inherit !important; text-decoration: none !important; }

        /* Theme Colors */
        .email-body { background-color: {{ $theme['background'] ?? '#f4f4f7' }}; }
        .email-content { background-color: {{ $theme['content_bg'] ?? '#ffffff' }}; }
        .email-content a { color: {{ $theme['link'] ?? '#4F46E5' }}; text-decoration: underline; }
        .email-text { color: {{ $theme['text'] ?? '#333333' }}; }
        .email-text-light { color: {{ $theme['text_light'] ?? '#666666' }}; }
        .email-heading { color: {{ $theme['heading'] ?? '#1a1a1a' }}; }
        .email-link { color: {{ $theme['link'] ?? '#4F46E5' }}; }
        .email-button { background-color: {{ $theme['button_bg'] ?? '#4F46E5' }}; color: {{ $theme['button_text'] ?? '#ffffff' }}; }
        .email-footer { background-color: {{ $theme['footer_bg'] ?? '#f4f4f7' }}; color: {{ $theme['footer_text'] ?? '#999999' }}; }
        .email-border { border-color: {{ $theme['border'] ?? '#e8e8e8' }}; }

        /* Blocks: a summary set to stack puts each label above its value on phones */
        @media only screen and (max-width: 520px) {
            .fm-stack, .fm-stack tbody, .fm-stack tr, .fm-stack td { display: block !important; width: 100% !important; box-sizing: border-box; }
            .fm-stack td.fm-label { border-bottom: 0 !important; padding-bottom: 0 !important; }
            .fm-stack td.fm-value { text-align: left !important; padding-top: 2px !important; }
        }
    </style>
</head>
<body class="email-body" style="margin: 0; padding: 0; background-color: {{ $theme['background'] ?? '#f4f4f7' }};">

    {{-- Preheader (hidden preview text) --}}
    @if(!empty($preheader))
    <div style="display: none; max-height: 0; overflow: hidden;">
        {{ $preheader }}
    </div>
    @endif

    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: 0; padding: 0;">
        <tr>
            <td align="center" style="padding: 20px 0;">
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="{{ $branding['content_width'] ?? 600 }}" style="max-width: {{ $branding['content_width'] ?? 600 }}px; width: 100%;">

                    {{-- Logo --}}
                    @if($branding['logo'] ?? null)
                    <tr>
                        <td align="center" style="padding: 20px 0;">
                            <img src="{{ $branding['logo'] }}"
                                 width="{{ $branding['logo_width'] ?? 200 }}"
                                 height="{{ $branding['logo_height'] ?? 50 }}"
                                 alt="{{ config('app.name') }}"
                                 style="display: block;">
                        </td>
                    </tr>
                    @endif

                    {{-- Content --}}
                    <tr>
                        <td class="email-content" style="background-color: {{ $theme['content_bg'] ?? '#ffffff' }}; border-radius: 8px; padding: 40px 30px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.6; color: {{ $theme['text'] ?? '#333333' }};">
                            {!! \FinityLabs\FinMail\Helpers\InlineStyler::apply($body, $theme) !!}
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td class="email-footer" style="padding: 20px 30px; text-align: center; background-color: {{ $theme['footer_bg'] ?? '#f4f4f7' }}; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; font-size: 12px; color: {{ $theme['footer_text'] ?? '#999999' }};">
                            @if($branding['footer_links'] ?? [])
                                @foreach($branding['footer_links'] as $link)
                                    <a href="{{ $link['url'] }}" style="color: {{ $theme['link'] ?? '#4F46E5' }}; text-decoration: none;">{{ $link['name'] }}</a>
                                    @if(!$loop->last) &middot; @endif
                                @endforeach
                                <br><br>
                            @endif
                            @if(($branding['customer_service_email'] ?? null) || ($branding['customer_service_phone'] ?? null))
                                @if($branding['customer_service_email'] ?? null)
                                    <a href="mailto:{{ $branding['customer_service_email'] }}" style="color: {{ $theme['link'] ?? '#4F46E5' }}; text-decoration: none;">{{ $branding['customer_service_email'] }}</a>
                                @endif
                                @if(($branding['customer_service_email'] ?? null) && ($branding['customer_service_phone'] ?? null))
                                    &middot;
                                @endif
                                @if($branding['customer_service_phone'] ?? null)
                                    <a href="tel:{{ $branding['customer_service_phone'] }}" style="color: {{ $theme['link'] ?? '#4F46E5' }}; text-decoration: none;">{{ $branding['customer_service_phone'] }}</a>
                                @endif
                                <br><br>
                            @endif
                            @php($socialLinks = \FinityLabs\FinMail\Helpers\SocialLinks::forLayout($branding['social_links'] ?? [], $theme['footer_bg'] ?? '#f4f4f7'))
                            @if($socialLinks !== [])
                                @foreach($socialLinks as $socialLink)
                                    <a href="{{ $socialLink['url'] }}" target="_blank" style="display: inline-block; margin: 0 4px; vertical-align: middle; line-height: 24px; color: {{ $theme['link'] ?? '#4F46E5' }}; text-decoration: none;">@if($socialLink['icon'])<img src="{{ $socialLink['icon'] }}" width="24" height="24" alt="{{ $socialLink['label'] }}" style="display: block; width: 24px; height: 24px; border: 0;">@else{{ $socialLink['label'] }}@endif</a>
                                @endforeach
                                <br><br>
                            @endif
                            {!! __('fin-mail::fin-mail.email.copyright', ['year' => date('Y'), 'app' => config('app.name')]) !!}
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
