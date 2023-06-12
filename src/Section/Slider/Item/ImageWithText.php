<?php
namespace Be\Theme\Pet\Section\Slider\Item;


/**
 * @BeConfig("图像和文字", icon="el-icon-picture-outline")
 */
class ImageWithText
{

    /**
     * @BeConfigItem("是否启用",
     *     driver = "FormItemSwitch")
     */
    public int $enable = 1;

    /**
     * @BeConfigItem("背景图像",
     *     driver="FormItemStorageImage"
     * )
     */
    public string $backgroundImage = '';

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
    public string $title = '标题...';

    /**
     * @BeConfigItem("描述",
     *     driver = "FormItemInputTextArea"
     * )
     */
    public string $description = '描述...';

    /**
     * @BeConfigItem("按钮",
     *     driver = "FormItemInput"
     * )
     */
    public string $button = '查看';

    /**
     * @BeConfigItem("按钮链接",
     *     driver = "FormItemInput"
     * )
     */
    public string $buttonLink = '#';


}
