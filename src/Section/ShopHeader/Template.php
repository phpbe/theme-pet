<?php

namespace Be\Theme\Pet\Section\ShopHeader;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{

    public array $positions = ['north'];

    private function css()
    {
        echo '<style type="text/css">';

        echo '.shop-header {';
        echo 'background-image: url(' . $this->config->backgroundImage . ');';
        echo 'background-position: center center;';
        echo 'background-repeat: no-repeat;';
        echo 'background-size: cover;';
        echo '}';

        echo '@media (max-width: 768px) {';
        echo '.shop-header {';
        echo 'padding: 2rem 0;';
        echo '}';
        echo '}';

        echo '@media (min-width: 768px) {';
        echo '.shop-header {';
        echo 'padding: 4rem 0;';
        echo '}';
        echo '}';

        echo '@media (min-width: 992px) {';
        echo '.shop-header {';
        echo 'padding: 6rem 0;';
        echo '}';
        echo '}';

        echo '.shop-header-title {';
        echo 'color: #fff;';
        echo 'text-align: center;';
        echo 'font-size: 2rem;';
        echo 'font-family: \'Fredoka One\';';
        echo 'font-weight: 400;';
        echo '}';

        echo '.shop-header-pathway a {';
        echo 'color: #fff;';
        echo '}';

        echo '.shop-header-pathway a:hover {';
        echo 'color: var(--major-color);';
        echo '}';

        echo '.shop-header-slider {';
        echo '--swiper-navigation-size: 4rem;';
        echo '--swiper-navigation-color: var(--major-color);';
        echo '}';

        echo '.shop-header-slider .swiper {';
        echo 'padding: 0 2rem';
        echo '}';

        echo '.shop-header-slider .swiper-button-next,';
        echo '.shop-header-slider .swiper-button-prev {';
        echo 'width: var(--swiper-navigation-size);';
        echo 'color: #fff;';
        echo 'border-radius: 50%;';
        echo 'transition: all .3s;';
        echo 'opacity: .5;';
        echo '}';

        echo '.shop-header-slider:hover .swiper-button-next,';
        echo '.shop-header-slider:hover .swiper-button-prev {';
        echo 'opacity: 1;';
        echo '}';

        echo '.shop-header-slider .swiper-button-next:hover,';
        echo '.shop-header-slider .swiper-button-prev:hover {';
        echo 'color: var(--major-color);';
        echo 'opacity: 1;';
        echo '}';

        echo '.shop-header-slider .swiper-button-next:after,';
        echo '.shop-header-slider .swiper-button-prev:after {';
        echo 'font-size: 20px;;';
        echo '}';

        echo '</style>';
    }


    public function display()
    {

        if ($this->config->enable === 0) {
            return;
        }

        $this->css();

        echo '<div class="shop-header">';
        echo '<div class="be-container">';

        echo '<h1 class="shop-header-title">';
        echo $this->page->pageTitle;
        echo '</h1>';

        echo '<div class="shop-header-pathway be-mt-100 be-ta-center">';
        echo '<a href="">Home</a>';
        $menu = \Be\Be::getMenu('North');
        $menuTree = $menu->getTree();
        $menuActiveId = $menu->getActiveId();
        foreach ($menuTree as $item) {
            if ($item->active === 1) {

                echo '<span class="be-px-50 be-c-fff"><i class="bi-chevron-right"></i></span>';
                echo '<a href="' . $item->url . '">' . $item->label . '</a>';

                if (isset($item->subItems) && is_array($item->subItems) && count($item->subItems) > 0) {
                    foreach ($item->subItems as $subItem) {
                        if ($subItem->active === 1) {
                            echo '<span class="be-px-50 be-c-fff"><i class="bi-chevron-right"></i></span>';
                            echo '<a href="' . $subItem->url . '">' . $subItem->label . '</a>';
                            break;
                        }
                    }
                }
                break;
            }
        }
        echo '</div>';

        $categories = Be::getService('App.Shop.Category')->getCategories();
        if (count($categories) > 0) {
            echo '<div class="shop-header-slider be-mt-200 be-ta-center">';

            echo '<div class="be-row">';
            echo '<div class="be-col-0 be-lg-col-2 be-xxl-col-4"></div>';
            echo '<div class="be-col-24 be-lg-col-20 be-xxl-col-16">';

            echo '<div class="swiper">';
            echo '<div class="swiper-wrapper">';
            foreach ($categories as $category) {
                echo '<div class="swiper-slide">';
                echo '<div class="shop-header-slider image">';
                echo '<a href="' . beUrl('Shop.Category.products', ['id' => $category->id]) . '">';
                echo '<img src="' . $category->image . '" alt="' . htmlspecialchars($category->name) . '">';
                echo '</a>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            echo '<div class="swiper-button-prev"></div>';
            echo '<div class="swiper-button-next"></div>';
            echo '</div>';

            echo '</div>';
            echo '<div class="be-col-0 be-lg-col-2 be-xxl-col-4"></div>';
            echo '</div>';

            echo '</div>';

            $key = 'Theme:Pet:swiper';
            if (!Be::hasContext($key)) {
                $wwwUrl = Be::getProperty('Theme.Pet')->getWwwUrl();
                echo '<link rel="stylesheet" href="' . $wwwUrl . '/lib/swiper/8.3.2/swiper-bundle.min.css">';
                echo '<script src="' . $wwwUrl . '/lib/swiper/8.3.2/swiper-bundle.min.js"></script>';
            }

            echo '<script>';
            echo 'new Swiper(".shop-header-slider .swiper", {';
            echo 'loop: true,';
            echo 'navigation: {nextEl: \'.swiper-button-next\', prevEl: \'.swiper-button-prev\'},';
            echo 'slidesPerView: 2,';
            echo 'spaceBetween: 10,';
            echo 'breakpoints: {';
            echo '1024: {';
            echo 'slidesPerView: 3';
            echo '},';
            echo '1280: {';
            echo 'slidesPerView: 4';
            echo '},';
            echo '1680: {';
            echo 'slidesPerView: 5';
            echo '}';
            echo '},';
            echo 'grabCursor : true';
            echo '});';

            echo '</script>';
        }

        echo '</div>';
        echo '</div>';
    }

}
