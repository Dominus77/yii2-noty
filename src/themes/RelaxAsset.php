<?php

namespace dominus77\noty\themes;

use yii\web\AssetBundle;

/**
 * Class RelaxAsset
 * @package dominus77\noty\themes
 */
class RelaxAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/needim/noty/lib';

    /**
     * @var array
     */
    public $css = [
        'themes/relax.css',
    ];

    /**
     * @var array
     */
    public $depends = [
        'dominus77\noty\NotyAsset'
    ];
}
