<?php

namespace ThinKit\Tests\Models\Expiration;

use Carbon\Carbon;
use ThinKit\Tests\Fixtures\Models\Coupon;
use ThinKit\Tests\Fixtures\Models\Invitation;
use ThinKit\Tests\TestCase;

class ExpirationTest extends TestCase
{

    /** @test */
    public function expired()
    {
        /** @var Invitation $model */
        $model = Invitation::create(['description' => 'foo', 'expire_at' => Carbon::now()->addDays(3)]);

        $this->assertFalse($model->expired());
        $this->assertTrue($model->willBeExpiredAt(Carbon::now()->addDays(4)));

        /** @var Invitation $model */
        $model = Invitation::create(['description' => 'foo', 'expire_at' => Carbon::now()->subDays(3)]);

        $this->assertTrue($model->expired());
        $this->assertTrue($model->willBeExpiredAt(Carbon::now()->addDays(4)));
    }

    /** @test */
    public function expired_custom_key()
    {
        /** @var Coupon $model */
        $model = Coupon::create(['description' => 'foo', 'expire' => Carbon::now()->addDays(3)]);

        $this->assertFalse($model->expired());
        $this->assertTrue($model->willBeExpiredAt(Carbon::now()->addDays(4)));

        /** @var Coupon $model */
        $model = Coupon::create(['description' => 'foo', 'expire' => Carbon::now()->subDays(3)]);

        $this->assertTrue($model->expired());
        $this->assertTrue($model->willBeExpiredAt(Carbon::now()->addDays(4)));
    }

}
