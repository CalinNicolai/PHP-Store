<?php

namespace controllers;

class Admin
{

    public function products(Product $product)
    {
        $product->admin();
    }
}