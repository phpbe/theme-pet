<?php

namespace Be\Theme\Pet\Section\App\Shop\Category\TopN;

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

        $categories = Be::getService('App.Shop.Category')->getCategories($this->config->quantity);
        if (count($categories) === 0) {
            return;
        }

        $this->css();

        echo '<div class="app-shop-category-top-n">';
        echo '<div class="be-container">';

        if ($this->config->title !== '') {
            echo '<div class="app-shop-category-top-n-title">';
            echo '<h2 class="be-h3">' . $this->config->title . '</h2>';
            echo '</div>';
        }


        $isMobile = \Be\Be::getRequest()->isMobile();

        echo '<div class="app-shop-category-top-n-items">';
        foreach ($categories as $category) {

            $link = '<a href="' . beUrl('Shop.Category.products', ['id' => $category->id]) . '"';
            if (!$isMobile) {
                $link .= ' target="_blank"';
            }
            $link .= '>';


            echo '<div class="app-shop-category-top-n-item">';
            echo '<div class="app-shop-category-top-n-item-container">';

            echo '<div class="be-row">';

            echo '<div class="be-col-auto">';
            echo '<div class="app-shop-category-top-n-item-image">';
            echo $link;
            echo '<img src="' . $category->image . '" alt="' . htmlspecialchars($category->name) . '">';
            echo '</a>';
            echo '</div>'; // app-shop-category-top-n-item-image
            echo '</div>';

            echo '<div class="be-col" style="display: flex; align-items: center;">';
            echo '<div class="be-px-100">';
            echo '<div class="app-shop-category-top-n-item-name">';
            echo $link;
            echo $category->name;
            echo '</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            echo '<div class="be-col-auto" style="display: flex; align-items: center;">';
            echo '<div class="app-shop-category-top-n-item-icon">';
            echo $link;
            echo '<i class="bi-chevron-right"></i>';
            echo '</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>'; // be-row

            echo '</div>'; // app-shop-category-top-n-item-container
            echo '</div>'; // app-shop-category-top-n-item
        }
        echo '</div>';

        echo '</div>';
        echo '</div>';
    }

    private function css()
    {
        echo '<style type="text/css">';
        echo $this->getCssPadding('app-shop-category-top-n');
        echo $this->getCssMargin('app-shop-category-top-n');
        echo $this->getCssSpacing('app-shop-category-top-n-items', 'app-shop-category-top-n-item', '100%', '50%', '33.3333333%', '25%', '20%');

        echo '#' . $this->id . '{';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-top-n {';
        echo '}';


        echo '#' . $this->id . ' .app-shop-category-top-n-title {';
        echo 'margin-bottom: 2rem;';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-top-n-title h2 {';
        echo 'padding-bottom: 1rem;';
        echo 'font-size: 2rem;';
        echo 'font-family: \'Fredoka One\';';
        echo 'font-weight: 400;';
        echo '}';


        echo '#' . $this->id . ' .app-shop-category-top-n-item-container {';
        echo 'transition: all .3s;';
        echo 'background-color: var(--major-color-9);';
        echo 'border-radius: 50px;';
        echo 'padding: .75rem;';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-top-n-item-container:hover {';
        echo 'animation: swingBanner 1s ease-in-out 1;';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-top-n-item-image a {';
        echo 'display: block;';
        echo 'overflow:hidden;';
        echo '}';


        echo '#' . $this->id . ' .app-shop-category-top-n-item-image img {';
        echo 'display: block;';
        echo 'width: 100%;';
        echo 'transition: all .3s;';
        echo '}';


        echo '#' . $this->id . ' .app-shop-category-top-n-item-name a {';
        echo 'font-size: 1.5rem;';
        echo 'font-family: \'Fredoka One\';';
        echo '}';


        echo '#' . $this->id . ' .app-shop-category-top-n-item-icon a {';
        echo 'display: block;';
        echo 'width: 2rem;';
        echo 'height: 2rem;';
        echo 'line-height: 2rem;';
        echo 'text-align: center;';
        echo 'font-size: 1rem;';
        echo 'color: #fff;';
        echo 'background-color: var(--major-color);';
        echo 'border-radius: 50%;';
        echo 'opacity: 0;';
        echo 'transition: all .3s;';
        echo '}';


        echo '#' . $this->id . ' .app-shop-category-top-n-item-container:hover .app-shop-category-top-n-item-icon a {';
        echo 'opacity: 1;';
        echo '}';

        echo '</style>';
    }


}

