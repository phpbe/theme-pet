<?php

namespace Be\Theme\Pet\Section\App\Shop\Product\Products;

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

        $orderBy = $request->get('order_by', 'common');
        $orderByDir = $request->get('order_by_dir', 'desc');
        $page = $request->get('page', 1);
        if ($page > $this->config->maxPages) {
            $page = $this->config->maxPages;
        }

        $result = Be::getService('App.Shop.Product')->search('', [
            'orderBy' => $orderBy,
            'orderByDir' => $orderByDir,
            'pageSize' => $this->config->pageSize,
            'page' => $page,
        ]);

        echo Be::getService('Theme.Pet.ShopSection')->makePagedProductsSection($this, 'app-shop-products', $result);

    }

}

