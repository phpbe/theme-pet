<?php

namespace Be\Theme\Pet\Section\App\Shop\Category\Products;

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

        $request = Be::getRequest();
        $response = Be::getResponse();

        $page = $request->get('page', 1);
        if ($page > $this->config->maxPages) {
            $page = $this->config->maxPages;
        }
        $params = [
            'categoryId' => $this->page->categoryId,
            'orderBy' => 'publish_time',
            'orderByDir' => 'desc',
            'pageSize' => $this->config->pageSize,
            'page' => $page,
        ];

        $result = Be::getService('App.Shop.Product')->search('', $params);

        echo Be::getService('Theme.Pet.ShopSection')->makePagedProductsSection($this, 'app-shop-category-products', $result);

    }

}

