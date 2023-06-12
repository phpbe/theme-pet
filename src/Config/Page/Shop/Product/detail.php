<?php

namespace Be\App\Shop\Config\Page\Product;

class detail
{

    public int $west = 0;
    public int $center = 100;
    public int $east = 0;

    public array $centerSections = [
        [
            'name' => 'Theme.Pet.App.Shop.Product.Detail.Main',
        ],
        [
            'name' => 'Theme.Pet.App.Shop.Product.Detail.SimilarTopN',
        ],
        [
            'name' => 'Theme.Pet.App.Shop.Product.Detail.Description',
        ],
        [
            'name' => 'Theme.Pet.App.Shop.Product.Detail.Reviews',
        ],
        [
            'name' => 'Theme.Pet.App.Shop.Product.GuessYouLikeTopN',
        ],
    ];

}
