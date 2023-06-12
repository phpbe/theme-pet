<?php

namespace Be\Theme\Pet\Section\Slider;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{

    public array $positions = ['middle', 'center'];

    private function css()
    {
        echo '<style type="text/css">';

        if ($this->config->pagination) {
            echo '.swiper-pagination .swiper-pagination-bullet {';
            echo 'width: 1rem;';
            echo 'height: 1rem;';
            echo 'margin: 0 2rem;';
            echo 'border-radius: 1rem;';
            echo 'background-color: #fff;';
            echo 'opacity: 1;';
            echo 'transition: all .3s;';
            echo '}';

            echo '.swiper-pagination .swiper-pagination-bullet-active {';
            echo 'width: 2rem;';
            echo 'background-color: var(--major-color);';
            echo 'opacity: 1;';
            echo '}';
        }

        if ($this->config->navigation) {
            echo '#' . $this->id . ' .slider {';
            echo '--swiper-navigation-size: ' . $this->config->navigationSize . 'px;';
            echo '--swiper-navigation-color: var(--major-color);';
            echo '}';

            echo '#' . $this->id . ' .swiper-button-next, #' . $this->id . ' .swiper-button-prev {';
            echo 'width: var(--swiper-navigation-size);';
            echo 'color: var(--font-color);';
            echo 'background-color: #fff;';
            echo 'border-radius: 50%;';
            echo 'transition: all .3s;';
            echo 'opacity: .25;';
            echo '}';

            echo '#' . $this->id . ' .slider:hover .swiper-button-next, #' . $this->id . ' .slider:hover .swiper-button-prev {';
            echo 'opacity: 1;';
            echo '}';


            echo '#' . $this->id . ' .swiper-button-next:hover, #' . $this->id . ' .swiper-button-prev:hover {';
            echo 'color: #fff !important;';
            echo 'background-color: var(--major-color) !important;';
            echo '}';

            echo '#' . $this->id . ' .swiper-button-next:after, #' . $this->id . ' .swiper-button-prev:after {';
            echo 'font-size: ' . intval($this->config->navigationSize * .5) . 'px;;';
            echo '}';
        }

        echo '.slider-image {';
        echo 'display: block;';
        echo 'width: 100%;';
        echo 'height: calc(75vh - 80px);';
        echo 'background-position: center;';
        echo 'background-size: cover;';
        echo '}';


        echo '.slider-image-with-text {';
        echo 'background-position: top center;';
        echo 'background-size: cover;';
        echo '}';

        echo '.slider-image-with-text-image {';
        echo 'padding-top: 5rem;';
        echo '}';

        echo '.slider-image-with-text-image img {';
        echo 'position:relative;';
        echo 'display: block;';
        echo 'max-width: 100%;';
        echo 'transition: all .75s linear;';
        echo 'opacity: 0;';
        echo 'left: -800px;';
        echo 'bottom: 0;';
        echo '}';

        echo '.swiper-slide-active .slider-image-with-text-image img {';
        echo 'opacity: 1;';
        echo 'left: 0;';
        echo '}';


        echo '.slider-image-with-text-content {';
        echo 'position:relative;';
        echo 'transition: all .75s linear;';
        echo 'opacity: 0;';
        echo 'left: 800px;';
        echo '}';

        echo '.slider-image-with-text-content h2 {';
        echo 'font-size: 2rem;';
        echo 'font-family: \'Fredoka One\';';
        echo 'font-weight: 400;';
        echo '}';

        echo '.swiper-slide-active .slider-image-with-text-content {';
        echo 'opacity: 1;';
        echo 'left: 0;';
        echo '}';


        echo '.slider-video video {';
        echo 'display: block;';
        echo 'width: 100%;';
        echo 'height: calc(75vh - 80px);';
        echo 'object-fit: cover;';
        echo '}';

        // 电脑端
        echo '@media (max-width: 768px) {';

        echo '.slider-image,';
        echo '.slider-video video {';
        echo 'height: 500px;';
        echo 'max-height: calc(75vh - 80px);';
        echo '}';

        echo '}';

        echo '</style>';
    }

    public function display()
    {
        if ($this->config->enable) {
            $count = 0;
            foreach ($this->config->items as $item) {
                if ($item['config']->enable) {
                    $count++;
                }
            }

            if ($count === 0) {
                return;
            }

            $this->css();

            echo '<div class="slider">';
            echo '<div class="swiper">';

            echo '<div class="swiper-wrapper">';
            foreach ($this->config->items as $item) {
                $itemConfig = $item['config'];
                if ($itemConfig->enable) {
                    echo '<div class="swiper-slide">';
                    switch ($item['name']) {
                        case 'Image':
                            echo '<div class="slider-image" style="background-image: url(' . $itemConfig->image . ')">';
                            echo '</div>';
                            break;
                        case 'ImageWithText':

                            echo '<div class="slider-image-with-text" style="background-image: url(' . $itemConfig->backgroundImage . ')">';

                            echo '<div class="be-container">';
                            echo '<div class="be-row">';
                            echo '<div class="be-col-24 be-lg-col">';

                            echo '<div class="slider-image-with-text-image">';
                            echo '<img src="' . $itemConfig->image . '">';
                            echo '</div>';

                            echo '</div>';
                            echo '<div class="be-col-24 be-lg-col-auto"><div class="be-pl-200 be-pt-100"></div></div>';
                            echo '<div class="be-col-24 be-lg-col" style="display:flex; align-items: center;">';

                            echo '<div class="slider-image-with-text-content">';
                            if ($itemConfig->title !== '') {
                                echo '<h2 class="be-mb-150">' . $itemConfig->title . '</h2>';
                            }
                            if ($itemConfig->description !== '') {
                                echo '<div class="be-mb-200">' . $itemConfig->description . '</div>';
                            }
                            if ($itemConfig->button !== '') {
                                echo '<div class="be-mb-200">';
                                echo '<a href="' . $itemConfig->buttonLink . '" class="be-btn be-btn-round be-btn-large" style="border: 0;">' . $itemConfig->button . '</a>';
                                echo '</div>';
                            }
                            echo '</div>';

                            echo '</div>';
                            echo '</div>';
                            echo '</div>';

                            echo '</div>';

                            break;
                        case 'Video':
                            echo '<div class="slider-video">';
                            echo '<video loop="loop" autoplay="autoplay" muted="muted">';
                            echo '<source src="' . $itemConfig->video . '" type="video/mp4">';
                            echo '</video>';
                            echo '</div>';
                            break;
                    }
                    echo '</div>';
                }
            }
            echo '</div>';

            if ($this->config->pagination && $count > 1) {
                echo '<div class="swiper-pagination"></div>';
            }

            if ($this->config->navigation && $count > 1) {
                echo '<div class="swiper-button-prev"></div>';
                echo '<div class="swiper-button-next"></div>';
            }

            echo '</div>';
            echo '</div>';

            $key = 'Theme:Pet:swiper';
            if (!Be::hasContext($key)) {
                $wwwUrl = Be::getProperty('Theme.Pet')->getWwwUrl();
                echo '<link rel="stylesheet" href="' . $wwwUrl . '/lib/swiper/8.3.2/swiper-bundle.min.css">';
                echo '<script src="' . $wwwUrl . '/lib/swiper/8.3.2/swiper-bundle.min.js"></script>';
            }

            echo '<script>';
            echo 'new Swiper(".slider .swiper", {';

            echo 'effect: \'' . $this->config->effect . '\',';

            if ($count > 1) {
                if ($this->config->loop) {
                    echo 'loop: true,';
                }

                if ($this->config->autoplay) {
                    echo 'autoplay: {';
                    echo 'delay: ' . $this->config->delay . ',';
                    echo 'speed: ' . $this->config->speed;
                    echo '},';
                }

                if ($this->config->pagination) {
                    echo 'pagination: {el: \'.swiper-pagination\', clickable :true},';
                }

                if ($this->config->navigation) {
                    echo 'navigation: {nextEl: \'.swiper-button-next\', prevEl: \'.swiper-button-prev\'},';
                }
                echo 'grabCursor : true';
            } else {
                echo 'enabled:false';
            }
            echo '});';
            echo '</script>';
        }
    }
}
