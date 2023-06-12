<?php

namespace Be\Theme\Pet\Section\BannerWithContent;

use Be\Theme\Section;

class Template extends Section
{
    public array $positions = ['*'];

    private function css()
    {
        echo '<style type="text/css">';
        echo $this->getCssPadding('banner-with-content');
        echo $this->getCssMargin('banner-with-content');

        echo '#' . $this->id . '{';
        echo '}';

        echo '#' . $this->id . ' .banner-with-content-bg {';
        echo 'height: ' . $this->config->height . 'px;';
        echo 'background-image: url(' . $this->config->image . ');';
        echo 'background-position: center;';
        echo 'background-size: cover;';
        echo 'border-radius: 1rem;';
        echo 'position: relative;';
        echo '}';


        echo '#' . $this->id . ' .banner-with-content-container {';
        echo 'position: absolute;';
        echo '}';

        echo '#' . $this->id . ' .banner-with-content-title {';
        echo 'color: #fff;';
        echo 'font-size: 2rem;';
        echo 'font-family: \'Fredoka One\';';
        echo 'font-weight: 400;';
        echo '}';

        echo '#' . $this->id . ' .banner-with-content-description {';
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

        echo '<div class="banner-with-content">';
        echo '<div class="be-container">';
        echo '<div class="banner-with-content-bg">';

        echo '<div class="banner-with-content-container" style="';
        echo 'width: ' . $this->config->contentWidth . ';';
        if ($this->config->contentPosition === 'custom') {
            if ($this->config->contentPositionLeft >= 0) {
                echo 'left: ' . $this->config->contentPositionLeft . 'px;';
            }
            if ($this->config->contentPositionRight >= 0) {
                echo 'right: ' . $this->config->contentPositionRight . 'px;';
            }
            if ($this->config->contentPositionTop >= 0) {
                echo 'top: ' . $this->config->contentPositionTop . 'px;';
            }
            if ($this->config->contentPositionBottom >= 0) {
                echo 'bottom: ' . $this->config->contentPositionBottom . 'px;';
            }
        } else {
            echo 'top: 50%;';
            echo 'transform: translateY(-50%);';
            if ($this->config->contentPosition === 'left') {
                echo 'left: 5%;';
            } elseif ($this->config->contentPosition === 'center') {
                echo 'left: 50%;';
                echo 'transform: translateX(-50%);';
            } elseif ($this->config->contentPosition === 'right') {
                echo 'right: 5%;';
            }
        }
        echo '">';
        echo '<div class="banner-with-content-title">' . $this->config->title . '</div>';
        echo '<div class="be-mt-100 banner-with-content-description">' . $this->config->description . '</div>';
        echo '<div class="be-mt-100 banner-with-content-button">';
        echo '<a href="' . $this->config->buttonLink . '" class="be-btn be-btn-round be-btn-large">' . $this->config->button . '</a>';
        echo '</div>';

        echo '</div>';


        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

}
