<?php

namespace ThinKit\Notifications\Mail;

use Illuminate\Notifications\Messages\MailMessage;

trait HasMailCC
{
    protected array $mailCC  = [];
    protected array $mailBCC = [];

    public function mailCC(array $receivers = []): static
    {
        $this->mailCC = $receivers;

        return $this;
    }

    public function mailBCC(array $receivers = []): static
    {
        $this->mailBCC = $receivers;

        return $this;
    }

    protected function withMailCC(MailMessage $message): MailMessage
    {
        if (!empty($this->mailCC)) {
            $message->cc($this->mailCC);
        }
        if (!empty($this->mailCC)) {
            $message->bcc($this->mailBCC);
        }

        return $message;
    }
}
