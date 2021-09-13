<?php

namespace Tests\Unit\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class ProductTest extends TestCase
{
    protected $p;

    public function setUp(): void
    {
        $this->p = new Product();
        parent::setUp();
    }

    public function tearDown(): void
    {
        $this->p = null;
        parent::tearDown();
    }

    public function testModelConfiguration()
    {
        $fillable = [
            'name',
            'slug',
            'short_description',
            'description',
            'regular_price',
            'quantity',
            'SKU',
            'category_id',
        ];

        $this->assertEquals($fillable, $this->p->getFillable());
    }

    public function testTableName()
    {
        $this->assertEquals('products', $this->p->getTable());
    }

    public function testProductHasManyImages()
    {
        $relation = $this->p->images();

        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('product_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function testProductBelongsToCategory()
    {
        $relation = $this->p->category();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('category_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function testProductHasManyReviews()
    {
        $relation = $this->p->reviews();

        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('product_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }
}
