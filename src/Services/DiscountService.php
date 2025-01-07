<?php

namespace App\Services;

use App\Entity\Order;

class DiscountService
{
    private DiscountService $discountService;

    private $discountCodes = [
        ["name" => "SUMMER10", "discount" => 10, "type" => "percent", "mimAmount" => 15],
        ["name" => "WELCOME5", "discount" => 5, "type" => "amount","mimAmount" => 0]
    ];
   
    public function calculateDiscountedTotal(Order $order, string $discountCode): float
    {
        $orderTotal = $order->getTotal();
        if ($orderTotal <= 10) {
            throw new \Exception("Order total does not meet the minimum requirement for this discount code");
        }
        if ($discountCode === 'SUMMER10') {
            return $orderTotal - $orderTotal * (10 / 100);
        }
        if ($discountCode === 'WELCOME5') {
            return $orderTotal - 5;
        }
        throw new \Exception("Invalid discount code");
    }
}