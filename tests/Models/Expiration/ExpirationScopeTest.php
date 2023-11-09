<?php

namespace ThinKit\Tests\Models\Expiration;

use Carbon\Carbon;
use ThinKit\Tests\Fixtures\Models\Coupon;
use ThinKit\Tests\Fixtures\Models\Invitation;
use ThinKit\Tests\TestCase;

class ExpirationScopeTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        Invitation::create(['description' => 'foo1']);
        Invitation::create(['description' => 'foo2', 'expire_at' => Carbon::now()->addDay()]);
        Invitation::create(['description' => 'foo3']);
        Invitation::create(['description' => 'foo4', 'expire_at' => Carbon::now()->addDays(3)]);
        Invitation::create(['description' => 'foo5', 'expire_at' => Carbon::now()->subDay()]);
        Invitation::create(['description' => 'foo6']);
        Invitation::create(['description' => 'foo7', 'expire_at' => Carbon::now()->subDays(4)]);
        Invitation::create(['description' => 'foo8', 'expire_at' => Carbon::now()->addDays(4)]);

        Coupon::create(['description' => 'bar1']);
        Coupon::create(['description' => 'bar2', 'expire' => Carbon::now()->subDays(4)]);
        Coupon::create(['description' => 'bar3', 'expire' => Carbon::now()->addDays(4)]);
    }

    /** @test */
    public function expired_scope()
    {
        $models = Invitation::query()->expired()->get();

        $this->assertEquals(2, $models->count());
        $this->assertEquals('foo5', $models->first()->description);
        $this->assertEquals('foo7', $models->last()->description);
    }

    /** @test */
    public function will_be_expired_at_scope()
    {
        $models = Invitation::query()->willBeExpiredAt(Carbon::now()->addHours(30))->get();

        $this->assertEquals(3, $models->count());
        $this->assertEquals('foo2', $models->first()->description);
        $this->assertEquals('foo5', $models->get(1)->description);
        $this->assertEquals('foo7', $models->last()->description);
    }

    /** @test */
    public function will_be_expired_at_scope_custom_key()
    {
        $models = Coupon::query()->willBeExpiredAt(Carbon::now()->addHour())->get();

        $this->assertEquals(1, $models->count());
        $this->assertEquals('bar2', $models->first()->description);
    }
}
