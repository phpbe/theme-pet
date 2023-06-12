<?php

namespace Be\Theme\Pet\Config\Page\System\Home;

class index
{

    public int $middle = 1;

    public array $middleSections = [
        [
            'name' => 'Theme.Pet.Slider',
        ],
        [
            'name' => 'Theme.Pet.App.Shop.Category.TopN',
        ],
        [
            'name' => 'Theme.Pet.SpecialCollection',
        ],
        [
            'name' => 'Theme.Pet.App.Shop.Product.HottestTopN',
        ],
        [
            'name' => 'Theme.Pet.BannersWithContent',
        ],
        [
            'name' => 'Theme.Pet.App.Shop.Product.LatestTopN',
        ],
        [
            'name' => 'Theme.Pet.BannerWithContent',
        ],
    ];

    /**
     * @BeConfigItem("HEAD头标题",
     *     description="HEAD头标题，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $title = 'Home';

    /**
     * @BeConfigItem("Meta描述",
     *     description="填写页面内容的简单描述，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $metaDescription = '';

    /**
     * @BeConfigItem("Meta关键词",
     *     description="填写页面内容的关键词，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $metaKeywords = '';

    /**
     * @BeConfigItem("页面标题",
     *     description="展示在页面内容中的标题，一般与HEAD头标题一致，两者相同时可不填写此项",
     *     driver = "FormItemInput"
     * )
     */
    public string $pageTitle = '';


}
