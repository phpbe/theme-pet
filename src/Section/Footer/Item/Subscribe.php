<?php
namespace Be\Theme\Pet\Section\Footer\Item;

/**
 * @BeConfig("订阅", icon="el-icon-fa fa-edit")
 */
class Subscribe
{

    /**
     * @BeConfigItem("是否启用",
     *     driver = "FormItemSwitch")
     */
    public int $enable = 1;

    /**
     * @BeConfigItem("标题",
     *     driver="FormItemInput"
     * )
     */
    public string $title = 'Keep In Touch';

    /**
     * @BeConfigItem("描述",
     *     driver="FormItemInput"
     * )
     */
    public string $description = 'Get insider access to special offers & discounts';

    /**
     * @BeConfigItem("社交账号 - Facebook",,
     *     description="填写 Facebook 账号，留空时不显示"
     *     driver="FormItemInput"
     * )
     */
    public string $socialFacebook = '#';

    /**
     * @BeConfigItem("社交账号 - Twitter",
     *     description="填写 Twitter 账号，留空时不显示",
     *     driver="FormItemInput"
     * )
     */
    public string $socialTwitter = '#';

    /**
     * @BeConfigItem("社交账号 - Instagram",
     *     description="填写 Instagram 账号，留空时不显示",
     *     driver="FormItemInput"
     * )
     */
    public string $socialInstagram = '#';

    /**
     * @BeConfigItem("社交账号 - Linkedin",
     *     description="填写 Linkedin 账号，留空时不显示",
     *     driver="FormItemInput"
     * )
     */
    public string $socialLinkedin = '#';


}
