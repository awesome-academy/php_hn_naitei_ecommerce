<?php

namespace Tests\Unit\Models;

use App\Models\HomeCategory;
use PHPUnit\Framework\TestCase;

class HomeCategoryTest extends TestCase
{
    public function testTableName()
    {
        $homeCate = new HomeCategory();
        $this->assertEquals('home_categories', $homeCate->getTable());
    }
}
