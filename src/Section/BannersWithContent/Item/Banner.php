<?php
namespace Be\Theme\Pet\Section\BannersWithContent\Item;

/**
 * @BeConfig("横幅", icon="el-icon-picture")
 */
class Banner
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
     * @BeConfigItem("标题",
     *     driver = "FormItemInput"
     * )
     */
    public string $title = '';

    /**
     * @BeConfigItem("描述",
     *     driver = "FormItemInputTextArea"
     * )
     */
    public string $description = '';

    /**
     * @BeConfigItem("按钮",
     *     driver = "FormItemInput"
     * )
     */
    public string $button = 'Shop Now';

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
    public string $contentPosition = 'right';

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


}
