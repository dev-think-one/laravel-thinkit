<?php

namespace ThinKit\Tests\Console\Commands;

use Carbon\Carbon;
use ThinKit\Tests\Fixtures\Models\Coupon;
use ThinKit\Tests\Fixtures\Models\Invitation;
use ThinKit\Tests\Fixtures\Models\Ticket;
use ThinKit\Tests\TestCase;

class DeleteExpiredCommandTest extends TestCase
{
    /** @test */
    public function delete_expired()
    {
        Invitation::create(['description' => 'foo1']);
        Invitation::create(['description' => 'foo2', 'expire_at' => Carbon::now()->addDay()]);
        Invitation::create(['description' => 'foo3']);
        Invitation::create(['description' => 'foo4', 'expire_at' => Carbon::now()->addDays(3)]);
        Invitation::create(['description' => 'foo5', 'expire_at' => Carbon::now()->subDay()]);
        Invitation::create(['description' => 'foo6']);
        Invitation::create(['description' => 'foo7', 'expire_at' => Carbon::now()->subDays(4)]);
        Invitation::create(['description' => 'foo8', 'expire_at' => Carbon::now()->addDays(4)]);

        $model   = Invitation::class;
        $timeout = 3.1 * 24 * 60;
        $this->artisan('thinkit:delete-expired', [
            'model'     => $model,
            '--timeout' => $timeout,
        ])->assertSuccessful();

        $models = Invitation::query()->get();

        $this->assertEquals(4, $models->count());
    }

    /** @test */
    public function delete_expired_soft()
    {
        Coupon::create(['description' => 'foo1']);
        Coupon::create(['description' => 'foo2', 'expire' => Carbon::now()->addDay()]);
        Coupon::create(['description' => 'foo3']);
        Coupon::create(['description' => 'foo4', 'expire' => Carbon::now()->addDays(3)]);
        Coupon::create(['description' => 'foo5', 'expire' => Carbon::now()->subDay()]);
        Coupon::create(['description' => 'foo6']);
        Coupon::create(['description' => 'foo7', 'expire' => Carbon::now()->subDays(4)]);
        Coupon::create(['description' => 'foo8', 'expire' => Carbon::now()->addDays(4)]);

        $model   = Coupon::class;
        $timeout = 3.1 * 24 * 60;
        $this->artisan('thinkit:delete-expired', [
            'model'     => $model,
            '--timeout' => $timeout,
        ])->assertSuccessful();


        $this->assertEquals(4, Coupon::query()->count());
        $this->assertEquals(8, Coupon::query()->withTrashed()->count());
    }

    /** @test */
    public function force_delete_expired_soft()
    {
        Coupon::create(['description' => 'foo1']);
        Coupon::create(['description' => 'foo2', 'expire' => Carbon::now()->addDay()]);
        Coupon::create(['description' => 'foo3']);
        Coupon::create(['description' => 'foo4', 'expire' => Carbon::now()->addDays(3)]);
        Coupon::create(['description' => 'foo5', 'expire' => Carbon::now()->subDay()]);
        Coupon::create(['description' => 'foo6']);
        Coupon::create(['description' => 'foo7', 'expire' => Carbon::now()->subDays(4)]);
        Coupon::create(['description' => 'foo8', 'expire' => Carbon::now()->addDays(4)]);

        $model   = Coupon::class;
        $timeout = 3.1 * 24 * 60;
        $this->artisan('thinkit:delete-expired', [
            'model'     => $model,
            '--timeout' => $timeout,
            '--force'   => true,
        ])->assertSuccessful();


        $this->assertEquals(4, Coupon::query()->count());
        $this->assertEquals(4, Coupon::query()->withTrashed()->count());
    }

    /** @test */
    public function error_if_incorrect_class()
    {

        $this->artisan('thinkit:delete-expired', [
            'model' => 'MyClass',
        ])
            ->expectsOutput('Model [MyClass] name should extends model class')
            ->assertFailed();
    }

    /** @test */
    public function error_if_class_not_extends_expiration()
    {

        $this->artisan('thinkit:delete-expired', [
            'model' => Ticket::class,
        ])
            ->expectsOutput('Model ['.Ticket::class."] should use trait 'HasExpiration'")
            ->assertFailed();
    }
}
