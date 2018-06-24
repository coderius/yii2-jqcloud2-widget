Lightbox2 widget for Yii2
=========================
The Lightbox2 widget is a customized lightbox script based on [Lightbox](https://lokeshdhakar.com/projects/lightbox2/). and 
This widget used to overlay images on top of the current page. 

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require "coderius/yii2-lightbox2-widget" "*"
```

or add

```json
"coderius/yii2-lightbox2-widget" : "*"
```

to the require section of your application's `composer.json` file.

Usage
-----
* In view:

```php
use coderius\lightbox2\Lightbox2;

<?= coderius\lightbox2\Lightbox2::widget([
    'clientOptions' => [
        'resizeDuration' => 200,
        'wrapAround' => true,
        
    ]
]); ?>
```

Reference to plugin [github](https://github.com/lokesh/lightbox2/) repository that is used in this widget.