<?php

namespace Be\Theme\Pet\Config\Page\Shop\Category;


class products
{

    public int $north = 1;

    public array $northSections = [
        [
            'name' => 'Theme.Pet.Header',
        ],
        [
            'name' => 'Theme.Pet.ShopHeader',
        ],
    ];

    public int $west = 25;
    public int $center = 75;
    public int $east = 0;

    public array $westSections = [
        [
            'name' => 'Theme.Pet.App.Shop.Category.TopNSide',
        ],
        [
            'name' => 'Theme.Pet.App.Shop.Product.TopSalesTopNSide',
        ],
    ];

    public array $centerSections = [
        [
            'name' => 'Theme.Pet.PageTitle',
        ],
        [
            'name' => 'Theme.Pet.App.Shop.Category.Products',
        ],
    ];



}
