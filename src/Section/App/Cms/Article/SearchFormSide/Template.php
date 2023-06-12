<?php

namespace Be\Theme\Pet\Section\App\Cms\Article\SearchFormSide;

use Be\Be;
use Be\Theme\Section;

class Template extends Section
{

    public array $positions = ['middle', 'west', 'center', 'east'];


    private function css()
    {
        echo '<style type="text/css">';
        echo $this->getCssBackgroundColor('app-cms-article-search-form-side');
        echo $this->getCssPadding('app-cms-article-search-form-side');
        echo $this->getCssMargin('app-cms-article-search-form-side');

        echo '#' . $this->id . ' .app-cms-article-search-form-side-title {';
        echo 'font-size: 1.25rem;';
        echo 'font-family: \'Fredoka One\';';
        echo 'font-weight: 400;';
        echo 'border-bottom: 1px solid var(--font-color-9);';
        echo 'padding-bottom: .5rem;';
        echo '}';

        echo '</style>';
    }


    public function display()
    {
        if ($this->config->enable === 0) {
            return;
        }

        $this->css();


        echo '<div class="app-cms-article-search-form-side">';

        if ($this->config->title !== '') {
            echo '<div class="app-cms-article-search-form-side-title">';
            echo $this->config->title;
            echo '</div>';
        }

        ?>
        <form action="<?php echo beUrl('Cms.Article.search'); ?>" method="get">
            <div class="be-row be-mt-100">
                <div class="be-col"><input type="text" name="keyword" class="be-input" placeholder="<?php echo beLang('App.Cms', 'ARTICLE.ENTRY_SEARCH_KEYWORDS'); ?>"></div>
                <div class="be-col-auto"><input type="submit" class="be-btn be-btn-major be-lh-175" value="<?php echo beLang('App.Cms', 'ARTICLE.SEARCH'); ?>"></div>
            </div>
        </form>
        <?php

        if ($this->config->keywords > 0) {
            $topKeywords = Be::getService('App.Cms.Article')->getTopSearchKeywords($this->config->keywords);
            if (count($topKeywords) > 0) {
                echo '<div class="be-mt-100 be-lh-175">' . beLang('App.Cms', 'ARTICLE.TOP_SEARCH') . ': ';
                foreach ($topKeywords as $topKeyword) {
                    echo '<a href="'. beUrl('Cms.Article.search', ['keyword' => $topKeyword]) .'">' . $topKeyword . '</a> &nbsp;';
                }
                echo '</div>';
            }
        }

        echo '</div>';
    }
}
