<?php

namespace dominus77\noty\themes;

use yii\web\AssetBundle;

/**
 * Class Bootstrap4Asset
 * @package dominus77\noty\themes
 */
class Bootstrap4Asset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/needim/noty/lib';

    /**
     * @var array
     */
    public $css = [
        'themes/bootstrap-v4.css',
    ];

    /**
     * @var array
     */
    public $depends = [
        'dominus77\noty\NotyAsset'
    ];
}
