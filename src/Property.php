<?php

namespace Be\Theme\Pet;


class Property extends \Be\Theme\Property
{

    public string $label = '宠物商店';


    public string $previewImage = 'images/preview.jpg';


    public function __construct() {
        parent::__construct(__FILE__);
    }

}

