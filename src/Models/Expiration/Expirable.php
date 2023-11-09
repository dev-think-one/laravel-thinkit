<?php

namespace ThinKit\Models\Expiration;

interface Expirable
{
    public function expiresAt(): ?\DateTimeInterface;

    public function expired(): bool;

    public function willBeExpiredAt(\DateTimeInterface $dateTime): bool;
}
