<?php
namespace Be\Theme\Pet\Section\BannerWithContent;

/**
 * @BeConfig("横幅带内容", ordering="6")
 */
class Config
{

    /**
     * @BeConfigItem("是否启用",
     *     driver = "FormItemSwitch")
     */
    public int $enable = 1;

    /**
     * @BeConfigItem("图像",
     *     driver="FormItemStorageImage"
     * )
     */
    public string $image = '';

    /**
     * @BeConfigItem("图像高度（像素）",
     *     driver="FormItemInputNumberInt"
     * )
     */
    public int $height = 500;

    /**
     * @BeConfigItem("标题",
     *     driver = "FormItemInput"
     * )
     */
    public string $title = 'Tips To Take Care <br> Of Your Cat';

    /**
     * @BeConfigItem("描述",
     *     driver = "FormItemInputTextArea"
     * )
     */
    public string $description = 'The living space will be clean…';

    /**
     * @BeConfigItem("按钮",
     *     driver = "FormItemInput"
     * )
     */
    public string $button = 'See More';

    /**
     * @BeConfigItem("按钮链接",
     *     driver = "FormItemInput"
     * )
     */
    public string $buttonLink = '#';

    /**
     * @BeConfigItem("内容区位置",
     *     driver = "FormItemSelect",
     *     keyValues = "return ['left' => '左侧', 'center' => '中间', 'right' => '右侧', 'custom' => '指定位置'];"
     * )
     */
    public string $contentPosition = 'left';

    /**
     * @BeConfigItem("内容区位置左侧边距（像素，小于0时不生效）",
     *     driver = "FormItemInputNumberInt",
     *     ui="return ['form-item' => ['v-show' => 'formData.contentPosition === \'custom\'']];"
     * )
     */
    public int $contentPositionLeft = -1;

    /**
     * @BeConfigItem("内容区位置右侧边距（像素，小于0时不生效）",
     *     driver = "FormItemInputNumberInt",
     *     ui="return ['form-item' => ['v-show' => 'formData.contentPosition === \'custom\'']];"
     * )
     */
    public int $contentPositionRight = 30;

    /**
     * @BeConfigItem("内容区位置顶部边距（像素，小于0时不生效）",
     *     driver = "FormItemInputNumberInt",
     *     ui="return ['form-item' => ['v-show' => 'formData.contentPosition === \'custom\'']];"
     * )
     */
    public int $contentPositionTop = 30;

    /**
     * @BeConfigItem("内容区位置底部边距（像素，小于0时不生效）",
     *     driver = "FormItemInputNumberInt",
     *     ui="return ['form-item' => ['v-show' => 'formData.contentPosition === \'custom\'']];"
     * )
     */
    public int $contentPositionBottom = -1;

    /**
     * @BeConfigItem("内容区宽度（像素）",
     *     driver = "FormItemInputNumberInt",
     * )
     */
    public string $contentWidth = '40%';

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



    public function __construct()
    {
        $wwwUrl = \Be\Be::getProperty('Theme.Pet')->getWwwUrl();
        $this->image = $wwwUrl . '/images/banner-with-content/1.jpg';
    }

}
