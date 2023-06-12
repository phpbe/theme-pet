<?php

namespace Be\Theme\Pet\Service;


use Be\Be;

class CmsSection
{

    /**
     * 生成文章列表部件
     *
     * @param object $section
     * @param string $class
     * @param array $articles
     * @param string $defaultMoreLink
     * @return string
     */
    public function makeArticlesSection(object $section, string $class, array $articles, string $defaultMoreLink = null): string
    {
        $html = '';
        $html .= '<style type="text/css">';
        $html .= $section->getCssBackgroundColor($class);
        $html .= $section->getCssPadding($class);
        $html .= $section->getCssMargin($class);

        $html .= '#' . $section->id . '{';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . ' {';
        $html .= '}';


        $html .= '#' . $section->id . ' .' . $class . '-title {';
        $html .= 'margin-bottom: 2rem;';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . '-title h3 {';
        $html .= 'text-align: center;';
        $html .= 'font-size: 2rem;';
        $html .= 'font-family: \'Fredoka One\';';
        $html .= 'font-weight: 400;';
        $html .= '}';


        $html .= '#' . $section->id . ' .' . $class . '-items {';
        $html .= 'display: flex;';
        $html .= 'flex-wrap: wrap;';
        //$html .= 'overflow: hidden;';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . '-item {';
        $html .= 'flex: 0 1 auto;';
        //$html .= 'overflow: hidden;';
        $html .= 'min-width:0;';
        $html .= '}';

        // ------------------------------------------------------------------------------------------------------------- 手机端
        $html .= '@media (max-width: 320px) {';
        $html .= '#' . $section->id . ' .' . $class . '-items {';
        $html .= 'margin-bottom: -' . $section->config->spacingMobile . ';';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . '-item {';
        $html .= 'width: 100%;';
        $html .= 'margin-bottom: ' . $section->config->spacingMobile . ';';
        $html .= '}';
        $html .= '}';

        $html .= '@media (min-width: 320px) {';

        $html .= '#' . $section->id . ' .' . $class . '-items {';
        $html .= 'margin-left: calc(-' . $section->config->spacingMobile . ' / 2);';
        $html .= 'margin-right: calc(-' . $section->config->spacingMobile . ' / 2);';
        $html .= 'margin-bottom: -' . $section->config->spacingMobile . ';';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . '-item {';
        $html .= 'width: 50%;';
        $html .= 'padding-left: calc(' . $section->config->spacingMobile . ' / 2);';
        $html .= 'padding-right: calc(' . $section->config->spacingMobile . ' / 2);';
        $html .= 'margin-bottom: ' . $section->config->spacingMobile . ';';
        $html .= '}';

        $html .= '}';
        // ============================================================================================================= 手机端


        // ------------------------------------------------------------------------------------------------------------- 平析端
        $html .= '@media (min-width: 768px) {';

        $html .= '#' . $section->id . ' .' . $class . '-items {';
        $html .= 'margin-left: calc(-' . $section->config->spacingTablet . ' / 2);';
        $html .= 'margin-right: calc(-' . $section->config->spacingTablet . ' / 2);';
        $html .= 'margin-bottom: -' . $section->config->spacingTablet . ';';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . '-item {';
        $html .= 'width: 33.3333333%;';
        $html .= 'padding-left: calc(' . $section->config->spacingTablet . ' / 2);';
        $html .= 'padding-right: calc(' . $section->config->spacingTablet . ' / 2);';
        $html .= 'margin-bottom: ' . $section->config->spacingTablet . ';';
        $html .= '}';

        $html .= '}';
        // ============================================================================================================= 平析端


        // ------------------------------------------------------------------------------------------------------------- 电脑端
        $html .= '@media (min-width: 992px) {';

        $html .= '#' . $section->id . ' .' . $class . '-items {';
        $html .= 'margin-left: calc(-' . $section->config->spacingDesktop . ' / 2);';
        $html .= 'margin-right: calc(-' . $section->config->spacingDesktop . ' / 2);';
        $html .= 'margin-bottom: -' . $section->config->spacingDesktop . ';';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . '-item {';
        $html .= 'width: 25%;';
        $html .= 'padding-left: calc(' . $section->config->spacingDesktop . ' / 2);';
        $html .= 'padding-right: calc(' . $section->config->spacingDesktop . ' / 2);';
        $html .= 'margin-bottom: ' . $section->config->spacingDesktop . ';';
        $html .= '}';

        $html .= '}';
        // ============================================================================================================= 电脑端

        $html .= '#' . $section->id . ' .' . $class . '-item-image {';
        $html .= 'position: relative;';
        $html .= 'overflow: hidden;';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . '-item-date {';
        $html .= 'position: absolute;';
        $html .= 'top: 12px;';
        $html .= 'left: 12px;';
        $html .= 'background-color: #fff;';
        $html .= 'box-shadow: 0 0 1px #ccc;';
        $html .= 'border-radius: 4px;';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . '-item-image a {';
        $html .= 'display: block;';
        $html .= 'position: relative;';
        $html .= 'background-size: cover;';
        $html .= 'background-position: center;';
        $configArticle = Be::getConfig('App.Cms.Article');
        $html .= 'aspect-ratio: ' . $configArticle->imageAspectRatio . ';';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . '-item-image a:hover  {';
        $html .= 'transform: scale(1.05);';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . '-item-image a span {';
        $html .= 'display: none;';
        $html .= '}';

        $html .= '</style>';

        $html .= '<div class="' . $class . '">';
        if ($section->position === 'middle' && $section->config->width === 'default') {
            $html .= '<div class="be-container">';
        }

        if (isset($section->config->title) && $section->config->title !== '') {
            $html .= '<div class="' . $class . '-title">';
            $html .= '<h3 class="be-h3">' . $section->config->title . '</h3>';
            $html .= '</div>';
        }

        $html .= '<div class="' . $class . '-items">';

        $noImage = Be::getProperty('App.Cms')->getWwwUrl() . '/article/images/no-image.jpg';
        $isMobile = \Be\Be::getRequest()->isMobile();
        foreach ($articles as $article) {
            $html .= '<div class="' . $class . '-item">';

            $image = $article->image;
            if ($image === '') {
                $image = $noImage;
            }

            $html .= '<div class="be-ta-center ' . $class . '-item-image">';
            $html .= '<a href="' . beUrl('Cms.Article.detail', ['id' => $article->id]) . '"';
            if (!$isMobile) {
                $html .= ' target="_blank"';
            }
            $html .= ' style="background-image:url(\'' . $image . '\')">';

            //$html .= '<img src="' . $article->image . '" alt="' . htmlspecialchars($article->title) . '">';
            $html .= '<span>' . $article->title . '</span>';

            $html .= '</a>';

            $html .= '<div class="' . $class . '-item-date be-p-50">';
            $html .= '<div class="be-ta-center be-c-major be-fs-200 be-fw-bold">';
            $html .= date('d', strtotime($article->publish_time));
            $html .= '</div>';
            $html .= '<div class="be-ta-center be-c-major">';
            $html .= date('M', strtotime($article->publish_time));
            $html .= '</div>';
            $html .= '</div>';

            $html .= '</div>';


            $html .= '<div class="be-mt-100 be-ta-center">';
            $html .= '<a class="be-d-block be-t-ellipsis" href="' . beUrl('Cms.Article.detail', ['id' => $article->id]) . '"';
            if (!$isMobile) {
                $html .= ' target="_blank"';
            }
            $html .= '>';
            $html .= $article->title;
            $html .= '</a>';
            $html .= '</div>';

            $html .= '</div>';
        }

        $html .= '</div>';

        if ($section->position === 'middle' && $section->config->width === 'default') {
            $html .= '</div>';
        }
        $html .= '</div>';

        return $html;
    }

    /**
     * 生成分页章列表部件
     *
     * @param object $section
     * @param string $class
     * @param array $result
     * @return string
     */
    public function makePagedArticlesSection(object $section, string $class, array $result): string
    {
        $html = '';
        $html .= '<style type="text/css">';
        $html .= $section->getCssBackgroundColor($class);
        $html .= $section->getCssPadding($class);
        $html .= $section->getCssMargin($class);

        if ($section->config->cols > 1) {

            $cols = $section->config->cols;
            if ($cols < 1) {
                $cols = 1;
            } elseif ($section->config->cols > 3) {
                $cols = 3;
            }

            $itemWidthMobile = '100%';
            $itemWidthTablet = $cols > 1 ? '50%' : '100%';
            if ($cols > 2) {
                $itemWidthDesktop = (100 / 3) . '%';
            } elseif ($cols === 2) {
                $itemWidthDesktop = '50%';
            } else {
                $itemWidthDesktop = '100%';
            }
            $html .= $section->getCssSpacing($class . '-items', $class .'-item', $itemWidthMobile, $itemWidthTablet, $itemWidthDesktop);

        } else {
            $html .= '#' . $section->id . ' .' . $class . '-item {';
            $html .= 'margin-top: 3rem;';
            $html .= '}';

            $html .= '#' . $section->id . ' .' . $class . '-item:first-child {';
            $html .= 'margin-top: 0;';
            $html .= '}';
        }


        $html .= '#' . $section->id . ' .' . $class . ' .article-image a {';
        $html .= 'display: block;';
        $html .= 'background-size: cover;';
        $html .= 'background-position: center;';
        $configArticle = Be::getConfig('App.Cms.Article');
        $html .= 'aspect-ratio: ' . $configArticle->imageAspectRatio . ';';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . ' .article-image img {';
        $html .= 'width: 100%;';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . ' .article-image a span {';
        $html .= 'display: none;';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . ' .read-more a {';
        $html .= 'color: var(--major-color);';
        $html .= '}';

        $html .= '#' . $section->id . ' .' . $class . ' .read-more a:hover {';
        $html .= 'color: var(--major-color2);';
        $html .= '}';

        $html .= '</style>';

        $html .= '<div class="' . $class . '">';
        if ($section->position === 'middle' && $section->config->width === 'default') {
            $html .= '<div class="be-container">';
        }

        $html .= '<div class="' . $class . '-items">';

        $noImage = \Be\Be::getProperty('App.Cms')->getWwwUrl() . '/images/article/no-image.jpg';
        $isMobile = \Be\Be::getRequest()->isMobile();
        $i = 0;
        foreach ($result['rows'] as $article) {

            $html .= '<div class="' . $class . '-item">';

            $image = $article->image;
            if ($image === '') {
                $image = $noImage;
            }

            $html .= '<div class="article-image">';
            $html .= '<a href="' . beUrl('Cms.Article.detail', ['id' => $article->id]) . '" title="' . $article->title . '"';
            if (!$isMobile) {
                $html .= ' target="_blank"';
            }
            $html .= ' style="background-image:url(\'' . $image . '\')">';

            //$html .= '<img src="' . $image . '" alt="' . htmlspecialchars($article->title) . '">';
            $html .= '<span>' . $article->title . '</span>';

            $html .= '</a>';
            $html .= '</div>';


            $html .= '<div class="be-mt-100">';
            $html .= '<a class="be-fs-125 be-fw-bold be-lh-200" href="';
            $html .= beUrl('Cms.Article.detail', ['id' => $article->id]);
            $html .= '" title="';
            $html .= $article->title;
            $html .= '"';
            if (!$isMobile) {
                $html .= ' target="_blank"';
            }
            $html .= '>';
            $html .= $article->title;
            $html .= '</a>';
            $html .= '</div>';


            $html .= '<div class="be-mt-100">';
            $html .= '<span class="be-c-font-6">';
            $html .= date('F j, Y', strtotime($article->publish_time));
            $html .= '</span>';
            $html .= '</div>';


            $html .= '<div class="be-mt-100 be-lh-175 be-c-font-3">';
            $html .= $article->summary;
            $html .= '</div>';


            $html .= '<div class="be-mt-100 read-more">';
            $html .= '<a href="';
            $html .= beUrl('Cms.Article.detail', ['id' => $article->id]);
            $html .= '" title="';
            $html .= $article->title;
            $html .= '"';
            if (!$isMobile) {
                $html .= ' target="_blank"';
            }
            $html .= '>Read More</a>';
            $html .= '</div>';


            $html .= '</div>'; // -item
            $i++;
        }

        $html .= '</div>';

        $total = $result['total'];
        $pageSize = $result['pageSize'];
        $pages = ceil($total / $pageSize);

        if (isset($section->config->maxPages) && $section->config->maxPages > 0) {
            $maxPages = $section->config->maxPages;
        } else {
            $maxPages = floor(10000 / $pageSize);
        }
        if ($pages > $maxPages) {
            $pages = $maxPages;
        }

        if ($pages > 1) {

            $page = $result['page'];
            if ($page > $pages) $page = $pages;

            $request = Be::getRequest();
            $route = $request->getRoute();
            $params = $request->get();

            $html .= '<nav class="be-mt-200">';
            $html .= '<ul class="be-pagination be-pagination-lg" style="justify-content: center;">';
            $html .= '<li>';
            if ($page > 1) {
                $params['page'] = $page - 1;
                $html .= '<a href="' . beUrl($route, $params) . '">' . beLang('App.Cms', 'PAGINATION.PREVIOUS') . '</a>';
            } else {
                $html .= '<span>' . beLang('App.Cms', 'PAGINATION.PREVIOUS') . '</span>';
            }
            $html .= '</li>';

            $from = null;
            $to = null;
            if ($pages < 9) {
                $from = 1;
                $to = $pages;
            } else {
                $from = $page - 4;
                if ($from < 1) {
                    $from = 1;
                }

                $to = $from + 8;
                if ($to > $pages) {
                    $to = $pages;
                }
            }

            if ($from > 1) {
                $html .= '<li><span>...</span></li>';
            }

            for ($i = $from; $i <= $to; $i++) {
                if ($i == $page) {
                    $html .= '<li class="active">';
                    $html .= '<span>' . $i . '</span>';
                    $html .= '</li>';
                } else {
                    $html .= '<li>';
                    $params['page'] = $i;
                    $html .= '<a href="' . beUrl($route, $params) . '">' . $i . '</a>';
                    $html .= '</li>';
                }
            }

            if ($to < $pages) {
                $html .= '<li><span>...</span></li>';
            }

            $html .= '<li>';
            if ($page < $pages) {
                $params['page'] = $page + 1;
                $html .= '<a href="' . beUrl($route, $params) . '">' . beLang('App.Cms', 'PAGINATION.NEXT') . '</a>';
            } else {
                $html .= '<span>' . beLang('App.Cms', 'PAGINATION.NEXT') . '</span>';
            }
            $html .= '</li>';
            $html .= '</ul>';
            $html .= '</nav>';
        }

        if ($section->position === 'middle' && $section->config->width === 'default') {
            $html .= '</div>';
        }

        $html .= '</div>';

        return $html;
    }


    /**
     * 生成文章列表部件
     *
     * @param object $section
     * @param string $class
     * @param array $articles
     * @param string $defaultMoreLink
     * @return string
     */
    public function makeSideArticlesSection(object $section, string $class, array $articles, string $defaultMoreLink = null): string
    {
        $html = '';
        $html .= '<style type="text/css">';
        $html .= $section->getCssBackgroundColor($class);
        $html .= $section->getCssPadding($class);
        $html .= $section->getCssMargin($class);
        $html .= '</style>';

        $html .= '<div class="' . $class . '">';
        if ($section->position === 'middle' && $section->config->width === 'default') {
            $html .= '<div class="be-container">';
        }

        if (isset($section->config->title) && $section->config->title !== '') {
            $html .= $section->page->tag0('be-section-title', true);
            $html .= $section->config->title;
            $html .= $section->page->tag1('be-section-title', true);
        }

        $html .= $section->page->tag0('be-section-content', true);

        $isMobile = \Be\Be::getRequest()->isMobile();
        foreach ($articles as $article) {
            $html .= '<div class="be-py-20">';
            $html .= '<a class="be-d-block be-t-ellipsis" href="' . beUrl('Cms.Article.detail', ['id' => $article->id]) . '" title="' . $article->title . '"';
            if (!$isMobile) {
                $html .= ' target="_blank"';
            }
            $html .= '>';
            $html .= $article->title;
            $html .= '</a>';
            $html .= '</div>';
        }

        if (isset($section->config->more) && $section->config->more !== '') {

            $moreLink = null;
            if (isset($section->config->moreLink) && $section->config->moreLink !== '') {
                $moreLink = $section->config->moreLink;
            }

            if ($moreLink === null && $defaultMoreLink !== null) {
                $moreLink = $defaultMoreLink;
            }

            if ($moreLink !== null) {
                $html .= '<div class="be-mt-100 be-bt-eee be-pt-100 be-ta-right">';
                $html .= '<a href="' . $moreLink . '"';
                if (!$isMobile) {
                    $html .= ' target="_blank"';
                }
                $html .= '>' . $section->config->more . '</a>';
                $html .= '</div>';
            }
        }

        $html .= $section->page->tag1('be-section-content', true);

        if ($section->position === 'middle' && $section->config->width === 'default') {
            $html .= '</div>';
        }

        $html .= '</div>';

        return $html;
    }



}
