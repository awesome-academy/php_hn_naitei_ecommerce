<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    protected $c;

    public function setUp(): void
    {
        $this->c = new Category();
        parent::setUp();
    }

    public function tearDown(): void
    {
        $this->c = null;
        parent::tearDown();
    }

    public function testModelConfiguration()
    {
        $fillable = [
            'name',
            'slug',
        ];

        $this->assertEquals($fillable, $this->c->getFillable());
    }

    public function testTableName()
    {
        $this->assertEquals('categories', $this->c->getTable());
    }
}
