<?php

namespace Be\Theme\Pet\Config\Page\Shop\Product;

class topSales
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
        [
            'name' => 'Theme.Pet.App.Shop.Product.GuessYouLikeTopNSide',
        ],
    ];

    public array $centerSections = [
        [
            'name' => 'Theme.Pet.PageTitle',
        ],
        [
            'name' => 'Theme.Pet.App.Shop.Product.TopSales',
        ],
    ];

    /**
     * @BeConfigItem("HEAD头标题",
     *     description="HEAD头标题，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $title = 'Best Selling';

    /**
     * @BeConfigItem("Meta描述",
     *     description="填写页面内容的简单描述，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $metaDescription = 'Best Selling';

    /**
     * @BeConfigItem("Meta关键词",
     *     description="填写页面内容的关键词，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $metaKeywords = 'Best Selling';

    /**
     * @BeConfigItem("页面标题",
     *     description="展示在页面内容中的标题，一般与HEAD头标题一致，两者相同时可不填写此项",
     *     driver = "FormItemInput"
     * )
     */
    public string $pageTitle = '';


}
