<?php
namespace Be\Theme\Pet\Section\SpecialCollection;

/**
 * @BeConfig("特供商品", ordering="6")
 */
class Config
{

    /**
     * @BeConfigItem("是否启用",
     *     driver = "FormItemSwitch")
     */
    public int $enable = 1;

    /**
     * @BeConfigItem("标题",
     *     driver = "FormItemInput"
     * )
     */
    public string $title = 'Special Collection';

    /**
     * @BeConfigItem("装饿图-左上",
     *     driver="FormItemStorageImage"
     * )
     */
    public string $ornamentImageLeftTop = '';

    /**
     * @BeConfigItem("装饿图-左上",
     *     driver="FormItemStorageImage"
     * )
     */
    public string $ornamentImageRightBottom = '';

    /**
     * @BeConfigItem("内边距 （手机端）",
     *     driver = "FormItemInput",
     *     description = "上右下左（CSS padding 语法）"
     * )
     */
    public string $paddingMobile = '0';

    /**
     * @BeConfigItem("内边距 （平板端）",
     *     driver = "FormItemInput",
     *     description = "上右下左（CSS padding 语法）"
     * )
     */
    public string $paddingTablet = '0';

    /**
     * @BeConfigItem("内边距 （电脑端）",
     *     driver = "FormItemInput",
     *     description = "上右下左（CSS padding 语法）"
     * )
     */
    public string $paddingDesktop = '0';

    /**
     * @BeConfigItem("外边距 （手机端）",
     *     driver = "FormItemInput",
     *     description = "上右下左（CSS margin 语法）"
     * )
     */
    public string $marginMobile = '2rem 0 0 0';

    /**
     * @BeConfigItem("外边距 （平板端）",
     *     driver = "FormItemInput",
     *     description = "上右下左（CSS margin 语法）"
     * )
     */
    public string $marginTablet = '3rem 0 0 0';

    /**
     * @BeConfigItem("外边距 （电脑端）",
     *     driver = "FormItemInput",
     *     description = "上右下左（CSS margin 语法）"
     * )
     */
    public string $marginDesktop = '4rem 0 0 0';

    /**
     * @BeConfigItem("间距 （手机端）",
     *     driver = "FormItemInput"
     * )
     */
    public string $spacingMobile = '1rem';

    /**
     * @BeConfigItem("间距 （平板端）",
     *     driver = "FormItemInput"
     * )
     */
    public string $spacingTablet = '1.5rem';

    /**
     * @BeConfigItem("间距 （电脑端）",
     *     driver = "FormItemInput"
     * )
     */
    public string $spacingDesktop = '2rem';

    /**
     * @BeConfigItem("子项",
     *     driver = "FormItemsConfigs",
     *     items = "return [
     *          \Be\Theme\Pet\Section\Banners\Item\Collection::class,
     *     ]"
     * )
     */
    public array $items = [];


    public function __construct()
    {
        $wwwUrl = \Be\Be::getProperty('Theme.Pet')->getWwwUrl();

        $this->ornamentImageLeftTop = $wwwUrl . '/images/special-collection/ornament-left-top.png';
        $this->ornamentImageRightBottom = $wwwUrl . '/images/special-collection/ornament-right-bottom.png';
        $this->items = [
            [
                'name' => 'Collection',
                'config' => (object)[
                    'enable' => 1,
                    'image' => $wwwUrl . '/images/special-collection/1.jpg',
                    'title' => 'Outdoor',
                    'subTitle' => 'TOYS',
                    'link' => '#',
                ],
            ],
            [
                'name' => 'Collection',
                'config' => (object)[
                    'enable' => 1,
                    'image' => $wwwUrl . '/images/special-collection/2.jpg',
                    'title' => 'Fresh food',
                    'subTitle' => 'FOOD',
                    'link' => '#',
                ],
            ],
            [
                'name' => 'Collection',
                'config' => (object)[
                    'enable' => 1,
                    'image' => $wwwUrl . '/images/special-collection/3.jpg',
                    'title' => 'Take care of',
                    'subTitle' => 'PET',
                    'link' => '#',
                ],
            ],
        ];
    }

}
