<?php
namespace Be\Theme\Pet\Section\BannersWithContent;

/**
 * @BeConfig("多个横幅横幅带内容", ordering="8")
 */
class Config
{

    /**
     * @BeConfigItem("是否启用",
     *     driver = "FormItemSwitch")
     */
    public int $enable = 1;

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
    public string $marginMobile = '1rem 0 0 0';

    /**
     * @BeConfigItem("外边距 （平板端）",
     *     driver = "FormItemInput",
     *     description = "上右下左（CSS margin 语法）"
     * )
     */
    public string $marginTablet = '2rem 0 0 0';

    /**
     * @BeConfigItem("外边距 （电脑端）",
     *     driver = "FormItemInput",
     *     description = "上右下左（CSS margin 语法）"
     * )
     */
    public string $marginDesktop = '3rem 0 0 0';

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
     *          \Be\Theme\Pet\Section\BannersWithContent\Item\Banner::class,
     *     ]"
     * )
     */
    public array $items = [];


    public function __construct()
    {
        $wwwUrl = \Be\Be::getProperty('Theme.Pet')->getWwwUrl();

        $this->ornamentImageRightBottom = $wwwUrl . '/images/banners-with-content/ornament-right-bottom.png';

        $this->items = [
            [
                'name' => 'Banner',
                'config' => (object)[
                    'enable' => 1,
                    'image' => $wwwUrl . '/images/banners-with-content/1.jpg',
                    'title' => '<br><br>Dog Toys',
                    'description' => 'For your pet',
                    'button' => 'Shop Now',
                    'buttonLink' => '#',
                    'contentPosition' => 'right',
                    'contentPositionLeft' => -1,
                    'contentPositionRight' => 30,
                    'contentPositionTop' => 30,
                    'contentPositionBottom' => -1,
                    'contentWidth' => '40%',
                ],
            ],
            [
                'name' => 'Banner',
                'config' => (object)[
                    'enable' => 1,
                    'image' => $wwwUrl . '/images/banners-with-content/2.jpg',
                    'title' => '<br>Dog Shower Gel,<br>Deodorant',
                    'description' => 'The use of shower gel...',
                    'button' => 'Shop Now',
                    'buttonLink' => '#',
                    'contentPosition' => 'right',
                    'contentPositionLeft' => -1,
                    'contentPositionRight' => 30,
                    'contentPositionTop' => 30,
                    'contentPositionBottom' => -1,
                    'contentWidth' => '40%',
                ],
            ],
        ];
    }

}
