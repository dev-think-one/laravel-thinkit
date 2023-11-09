<?php

namespace ThinKit\Tests\Fixtures\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ThinKit\Models\Expiration\Expirable;
use ThinKit\Models\Expiration\HasExpiration;

class Coupon extends Model implements Expirable
{
    use HasExpiration;
    use SoftDeletes;

    protected $table = 'coupons';

    protected $guarded = [];

    protected string $expirationKeyName = 'expire';
}
