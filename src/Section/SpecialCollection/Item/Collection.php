<?php
namespace Be\Theme\Pet\Section\Banner\Item;

/**
 * @BeConfig("特供商品", icon="el-icon-picture")
 */
class Collection
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
     * @BeConfigItem("链接",
     *     driver="FormItemInput")
     */
    public string $link = '';

    /**
     * @BeConfigItem("标题",
     *     driver="FormItemInput"
     * )
     */
    public string $title= '';

    /**
     * @BeConfigItem("小标题",
     *     driver="FormItemInput"
     * )
     */
    public string $subTitle = '';


}
