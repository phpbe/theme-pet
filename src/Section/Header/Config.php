<?php
namespace Be\Theme\Pet\Section\Header;

/**
 * @BeConfig("头部主体", ordering="1")
 */
class Config
{

    /**
     * @BeConfigItem("是否启用",
     *     driver = "FormItemSwitch")
     */
    public int $enable = 1;

    /**
     * @BeConfigItem("背景颜色",
     *     driver = "FormItemColorPicker"
     * )
     */
    public string $backgroundColor = '#fff';

    /**
     * @BeConfigItem("LOGO",
     *     driver="FormItemStorageImage"
     * )
     */
    public string $logo = '';


    public function __construct()
    {
        $wwwUrl = \Be\Be::getProperty('Theme.Pet')->getWwwUrl();

        $this->logo = $wwwUrl . '/images/logo.png';
    }

}
