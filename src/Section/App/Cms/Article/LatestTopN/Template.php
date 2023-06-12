<?php

namespace Be\Theme\Pet\Section\App\Cms\Article\LatestTopN;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{

    public array $positions = ['middle', 'west', 'center', 'east'];

    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        $articles = Be::getService('App.Cms.Article')->getLatestTopNArticles($this->config->quantity);
        if (count($articles) === 0) {
            return;
        }

        $defaultMoreLink = beUrl('Cms.Article.latest');
        echo Be::getService('Theme.Pet.CmsSection')->makeArticlesSection($this, 'app-cms-article-latest-top-n', $articles, $defaultMoreLink);
    }

}

