<?php

namespace Be\Theme\Pet\Section\BannersWithContent;

use Be\Theme\Section;

class Template extends Section
{
    public array $positions = ['*'];

    private function css()
    {
        echo '<style type="text/css">';
        echo $this->getCssPadding('banners-with-content');
        echo $this->getCssMargin('banners-with-content');
        echo $this->getCssSpacing('banners-with-content-items', 'banners-with-content-item', '100%', '50%', '50%');


        echo '#' . $this->id . ' .banners-with-content-items {';
        echo 'position: relative;';
        echo '}';

        echo '#' . $this->id . ' .banners-with-content-ornament-image-left-top {';
        echo 'position: absolute;';
        echo 'z-index: 9;';
        echo 'left: 0;';
        echo 'top: 0;';
        echo 'transform: translate(-30%, -30%)';
        echo '}';

        echo '#' . $this->id . ' .banners-with-content-ornament-image-right-bottom {';
        echo 'position: absolute;';
        echo 'z-index: 9;';
        echo 'right: 0;';
        echo 'bottom: 0;';
        echo 'transform: translateX(20%)';
        echo '}';


        echo '#' . $this->id . ' .banners-with-content-item {';
        echo 'position: relative;';
        echo '}';

        echo '#' . $this->id . ' .banners-with-content-item:hover .banners-with-content-item-image {';
        echo 'animation: swingBanner 1s ease-in-out 1;';
        echo '}';

        echo '#' . $this->id . ' .banners-with-content-item-image a {';
        echo 'display: block;';
        echo '}';

        echo '#' . $this->id . ' .banners-with-content-item-image img {';
        echo 'display: block;';
        echo 'width: 100%;';
        echo '}';


        echo '#' . $this->id . ' .banners-with-content-item-content {';
        echo 'position: absolute;';
        echo '}';

        echo '#' . $this->id . ' .banners-with-content-item-title {';
        echo 'color: #fff;';
        echo 'font-size: 2rem;';
        echo 'font-family: \'Fredoka One\';';
        echo 'font-weight: 400;';
        echo '}';

        echo '#' . $this->id . ' .banners-with-content-item-description {';
        echo 'color: #fff;';
        echo '}';

        echo '</style>';
    }


    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        $this->css();

        echo '<div class="banners-with-content">';
        echo '<div class="be-container">';

        echo '<div class="banners-with-content-items">';

        if ($this->config->ornamentImageLeftTop !== '') {
            echo '<div class="banners-with-content-ornament-image-left-top">';
            echo '<img src="' . $this->config->ornamentImageLeftTop . '">';
            echo '</div>';
        }

        if ($this->config->ornamentImageRightBottom !== '') {
            echo '<div class="banners-with-content-ornament-image-right-bottom">';
            echo '<img src="' . $this->config->ornamentImageRightBottom . '">';
            echo '</div>';
        }

        foreach ($this->config->items as $item) {
            $itemConfig = $item['config'];
            if ($itemConfig->enable) {
                echo '<div class="banners-with-content-item">';
                switch ($item['name']) {
                    case 'Banner':
                        echo '<div class="banners-with-content-item-image">';
                        echo '<a href="' . $itemConfig->link . '">';
                        echo '<img src="' . $itemConfig->image . '">';
                        echo '</a>';
                        echo '</div>';

                        echo '<div class="banners-with-content-item-content" style="';
                        echo 'width: ' . $itemConfig->contentWidth . ';';
                        if ($itemConfig->contentPosition === 'custom') {
                            if ($itemConfig->contentPositionLeft >= 0) {
                                echo 'left: ' . $itemConfig->contentPositionLeft . 'px;';
                            }
                            if ($itemConfig->contentPositionRight >= 0) {
                                echo 'right: ' . $itemConfig->contentPositionRight . 'px;';
                            }
                            if ($itemConfig->contentPositionTop >= 0) {
                                echo 'top: ' . $itemConfig->contentPositionTop . 'px;';
                            }
                            if ($itemConfig->contentPositionBottom >= 0) {
                                echo 'bottom: ' . $itemConfig->contentPositionBottom . 'px;';
                            }
                        } else {
                            echo 'top: 50%;';
                            echo 'transform: translateY(-50%);';
                            if ($itemConfig->contentPosition === 'left') {
                                echo 'left: 5%;';
                            } elseif ($itemConfig->contentPosition === 'center') {
                                echo 'left: 50%;';
                                echo 'transform: translateX(-50%);';
                            } elseif ($itemConfig->contentPosition === 'right') {
                                echo 'right: 5%;';
                            }
                        }
                        echo '">';
                        echo '<div class="banners-with-content-item-title">' . $itemConfig->title . '</div>';
                        echo '<div class="be-mt-100 banners-with-content-item-description">' . $itemConfig->description . '</div>';
                        echo '<div class="be-mt-100 banners-with-content-item-button">';
                        echo '<a href="' . $itemConfig->buttonLink . '" class="be-btn be-btn-round be-btn-large">' . $itemConfig->button . '</a>';
                        echo '</div>';

                        echo '</div>';

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
