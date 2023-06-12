<?php

namespace Be\Theme\Pet\Section\App\Shop\Category\TopNSide;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{

    public array $positions = ['west', 'east'];


    private function css()
    {
        echo '<style type="text/css">';
        echo $this->getCssBackgroundColor('app-shop-category-top-n-side');
        echo $this->getCssPadding('app-shop-category-top-n-side');
        echo $this->getCssMargin('app-shop-category-top-n-side');

        echo '#' . $this->id . ' .app-shop-category-top-n-side-title {';
        echo 'font-size: 1.25rem;';
        echo 'font-family: \'Fredoka One\';';
        echo 'font-weight: 400;';
        echo 'border-bottom: 1px solid var(--font-color-9);';
        echo 'padding-bottom: .5rem;';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-top-n-side ul {';
        echo 'margin: 1rem 0 0 0;';
        echo 'padding: 0;';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-top-n-side li {';
        echo 'list-style: none;';
        echo '}';

        echo '#' . $this->id . ' .app-shop-category-top-n-side a {';
        echo 'display: block;';
        echo 'margin-top: 1rem;';
        echo '}';

        echo '</style>';
    }


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

        echo '<div class="app-shop-category-top-n-side">';

        if ($this->config->title !== '') {
            echo '<div class="app-shop-category-top-n-side-title">';
            echo $this->config->title;
            echo '</div>';
        }

        echo '<ul>';
        foreach ($categories as $category) {
            echo '<li>';
            echo '<a href="'. beUrl('Shop.Category.products', ['id' => $category->id]) .'">' . $category->name . '</a>';
            echo '</li>';
        }
        echo '</ul>';

        echo '</div>';
    }
}
