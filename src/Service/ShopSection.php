<?php

namespace Be\Theme\Pet\Service;


use Be\Be;

class ShopSection
{

    /**
     * 生成商品列表部件
     *
     * @param object $section
     * @param string $class
     * @param array $products
     * @param string $defaultMoreLink
     * @return string
     */
    public function makeProductsSection(object $section, string $class, array $products, string $defaultMoreLink = null): string
    {
        $count = count($products);
        if ($count === 0) {
            return '';
        }

        $html = '';
        $html .= '<style type="text/css">';
        $html .= $this->makeProductsSectionPublicCss($section, $class);

        $html .= '#' . $section->id . ' .' . $class . '-title {';
        $html .= 'margin-bottom: 2rem;';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . '-title h2 {';
        $html .= 'text-align: center;';
        $html .= 'font-size: 2rem;';
        $html .= 'font-family: \'Fredoka One\';';
        $html .= 'font-weight: 400;';
        $html .= '}';

        $html .= '</style>';


        $html .= '<div class="' . $class . '">';

        if ($section->position === 'middle' && $section->config->width === 'default') {
            $html .= '<div class="be-container">';
        }

        if ($section->config->title !== '') {
            $html .= '<div class="' . $class . '-title">';
            $html .= '<h2>' . $section->config->title . '</h2>';
            $html .= '</div>';
        }

        $html .= $this->makeProductsSectionPublicHtml($section, $class, $products);

        if ($section->position === 'middle' && $section->config->width === 'default') {
            $html .= '</div>';
        }

        $html .= '</div>';

        return $html;
    }


    /**
     * 生成分页商品列表部件
     *
     * @param object $section
     * @param string $class
     * @param array $result
     * @return string
     */
    public function makePagedProductsSection(object $section, string $class, array $result): string
    {
        if ($result['total'] === 0) {
            return '';
        }

        $html = '';
        $html .= '<style type="text/css">';
        $html .= $this->makeProductsSectionPublicCss($section, $class);
        $html .= '</style>';

        $html .= '<div class="' . $class . '">';
        if ($section->position === 'middle' && $section->config->width === 'default') {
            $html .= '<div class="be-container">';
        }

        $html .= $this->makeProductsSectionPublicHtml($section, $class, $result['rows']);

        $total = $result['total'];
        $pageSize = $result['pageSize'];
        $pages = ceil($total / $pageSize);

        if (isset($section->config->maxPages) && $section->config->maxPages > 0) {
            $maxPages = $section->config->maxPages;
        } else {
            $maxPages = floor(10000 / $pageSize);
        }
        if ($pages > $maxPages) {
            $pages = $maxPages;
        }

        if ($pages > 1) {
            $page = $result['page'];
            if ($page > $pages) $page = $pages;

            $request = Be::getRequest();
            $route = $request->getRoute();
            $params = $request->get();

            $html .= '<nav class="be-mt-300">';
            $html .= '<ul class="be-pagination be-pagination-lg" style="justify-content: center;">';
            $html .= '<li>';
            if ($page > 1) {
                $params['page'] = $page - 1;
                $html .= '<a href="' . beUrl($route, $params) . '">Preview</a>';
            } else {
                $html .= '<span>Preview</span>';
            }
            $html .= '</li>';

            $from = null;
            $to = null;
            if ($pages < 9) {
                $from = 1;
                $to = $pages;
            } else {
                $from = $page - 4;
                if ($from < 1) {
                    $from = 1;
                }

                $to = $from + 8;
                if ($to > $pages) {
                    $to = $pages;
                }
            }

            if ($from > 1) {
                $html .= '<li><span>...</span></li>';
            }

            for ($i = $from; $i <= $to; $i++) {
                if ($i == $page) {
                    $html .= '<li class="active">';
                    $html .= '<span>' . $i . '</span>';
                    $html .= '</li>';
                } else {
                    $html .= '<li>';
                    $params['page'] = $i;
                    $html .= '<a href="' . beUrl($route, $params) . '">' . $i . '</a>';
                    $html .= '</li>';
                }
            }

            if ($to < $pages) {
                $html .= '<li><span>...</span></li>';
            }

            $html .= '<li>';
            if ($page < $pages) {
                $params['page'] = $page + 1;
                $html .= '<a href="' . beUrl($route, $params) . '">Next</a>';
            } else {
                $html .= '<span>Next</span>';
            }
            $html .= '</li>';
            $html .= '</ul>';
            $html .= '</nav>';
        }

        if ($section->position === 'middle' && $section->config->width === 'default') {
            $html .= '</div>';
        }
        $html .= '</div>';

        return $html;
    }


    /**
     * 生成商品列表部件
     *
     * @param object $section
     * @param string $class
     * @param array $products
     * @param string $defaultMoreLink
     * @return string
     */
    public function makeSideProductsSection(object $section, string $class, array $products, string $defaultMoreLink = null): string
    {
        $html = '';
        $html .= '<style type="text/css">';
        $html .= $section->getCssBackgroundColor($class);
        $html .= $section->getCssPadding($class);
        $html .= $section->getCssMargin($class);

        $html .= '#' . $section->id . ' .' . $class . '-title {';
        $html .= 'font-size: 1.25rem;';
        $html .= 'font-family: \'Fredoka One\';';
        $html .= 'font-weight: 400;';
        $html .= 'border-bottom: 1px solid var(--font-color-9);';
        $html .= 'padding-bottom: .5rem;';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . '-product-image {';
        $html .= 'width: 80px;';
        $html .= 'position: relative;';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . '-product-image:after {';
        $html .= 'position: absolute;';
        $html .= 'content: \'\';';
        $html .= 'left: 0;';
        $html .= 'top: 0;';
        $html .= 'width: 100%;';
        $html .= 'height: 100%;';
        $html .= 'background: #000;';
        $html .= 'opacity: .03;';
        $html .= 'pointer-events: none;';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . '-product-image a {';
        $html .= 'display: block;';
        $html .= 'position: relative;';

        $configProduct = Be::getConfig('App.Shop.Product');
        $html .= 'aspect-ratio: ' . $configProduct->imageAspectRatio . ';';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . '-product-image img {';
        $html .= 'display: block;';
        $html .= 'position: absolute;';
        $html .= 'left: 0;';
        $html .= 'right: 0;';
        $html .= 'top: 0;';
        $html .= 'bottom: 0;';
        $html .= 'margin: auto;';
        $html .= 'max-width: 100%;';
        $html .= 'max-height: 100%;';
        $html .= 'transition: all .3s;';
        $html .= '}';


        $html .= '</style>';

        $html .= '<div class="' . $class . '">';
        if ($section->position === 'middle' && $section->config->width === 'default') {
            $html .= '<div class="be-container">';
        }

        if ($section->config->title !== '') {
            $html .= '<div class="' . $class . '-title">';
            $html .= $section->config->title;
            $html .= '</div>';
        }

        $nnImage = Be::getProperty('App.Shop')->getWwwUrl() . '/images/product/no-image.jpg';
        $isMobile = \Be\Be::getRequest()->isMobile();
        foreach ($products as $product) {
            $html .= '<div class="be-row be-my-100">';
            $html .= '<div class="be-col-24 be-lg-col-auto">';

            $defaultImage = null;
            foreach ($product->images as $image) {
                if ($image->is_main) {
                    $defaultImage = $image;
                }
            }

            if (!$defaultImage && count($product->images) > 0) {
                $defaultImage = $product->images[0];
            }

            if (!$defaultImage) {
                $defaultImage = (object)[
                    'url' => $nnImage,
                    'is_main' => 1,
                ];
            }

            $html .= '<div class="' . $class . '-product-image">';
            $html .= '<a href="' . beUrl('Shop.Product.detail', ['id' => $product->id]) . '"';
            if (!$isMobile) {
                $html .= ' target="_blank"';
            }
            $html .= '>';
            $html .= '<img src="' . $defaultImage->url . '" alt="' . htmlspecialchars($product->name) . '">';
            $html .= '</a>';
            $html .= '</div>';

            $html .= '</div>';
            $html .= '<div class="be-col-24 be-lg-col-auto"><div class="be-pl-100 be-mt-100"></div></div>';
            $html .= '<div class="be-col-24 be-lg-col" style="display:flex; align-items: center;">';
            $html .= '<div>';
            $html .= '<a class="be-d-block be-t-ellipsis-3" href="' . beUrl('Shop.Product.detail', ['id' => $product->id]) . '" title="' . $product->title . '"';
            if (!$isMobile) {
                $html .= ' target="_blank"';
            }
            $html .= '>';
            $html .= $product->name;
            $html .= '</a>';


            $html .= '<div class="be-mt-50">';
            $configStore = Be::getConfig('App.Shop.Store');
            $html .= '<span class="be-c-red be-fw-bold">' . $configStore->currencySymbol;
            if ($product->price_from === $product->price_to) {
                $html .= $product->price_from;
            } else {
                $html .= $product->price_from . '~' . $product->price_to;;
            }
            $html .= '</span>';

            if ($product->original_price_from > 0 && $product->original_price_from != $product->price_from) {
                $html .= '<span class="be-td-line-through be-ml-50 be-c-font-4">' . $configStore->currencySymbol;
                if ($product->original_price_from === $product->original_price_to) {
                    $html .= $product->original_price_from;
                } else {
                    $html .= $product->original_price_from . '~' . $product->original_price_to;;
                }
                $html .= '</span>';
            }
            $html .= '</div>';


            $html .= '<div class="be-mt-50 be-c-major">';
            $averageRating = round($product->rating_avg);
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $averageRating) {
                    $html .= '<i class="bi-star-fill"></i>';
                } else {
                    $html .= '<i class="bi-star"></i>';
                }
            }
            $html .= '</div>';


            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }

        if ($section->position === 'middle' && $section->config->width === 'default') {
            $html .= '</div>';
        }
        $html .= '</div>';

        return $html;
    }



    private function makeProductsSectionPublicCss(object $section, string $class)
    {
        $css = $section->getCssBackgroundColor($class);
        $css .= $section->getCssPadding($class);
        $css .= $section->getCssMargin($class);


        $itemWidthMobile = '100%';
        $itemWidthTablet = '50%';
        $itemWidthDesktop = '33.333333333333%';
        $itemWidthDesktopXl = '';
        $itemWidthDesktopXxl = '';
        $itemWidthDesktopX3l = '';
        $cols = 4;
        if (isset($section->config->cols)) {
            $cols = $section->config->cols;
        }
        if ($cols >= 4) {
            $itemWidthDesktopXl = '25%';
        }
        if ($cols >= 5) {
            $itemWidthDesktopXxl = '20%';
        }
        if ($cols >= 6) {
            $itemWidthDesktopX3l = '16.666666666666%';
        }
        $css .= $section->getCssSpacing($class . '-products', $class . '-product', $itemWidthMobile, $itemWidthTablet, $itemWidthDesktop, $itemWidthDesktopXl, $itemWidthDesktopXxl, $itemWidthDesktopX3l);


        $css .= '#' . $section->id . ' .' . $class . '-product-image {';
        $css .= 'position: relative;';
        $css .= 'overflow: hidden;';
        $css .= '}';

        $css .= '#' . $section->id . ' .' . $class . '-product-image:after {';
        $css .= 'position: absolute;';
        $css .= 'content: \'\';';
        $css .= 'left: 0;';
        $css .= 'top: 0;';
        $css .= 'width: 100%;';
        $css .= 'height: 100%;';
        $css .= 'background: #000;';
        $css .= 'opacity: .03;';
        $css .= 'pointer-events: none;';
        $css .= '}';

        $css .= '#' . $section->id . ' .' . $class . '-product-image a {';
        $css .= 'display: block;';
        $css .= 'position: relative;';

        $configProduct = Be::getConfig('App.Shop.Product');
        $css .= 'aspect-ratio: ' . $configProduct->imageAspectRatio . ';';
        $css .= '}';

        $css .= '#' . $section->id . ' .' . $class . '-product-image img {';
        $css .= 'display: block;';
        $css .= 'position: absolute;';
        $css .= 'left: 0;';
        $css .= 'right: 0;';
        $css .= 'top: 0;';
        $css .= 'bottom: 0;';
        $css .= 'margin: auto;';
        $css .= 'max-width: 100%;';
        $css .= 'max-height: 100%;';
        $css .= 'transition: all .3s;';
        $css .= '}';


        $css .= '#' . $section->id . ' .' . $class . '-product-image .' . $class . '-product-image-2 {';
        $css .= 'opacity:0;';
        $css .= '}';

        $css .= '#' . $section->id . ' .' . $class . '-product-image:hover .' . $class . '-product-image-1 {';
        $css .= 'opacity:0;';
        $css .= '}';

        $css .= '#' . $section->id . ' .' . $class . '-product-image:hover .' . $class . '-product-image-2 {';
        $css .= 'opacity:1;';
        $css .= 'transform: scale(1.1);';
        $css .= '}';


        $css .= '#' . $section->id . ' .' . $class . '-product-image-actions {';
        $css .= 'position: absolute;';
        $css .= 'top: 1rem;';
        $css .= 'right: 1rem;';
        $css .= 'width: 3rem;';
        //$css .= 'display: none;';
        $css .= '}';

        $css .= '#' . $section->id . ' .' . $class . '-product-image-actions a {';
        $css .= 'display: inline-block;';
        $css .= 'background-color: #fff;';
        $css .= 'color: var(--font-color);';
        $css .= 'border-radius: 50%;';
        $css .= 'font-size: 1rem;';
        $css .= 'line-height: 1rem;';
        $css .= 'width: 2.5rem;';
        $css .= 'height: 2.5rem;';
        $css .= 'padding: .75rem;';
        $css .= 'margin: .25rem 0;';
        //$css .= 'transition: all .3s;';
        $css .= 'transform: translateX(3rem);';
        $css .= 'opacity: 0;';
        $css .= '}';


        $css .= '#' . $section->id . ' .' . $class . '-product-image-actions a:hover {';
        $css .= 'background-color: var(--major-color);';
        $css .= 'color: #fff;';
        $css .= '}';

        $css .= '#' . $section->id . ' .' . $class . '-product:hover .' . $class . '-product-image-actions {';
        //$css .= 'display: block;';
        $css .= '}';

        $css .= '#' . $section->id . ' .' . $class . '-product:hover .' . $class . '-product-image-actions a {';
        $css .= 'transform: translateX(0);';
        $css .= 'opacity: 1;';
        $css .= '}';

        $css .= '#' . $section->id . ' .' . $class . '-product:hover .be-btn {';
        $css .= 'background-color: var(--major-color);';
        $css .= 'border-color: var(--major-color);';
        $css .= 'color: #fff;';
        $css .= '}';


        return $css;
    }

    private function makeProductsSectionPublicHtml(object $section, string $class, array $products)
    {
        $configStore = Be::getConfig('App.Shop.Store');
        $isMobile = \Be\Be::getRequest()->isMobile();
        $nnImage = Be::getProperty('App.Shop')->getWwwUrl() . '/images/product/no-image.jpg';

        $html = '<div class="' . $class . '-products">';
        foreach ($products as $product) {

            $defaultImage = null;
            $hoverImage = null;
            foreach ($product->images as $image) {
                if ($image->is_main) {
                    $defaultImage = $image->url;
                } else {
                    $hoverImage = $image->url;
                }

                if ($defaultImage && $hoverImage) {
                    break;
                }
            }

            if (!$defaultImage && count($product->images) > 0) {
                $defaultImage = $product->images[0]->url;
            }

            if (!$defaultImage) {
                $defaultImage = $nnImage;
            }

            $html .= '<div class="' . $class . '-product">';

            $html .= '<div class="be-ta-center ' . $class . '-product-image">';
            $html .= '<a href="' . beUrl('Shop.Product.detail', ['id' => $product->id]) . '"';
            if (!$isMobile) {
                $html .= ' target="_blank"';
            }
            $html .= '>';

            $html .= '<img src="' . $defaultImage . '" class="' . $class . '-product-image-1" alt="' . htmlspecialchars($product->name) . '" />';
            if ($hoverImage) {
                $html .= '<img src="' . $hoverImage . '" class="' . $class . '-product-image-2" alt="' . htmlspecialchars($product->name) . '" />';
            }

            $html .= '</a>';

            $html .= '<div class="be-ta-center ' . $class . '-product-image-actions">';
            $html .= '<a href="' . beUrl('Shop.Product.detail', ['id' => $product->id]) . '" style="transition: all .3s;">';
            $html .= '<i class="bi-heart"></i>';
            $html .= '</a>';

            $html .= '<a href="' . beUrl('Shop.Product.detail', ['id' => $product->id]) . '" style="transition: all .4s;">';
            $html .= '<i class="bi-eye"></i>';
            $html .= '</a>';
            $html .= '</div>';

            $html .= '</div>';


            $html .= '<div class="be-mt-100 be-ta-center">';
            $html .= '<a class="be-d-block be-t-ellipsis-3" href="' . beUrl('Shop.Product.detail', ['id' => $product->id]) . '"';
            if (!$isMobile) {
                $html .= ' target="_blank"';
            }
            $html .= '>';
            $html .= $product->name;
            $html .= '</a>';
            $html .= '</div>';


            $html .= '<div class="be-mt-100 be-ta-center">';

            $html .= '<span class="be-c-red be-fw-bold">' . $configStore->currencySymbol;
            if ($product->price_from === $product->price_to) {
                $html .= $product->price_from;
            } else {
                $html .= $product->price_from . '~' . $product->price_to;;
            }
            $html .= '</span>';

            if ($product->original_price_from > 0 && $product->original_price_from != $product->price_from) {
                $html .= '<span class="be-td-line-through be-ml-50 be-c-font-4">' . $configStore->currencySymbol;
                if ($product->original_price_from === $product->original_price_to) {
                    $html .= $product->original_price_from;
                } else {
                    $html .= $product->original_price_from . '~' . $product->original_price_to;;
                }
                $html .= '</span>';
            }

            $html .= '</div>';


            $html .= '<div class="be-mt-100 be-ta-center be-c-major">';
            $averageRating = round($product->rating_avg);
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $averageRating) {
                    $html .= '<i class="bi-star-fill"></i>';
                } else {
                    $html .= '<i class="bi-star"></i>';
                }
            }
            $html .= '</div>';


            $html .= '<div class="be-mt-150 be-ta-center">';
            if (count($product->items) > 1) {
                $html .= '<input type="button" class="be-btn be-btn-round" value="Quick Buy" onclick="quickBuy(\'' . $product->id . '\')">';
            } else {
                $productItem = $product->items[0];
                $html .= '<input type="button" class="be-btn be-btn-round" value="Add to Cart" onclick="addToCart(\'' . $product->id . '\', \'' . $productItem->id . '\')">';
            }
            $html .= '</div>';

            $html .= '</div>';
        }
        $html .= '</div>';

        return $html;
    }

}
