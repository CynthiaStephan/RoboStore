<?php

namespace App\Tests;

use App\Entity\Robot;
use App\Services\StockManager;
use PHPUnit\Framework\TestCase;

class StockManagerTest extends TestCase
{
    private $stockManager = null;

    protected function setUp() : void
    {
        $this->stockManager = new StockManager();
    }

    public function testSetAndGetStock(): void
    {
        $robot = new Robot();
        $this->stockManager->setStock($robot, 10);
        $this->assertEquals(10, $this->stockManager->getStock($robot));
    }

    public function testCanProcessOrder(): void{
        $robot = new Robot();
        
    }

}
