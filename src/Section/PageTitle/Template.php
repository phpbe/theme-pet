<?php

namespace Be\Theme\Pet\Section\PageTitle;

use Be\Theme\Section;

class Template extends Section
{

    public array $positions = ['middle', 'center'];

    /**
     * 输出内容
     *
     * @return void
     */
    public function display()
    {
        $this->before();
        $this->page->pageTitle();
        $this->after();
    }

    public function before()
    {
        if ($this->config->enable) {
            echo '<style type="text/css">';
            echo $this->getCssBackgroundColor('page-title');
            echo $this->getCssPadding('page-title');
            echo $this->getCssMargin('page-title');

            echo '#' . $this->id . ' .page-title h1 {';
            echo 'padding: 0;';
            echo 'margin: 0;';
            echo 'font-size: 2rem;';
            echo 'font-family: \'Fredoka One\';';
            echo 'font-weight: 400;';
            echo '}';

            echo '</style>';

            echo '<div class="page-title">';
            if ($this->position === 'middle') {
                echo '<div class="be-container">';
            }
            echo '<h1>';
        }
    }

    public function after()
    {
        if ($this->config->enable) {
            echo '</h1>';
            if ($this->position === 'middle') {
                echo '</div>';
            }
            echo '</div>';
        }
    }
}

