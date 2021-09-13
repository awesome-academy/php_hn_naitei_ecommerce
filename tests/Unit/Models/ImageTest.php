<?php

namespace Tests\Unit\Models;

use App\Models\Images;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class ImageTest extends TestCase
{
    protected $i;

    public function setUp(): void
    {
        $this->i = new Images();
        parent::setUp();
    }

    public function tearDown(): void
    {
        $this->i = null;
        parent::tearDown();
    }

    public function testModelConfiguration()
    {
        $fillable = [
            'name',
        ];

        $this->assertEquals($fillable, $this->i->getFillable());
    }

    public function testTableName()
    {
        $this->assertEquals('images', $this->i->getTable());
    }

    public function testImageBelongsToProduct()
    {
        $relation = $this->i->product();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('product_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }
}
