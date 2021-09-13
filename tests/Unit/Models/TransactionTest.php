<?php

namespace Tests\Unit\Models;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    public function testTransactionBelongsToOrder()
    {
        $t = new Transaction();
        $relation = $t->order();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('order_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }
}
