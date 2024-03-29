<?php

namespace tests;

use dominus77\noty\NotyAsset;
use yii\web\AssetBundle;

/**
 * Class NotyAssetTest
 * @package tests
 */
class NotyAssetTest extends TestCase
{
    /**
     * @inheritdoc
     */
    public function testRegister()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        NotyAsset::register($view);
        $this->assertCount(1, $view->assetBundles);
        $this->assertTrue($view->assetBundles['dominus77\\noty\\NotyAsset'] instanceof AssetBundle);
        $content = $view->renderFile('@tests/views/layouts/rawlayout.php');
        $this->assertContains('noty.css', $content);
        $this->assertContains('noty.min.js', $content);
    }
}
