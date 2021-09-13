<?php

namespace Tests\Unit\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Tests\TestCase;

class OrderTest extends TestCase
{
    protected $o;

    public function setUp(): void
    {
        $this->o = new Order();
        parent::setUp();
    }

    public function tearDown(): void
    {
        $this->o = null;
        parent::tearDown();
    }

    public function testModelConfiguration()
    {
        $fillable = [
            'user_id',
            'subtotal',
            'tax',
            'total',
            'firstname',
            'lastname',
            'mobile',
            'email',
            'line1',
            'line2',
            'city',
            'province',
            'country',
            'zipcode',
        ];

        $this->assertEquals($fillable, $this->o->getFillable());
    }

    public function testOrderBelongsToUser()
    {
        $relation = $this->o->user();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('user_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }

    public function testOderBelongsToManyProducts()
    {
        $relation = $this->o->products();

        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('order_product.order_id', $relation->getQualifiedForeignPivotKeyName());
        $this->assertEquals('order_product.product_id', $relation->getQualifiedRelatedPivotKeyName());
    }

    public function testOrderHasOneTransaction()
    {
        $relation = $this->o->transaction();

        $this->assertInstanceOf(HasOne::class, $relation);
        $this->assertEquals('order_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function testOrderHasOneShipping()
    {
        $relation = $this->o->shipping();

        $this->assertInstanceOf(HasOne::class, $relation);
        $this->assertEquals('order_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }
}
