<?php

namespace Be\Theme\Pet\Section\App\Cms\Article\Latest;

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

        $request = Be::getRequest();

        $page = $request->get('page', 1);
        if ($page > $this->config->maxPages) {
            $page = $this->config->maxPages;
        }

        $params = [
            'orderBy' => 'publish_time',
            'orderByDir' => 'desc',
            'pageSize' => $this->config->pageSize,
            'page' => $page,
        ];

        $result = Be::getService('App.Cms.Article')->search('', $params);

        echo Be::getService('Theme.Pet.CmsSection')->makePagedArticlesSection($this, 'app-cms-article-latest', $result);
    }

}

