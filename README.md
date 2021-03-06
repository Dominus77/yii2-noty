# Simple notification widget for Yii2

[![Latest Version](https://poser.pugx.org/dominus77/yii2-noty/v/stable)](https://packagist.org/packages/dominus77/yii2-noty)
[![Software License](https://poser.pugx.org/dominus77/yii2-noty/license)](https://github.com/Dominus77/yii2-noty/blob/master/LICENSE.md)
[![Build Status](https://travis-ci.org/Dominus77/yii2-noty.svg?branch=master)](https://travis-ci.org/Dominus77/yii2-noty)
[![codecov](https://codecov.io/gh/Dominus77/yii2-noty/branch/master/graph/badge.svg)](https://codecov.io/gh/Dominus77/yii2-noty)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Dominus77/yii2-noty/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Dominus77/yii2-noty/?branch=master)
[![SymfonyInsight](https://insight.symfony.com/projects/056b7d4e-da1d-42bd-9f18-9381ffa7ad85/mini.svg)](https://insight.symfony.com/projects/056b7d4e-da1d-42bd-9f18-9381ffa7ad85)

Noty widget for Yii2

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require dominus77/yii2-noty
```

or add

```
"dominus77/yii2-noty": "^1.0"
```

to the require section of your `composer.json` file.


## Usage

Once the extension is installed, simply use it in your layout file like this:

Controller:
```php
<?php
// ...
Yii::$app->session->setFlash(\dominus77\noty\NotyWidget::TYPE_SUCCESS, 'Hello World!');
// ...

```
also
```php
<?php
// ...
Yii::$app->session->setFlash('key1', [
    \dominus77\noty\NotyWidget::TYPE_SUCCESS,
    'Hello World!', 
    // Type options
    [
        'timeout' => 3000
    ],
    // Options
    [
        'progressBar' => true,
        'layout' => \dominus77\noty\NotyWidget::LAYOUT_TOP_RIGHT,
        'theme' => \dominus77\noty\NotyWidget::THEME_MINT
    ]
]);
// ...
```

View:
```php
<?php
use dominus77\noty\NotyWidget;
?>

<?php NotyWidget::widget(); ?>
```
also
```php
<?php
use dominus77\noty\NotyWidget;
?>

<?php NotyWidget::widget([
    'typeOptions' => [
        NotyWidget::TYPE_SUCCESS => ['timeout' => 3000],
        NotyWidget::TYPE_INFO => ['timeout' => 3000],
        NotyWidget::TYPE_ALERT => ['timeout' => 3000],
        NotyWidget::TYPE_ERROR => ['timeout' => 5000],
        NotyWidget::TYPE_WARNING => ['timeout' => 3000]
    ],
    'options' => [
        'progressBar' => true,
        'timeout' => false,
        'layout' => NotyWidget::LAYOUT_TOP_CENTER,
        'dismissQueue' => true,
        'theme' => NotyWidget::THEME_SUNSET
    ],
]); ?>
```

## More Information
Please, check the [Noty](https://ned.im/noty/#/about)

## Testing
```
$ vendor/bin/phpunit
```

## License
The MIT License (MIT). Please see [License File](https://github.com/Dominus77/yii2-noty/blob/master/LICENSE.md) for more information.

## SymfonyInsight
[![SymfonyInsight](https://insight.symfony.com/projects/056b7d4e-da1d-42bd-9f18-9381ffa7ad85/big.svg)](https://insight.symfony.com/projects/056b7d4e-da1d-42bd-9f18-9381ffa7ad85)