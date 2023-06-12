<?php

namespace Be\Theme\Pet\Section\SpecialCollection;

use Be\Theme\Section;

class Template extends Section
{
    public array $positions = ['*'];

    private function css()
    {
        echo '<style type="text/css">';
        echo $this->getCssPadding('special-collection');
        echo $this->getCssMargin('special-collection');
        echo $this->getCssSpacing('special-collection-items', 'special-collection-item', '100%', '50%', '33.333333333333%');

        echo '#' . $this->id . ' .special-collection-title {';
        echo 'margin-bottom: 2rem;';
        echo '}';

        echo '#' . $this->id . ' .special-collection-title h2 {';
        echo 'text-align: center;';
        echo 'font-size: 2rem;';
        echo 'font-family: \'Fredoka One\';';
        echo 'font-weight: 400;';
        echo '}';


        echo '#' . $this->id . ' .special-collection-items {';
        echo 'position: relative;';
        echo '}';

        echo '#' . $this->id . ' .special-collection-ornament-image-left-top {';
        echo 'position: absolute;';
        echo 'z-index: 9;';
        echo 'left: 0;';
        echo 'top: 0;';
        echo 'transform: translate(-30%, -30%)';
        echo '}';

        echo '#' . $this->id . ' .special-collection-ornament-image-right-bottom {';
        echo 'position: absolute;';
        echo 'z-index: 9;';
        echo 'right: 0;';
        echo 'bottom: 6rem;';
        echo 'transform: translate(50%, 30%)';
        echo '}';


        echo '#' . $this->id . ' .special-collection-item a {';
        echo 'display: block;';
        echo '}';

        echo '#' . $this->id . ' .special-collection-item a:hover {';
        echo 'animation: swingBanner 1s ease-in-out 1;';
        echo '}';

        echo '#' . $this->id . ' .special-collection-item img {';
        echo 'width: 100%;';
        echo '}';

        echo '#' . $this->id . ' .special-collection-item-title {';
        echo 'font-size: 1.5rem;';
        echo 'font-family: \'Fredoka One\';';
        echo 'font-weight: 400;';
        echo '}';

        echo '</style>';
    }


    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        $this->css();

        echo '<div class="special-collection">';
        echo '<div class="be-container">';

        echo '<div class="special-collection-title">';
        echo'<h2>' . $this->config->title . '</h2>';
        echo '</div>';

        echo '<div class="special-collection-items">';

        if ($this->config->ornamentImageLeftTop !== '') {
            echo '<div class="special-collection-ornament-image-left-top">';
            echo '<img src="' . $this->config->ornamentImageLeftTop . '">';
            echo '</div>';
        }

        if ($this->config->ornamentImageRightBottom !== '') {
            echo '<div class="special-collection-ornament-image-right-bottom">';
            echo '<img src="' . $this->config->ornamentImageRightBottom . '">';
            echo '</div>';
        }

        foreach ($this->config->items as $item) {
            $itemConfig = $item['config'];
            if ($itemConfig->enable) {
                echo '<div class="special-collection-item">';
                switch ($item['name']) {
                    case 'Collection':
                        echo '<a href="' . $itemConfig->link . '">';
                        echo '<img src="' . $itemConfig->image . '">';
                        echo '</a>';

                        if ($itemConfig->subTitle !== '') {
                            echo '<div class="be-mt-100 be-ta-center">';
                            echo $itemConfig->subTitle;
                            echo '</div>';
                        }

                        if ($itemConfig->title !== '') {
                            echo '<div class="be-mt-50 be-ta-center special-collection-item-title">';
                            echo $itemConfig->title;
                            echo '</div>';
                        }
                        break;
                }
                echo '</div>';
            }
        }

        echo '</div>';

        echo '</div>';
        echo '</div>';
    }

}
