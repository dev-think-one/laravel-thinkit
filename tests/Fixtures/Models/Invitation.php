<?php

namespace ThinKit\Tests\Fixtures\Models;

use Illuminate\Database\Eloquent\Model;
use ThinKit\Models\Expiration\Expirable;
use ThinKit\Models\Expiration\HasExpiration;

class Invitation extends Model implements Expirable
{
    use HasExpiration;

    protected $table = 'invitations';

    protected $guarded = [];
}
