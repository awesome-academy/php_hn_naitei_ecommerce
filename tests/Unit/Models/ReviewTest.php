<?php

namespace Tests\Unit\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class ReviewTest extends TestCase
{
    protected $r;

    public function setUp(): void
    {
        $this->r = new Review();
        parent::setUp();
    }

    public function tearDown(): void
    {
        $this->r = null;
        parent::tearDown();
    }
    public function testModelConfiguration()
    {
        $fillable = [
            'rating',
            'comment',
            'product_id',
            'user_id',
        ];

        $this->assertEquals($fillable, $this->r->getFillable());
    }

    public function testReviewBelongsToUser()
    {
        $relation = $this->r->user();

        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('user_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getOwnerKeyName());
    }
}
