<?php

namespace Be\Theme\Pet\Section\App\Shop\Product\TopSalesTopN;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{

    public array $positions = ['middle', 'center'];

    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        $products = Be::getService('App.Shop.Product')->getTopSalesTopNProducts($this->config->quantity);
        if (count($products) === 0) {
            return;
        }

        $defaultMoreLink = beUrl('Shop.Product.topSales');
        echo Be::getService('Theme.Pet.ShopSection')->makeProductsSection($this, 'app-shop-product-top-sales-top-n', $products, $defaultMoreLink);
    }

}

