<?php

namespace tests;

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
        \Yii::$app->session->setFlash('success', 'Hello World!');
        $alert = NotyWidget::widget([
            'typeOptions' => [
                'success' => ['timeout' => 3000],
                'info' => ['timeout' => 3000],
            ],
            'options' => [
                'progressBar' => true,
                'timeout' => false,
                'layout' => 'topCenter',
                'dismissQueue' => true,
                'theme' => NotyWidget::THEME_SUNSET
            ],]);
        $this->assertContains('', $alert);
    }
}
