<?php

namespace Be\Theme\Pet\Section\App\Cms\Article\Tag;

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

        $request = Be::getRequest();
        $response = Be::getResponse();

        $tag = $request->get('tag', '');
        $tag = trim($tag);

        $page = $request->get('page', 1);
        if ($page > $this->config->maxPages) {
            $page = $this->config->maxPages;
        }

        $params = [
            'tag' => $tag,
            'pageSize' => $this->config->pageSize,
            'page' => $page,
        ];

        $result = Be::getService('App.Cms.Article')->search('', $params);

        echo Be::getService('Theme.Pet.CmsSection')->makePagedArticlesSection($this, 'app-cms-article-tag', $result);
    }
}

