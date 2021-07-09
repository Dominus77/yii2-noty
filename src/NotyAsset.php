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
    public $sourcePath = '@bower/noty/lib';

    public function init()
    {
        $min = YII_ENV_DEV ? '' : '.min';
        $this->css[] = 'noty.css';
        $this->js[] = 'noty' . $min . '.js';
    }
}
