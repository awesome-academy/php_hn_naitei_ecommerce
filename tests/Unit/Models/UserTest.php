<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testModelConfiguration()
    {
        $u = new User();

        $fillable = [
            'name',
            'email',
            'password',
            'role',
            'is_active',
            'avatar',
            'phone',
        ];

        $hidden = [
            'password',
            'two_factor_recovery_codes',
            'two_factor_secret',
        ];

        $casts = [
            'email_verified_at' => 'datetime',
            'id' => 'int',
        ];

        $this->assertEquals($fillable, $u->getFillable());
        $this->assertEquals($hidden, $u->getHidden());
        $this->assertEquals($casts, $u->getCasts());
    }
}
