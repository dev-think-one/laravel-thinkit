<?php

namespace ThinKit\Models\Expiration;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Builder;

trait HasExpiration
{
    public function initializeHasExpiration()
    {
        if (!array_key_exists($this->expirationKeyName(), $this->casts)) {
            $this->casts[$this->expirationKeyName()] = 'datetime';
        }
    }

    public function expirationKeyName(): string
    {
        return property_exists($this, 'expirationKeyName') ? $this->expirationKeyName : 'expire_at';
    }

    public function expiresAt(): ?\DateTimeInterface
    {
        return $this->{$this->expirationKeyName()};
    }

    public function expired(): bool
    {
        return $this->willBeExpiredAt(Carbon::now());
    }

    public function willBeExpiredAt(\DateTimeInterface $dateTime): bool
    {
        $expiresAt = $this->expiresAt();
        if (is_null($expiresAt)) {
            return false;
        }

        return Carbon::instance($dateTime)->greaterThan($expiresAt);
    }

    public function scopeExpired(Builder $query): void
    {
        $this->scopeWillBeExpiredAt($query, Carbon::now());
    }

    public function scopeWillBeExpiredAt(Builder $query, \DateTimeInterface $dateTime): void
    {
        $query->where(function (Builder $query) use ($dateTime) {
            $query->whereNotNull($this->expirationKeyName());
            $query->where($this->expirationKeyName(), '<', $dateTime);
        });
    }
}
