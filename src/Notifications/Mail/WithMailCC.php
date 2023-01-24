<?php

namespace ThinKit\Notifications\Mail;

interface WithMailCC
{
    public function mailCC(array $receivers = []): static;

    public function mailBCC(array $receivers = []): static;
}
