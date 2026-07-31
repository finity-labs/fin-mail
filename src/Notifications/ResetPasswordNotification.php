<?php

declare(strict_types=1);

namespace FinityLabs\FinMail\Notifications;

use FinityLabs\FinMail\Helpers\TokenValue;
use FinityLabs\FinMail\Mail\TemplateMail;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends ResetPassword
{
    public function toMail(mixed $notifiable): MailMessage|Mailable
    {
        $url = $this->resetUrl($notifiable);

        return TemplateMail::make('user-password-reset')
            ->models([
                'user' => $notifiable,
                'url' => TokenValue::make($url),
            ])
            ->withoutStoringRenderedBody();
    }
}
