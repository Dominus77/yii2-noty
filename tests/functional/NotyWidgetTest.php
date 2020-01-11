<?php

namespace tests;

use Yii;
use dominus77\noty\NotyWidget;

/**
 * Class NotyWidgetTest
 * @package tests
 */
class NotyWidgetTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testRunFlash()
    {
        Yii::$app->session->setFlash('success', 'Hello World!');
        $alert = NotyWidget::widget([
            'typeOptions' => [
                'success' => ['timeout' => 3000],
                'info' => ['timeout' => 3000],
            ],
            'options' => [
                'progressBar' => true,
                'timeout' => false,
                'layout' => NotyWidget::LAYOUT_TOP_CENTER,
                'dismissQueue' => true,
                'theme' => NotyWidget::THEME_SUNSET
            ],]);
        $this->assertContains('', $alert);
    }

    /**
     * @throws \Exception
     */
    public function testRunFlashExtends()
    {
        Yii::$app->session->setFlash(1, ['success', 'Hello World!', ['timeout' => 2000], ['layout' => NotyWidget::LAYOUT_BOTTOM_RIGHT,]]);
        $alert = NotyWidget::widget([
            'typeOptions' => [
                'success' => ['timeout' => 3000],
                'info' => ['timeout' => 3000],
            ],
            'options' => [
                'progressBar' => true,
                'timeout' => false,
                'layout' => NotyWidget::LAYOUT_TOP_CENTER,
                'dismissQueue' => true,
                'theme' => NotyWidget::THEME_SUNSET
            ],]);
        $this->assertContains('', $alert);
    }
}
