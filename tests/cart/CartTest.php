<?php

namespace tests;

use app\exceptions\CartQuantityException;
use app\libraries\Cart;
use app\libraries\Product;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    public function testIfCartIsEmpty()
    {
        $cart = new Cart;

        $this->assertEmpty($cart->getCart());
    }

    public function testIfCartIsNotEmpty()
    {
        $cart = new Cart;
        $cart->add(new Product);
        $this->assertNotEmpty($cart->getCart());
    }

    public function testCatchExceptionIfCartHaveMoreThan2Products()
    {
        $this->expectException(CartQuantityException::class);

        $product1 = new Product;
        $product2 = new Product;
        $product3 = new Product;

        $cart = new Cart;
        $cart->add($product1);
        $cart->add($product2);
        $cart->add($product3);
       // $this->assertNotEmpty($cart->getCart());
    }

    public function testIfProductsInCartIsGreaterThan1()
    {
        $cart = new Cart;
        $cart->add(new Product);
        $cart->add(new Product);
        $this->assertGreaterThan(1, count($cart->getcart()));
    }
}