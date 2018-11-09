<?php

namespace dominus77\noty;

use yii\web\AssetBundle;

/**
 * Class NotyAsset
 * @package dominus77\noty
 */
class NotyAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/needim/noty/lib';

    /**
     * @var array
     */
    public $js = [
        'noty.js'
    ];

    /**
     * @var array
     */
    public $css = [
        'noty.css',
    ];
}
