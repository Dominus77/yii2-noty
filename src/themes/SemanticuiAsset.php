<?php

namespace dominus77\noty\themes;

use yii\web\AssetBundle;

/**
 * Class SemanticuiAsset
 * @package dominus77\noty\themes
 */
class SemanticuiAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/needim/noty/lib';

    /**
     * @var array
     */
    public $css = [
        'themes/semanticui.css',
    ];

    /**
     * @var array
     */
    public $depends = [
        'dominus77\noty\NotyAsset'
    ];
}
