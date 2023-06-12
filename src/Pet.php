<be-html>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no,viewport-fit=cover">
    <title><?php echo $this->title; ?></title>
    <meta name="keywords" content="<?php echo $this->metaKeywords ?? ''; ?>">
    <meta name="description" content="<?php echo $this->metaDescription ?? ''; ?>">
    <meta name="applicable-device" content="pc,mobile">
    <?php
    $configTheme = \Be\Be::getConfig('Theme.Pet.Theme');

    $beUrl = beUrl();
    $themeWwwUrl = \Be\Be::getProperty('Theme.Pet')->getWwwUrl();
    ?>
    <base href="<?php echo $beUrl; ?>/" >
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <script src="<?php echo $themeWwwUrl; ?>/lib/jquery/jquery-1.12.4.min.js"></script>
    <script src="<?php echo $themeWwwUrl; ?>/lib/jquery/jquery.validate-1.19.2.min.js"></script>

    <link rel="stylesheet" href="<?php echo $themeWwwUrl; ?>/ui/be.css?v=20230602" />
    <link rel="stylesheet" href="https://cdn.phpbe.com/ui/be-icons.css"/>

    <style type="text/css">
        <?php
        echo 'html {';
        echo 'font-size: ' . $configTheme->fontSize. 'px;';
        echo 'background-color: ' . $configTheme->backgroundColor. ';';
        echo 'color: ' . $configTheme->fontColor. ';';
        echo '}';

        echo 'a {';
        echo 'color: ' . $configTheme->linkColor. ';';
        echo '}';

        echo 'a:hover {';
        echo 'color: ' . $configTheme->linkHoverColor. ';';
        echo '}';
        ?>
    </style>

    <link rel="stylesheet" href="<?php echo $themeWwwUrl; ?>/css/theme.css?v=20230602001" />
    <script src="<?php echo $themeWwwUrl; ?>/js/theme.js?v=20230531"></script>

    <be-head>
    </be-head>


</head>
<body>

    <be-body>
        <be-north>
            <?php
            if ($this->pageConfig->north !== 0) {
                if (count($this->pageConfig->northSections)) {
                    foreach ($this->pageConfig->northSections as $section) {
                        $section->template->page = $this;
                        $section->template->display();
                    }
                }
            }
            ?>
        </be-north>
        <be-middle></be-middle>
        <be-south></be-south>
    </be-body>

    <div id="ajax-loader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>

    <div id="overlay"></div>

    <div id="goto-top"><i class="bi-arrow-up"></i></div>

</body>
</html>
</be-html>