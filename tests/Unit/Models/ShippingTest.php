<?php

namespace Tests\Unit\Models;

use App\Models\Shipping;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class ShippingTest extends TestCase
{
    public function testShippingBelongsToOrder()
    {
        $s = new Shipping();
        $relation = $s->order();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('order_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }
}
