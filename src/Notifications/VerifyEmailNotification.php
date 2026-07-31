<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Notifications;

use FinityLabs\FinMail\Helpers\TokenValue;
use FinityLabs\FinMail\Mail\TemplateMail;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmailNotification extends VerifyEmail
{
    public function toMail(mixed $notifiable): MailMessage|Mailable
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return TemplateMail::make('user-verify-email')
            ->models([
                'user' => $notifiable,
                'url' => TokenValue::make($verificationUrl),
            ])
            ->withoutStoringRenderedBody();
    }
}
