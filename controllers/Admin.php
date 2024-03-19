<?php

namespace pages;

class Admin
{

    public function products(Product $product)
    {
        $product->admin();
    }
}