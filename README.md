Simple notification widget for Yii2
=================================
Noty widget for Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require dominus77e/yii2-noty
```

or add

```
"dominus77/yii2-noty": "~1.0"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your layout file like this:

Controller:
```php
Yii::$app->session->setFlash(\dominus77\noty\Noty::TYPE_SUCCESS, 'Hello Word!');

```

View:
```php
<?php
use dominus77\noty\Noty;
?>

<?= Noty::widget([
    'typeOptions' => [
        'success' => ['timeout' => 3000],
        'info' => ['timeout' => 3000],
    ],
    'options' => [
        'progressBar' => true,
        'timeout' => false,
        'layout' => 'topCenter',
        'dismissQueue' => true,
        'theme' => 'relax'
    ],
]) ?>
```
