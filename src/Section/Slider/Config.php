<?php
namespace Be\Theme\Pet\Section\Slider;


/**
 * @BeConfig("轮播图", icon="el-icon-video-play", ordering="3")
 */
class Config
{
    /**
     * @BeConfigItem("是否启用",
     *     driver = "FormItemSwitch")
     */
    public int $enable = 1;

    /**
     * @BeConfigItem("切换效果",
     *     driver = "FormItemSelect",
     *     keyValues = "return ['slide' => '位移', 'fade' => '淡入淡出', 'cube' => '方块', 'coverflow' => '3D流', 'flip' => '3D翻转', 'cards' => '卡片式', 'creative' => '创意性'];"
     * )
     */
    public string $effect = 'fade';

    /**
     * @BeConfigItem("自动播放",
     *     driver = "FormItemSwitch")
     */
    public int $autoplay = 1;

    /**
     * @BeConfigItem("自动播放间隔（毫秒）",
     *     driver = "FormItemInputNumberInt",
     *     ui="return ['form-item' => ['v-show' => 'formData.autoplay === 1']];")
     */
    public int $delay = 10000;

    /**
     * @BeConfigItem("自动播放速度（毫秒）",
     *     driver = "FormItemInputNumberInt",
     *     ui="return ['form-item' => ['v-show' => 'formData.autoplay === 1']];")
     */
    public int $speed = 1000;

    /**
     * @BeConfigItem("循环",
     *     driver = "FormItemSwitch")
     */
    public int $loop = 1;

    /**
     * @BeConfigItem("显示分页器",
     *     driver = "FormItemSwitch")
     */
    public int $pagination = 1;

    /**
     * @BeConfigItem("显示前进后退按钮",
     *     driver = "FormItemSwitch")
     */
    public int $navigation = 1;

    /**
     * @BeConfigItem("前进后退按钮大小（像素）",
     *     driver = "FormItemInputNumberInt",
     *     ui="return ['form-item' => ['v-show' => 'formData.navigation === 1']];")
     */
    public int $navigationSize = 40;

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
     * @BeConfigItem("子项",
     *     driver = "FormItemsMixedConfigs",
     *     items = "return [
     *          \Be\Theme\Pet\Section\Slider\Item\ImageWithText::class,
     *     ]"
     * )
     */
    public array $items = [];


    public function __construct()
    {
        $wwwUrl = \Be\Be::getProperty('Theme.Pet')->getWwwUrl();
        $this->items = [
            [
                'name' => 'ImageWithText',
                'config' => (object)[
                    'enable' => 1,
                    'backgroundImage' => $wwwUrl . '/images/slider/1-1.jpg',
                    'image' => $wwwUrl . '/images/slider/1-2.png',
                    'title' => 'Pet Accessories & Good price',
                    'description' => 'Toy rubber gnawing bone with sound',
                    'button' => 'Shop Now',
                    'buttonLink' => '#',
                ],
            ],
            [
                'name' => 'ImageWithText',
                'config' => (object)[
                    'enable' => 1,
                    'backgroundImage' => $wwwUrl . '/images/slider/2-1.jpg',
                    'image' => $wwwUrl . '/images/slider/2-2.png',
                    'title' => 'Good Price Toys & Accessory',
                    'description' => 'Specializes in providing quality products',
                    'button' => 'Shop Now',
                    'buttonLink' => '#',
                ],
            ],
            [
                'name' => 'ImageWithText',
                'config' => (object)[
                    'enable' => 1,
                    'backgroundImage' => $wwwUrl . '/images/slider/3-1.jpg',
                    'image' => $wwwUrl . '/images/slider/3-2.png',
                    'title' => 'Pet Accessories & Good price',
                    'description' => 'Toy rubber gnawing bone with sound',
                    'button' => 'Shop Now',
                    'buttonLink' => '#',
                ],
            ],
        ];

    }

}
