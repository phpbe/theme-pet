<?php

namespace Be\Theme\Pet\Config\Page\Cms\Article;


class latest
{

    public int $west = 25;
    public int $center = 75;
    public int $east = 0;

    public array $westSections = [
        [
            'name' => 'Theme.Pet.App.Cms.Article.SearchFormSide',
        ],
        [
            'name' => 'Theme.Pet.App.Cms.Category.TopNSide',
        ],
        [
            'name' => 'Theme.Pet.App.Cms.Article.TagTopNSide',
        ],
    ];

    public array $centerSections = [
        [
            'name' => 'Theme.Pet.App.Cms.Article.Latest',
        ],
    ];



}
