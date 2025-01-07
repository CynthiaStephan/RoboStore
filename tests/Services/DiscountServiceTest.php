<?php
namespace App\Tests;

use App\Entity\Order;
use App\Services\DiscountService;
use PHPUnit\Framework\TestCase;

class DiscountServiceTest extends TestCase
{
    private DiscountService $discountService;

    protected function setUp(): void
    {
        $this->discountService = new DiscountService();
    }

    public function testCalculateDiscountedTotalWithPercentage(): void
    {
        $order = new Order();
        $order->addItem('Item 1', 30, 2); // Total: 60

        $total = $this->discountService->calculateDiscountedTotal($order, 'SUMMER10');

        $this->assertEquals(54, $total); // 60 - 10%
    }

    public function testCalculateDiscountedTotalWithFixedDiscount(): void
    {
        $order = new Order();
        $order->addItem('Item 1', 15, 2); // Total: 30

        $total = $this->discountService->calculateDiscountedTotal($order, 'WELCOME5');

        $this->assertEquals(25, $total); // 30 - 5€
    }

    public function testInvalidDiscountCode(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid discount code');

        $order = new Order();
        $order->addItem('Item 1', 50, 1);

        $this->discountService->calculateDiscountedTotal($order, 'INVALID_CODE');
    }

    public function testOrderTotalBelowMinimum(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Order total does not meet the minimum requirement for this discount code');

        $order = new Order();
        $order->addItem('Item 1', 10, 1); // Total: 10

        $this->discountService->calculateDiscountedTotal($order, 'SUMMER10');
    }
}