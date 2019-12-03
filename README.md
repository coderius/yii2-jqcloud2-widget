jQCloud widget for Yii2
=========================
The jQCloud widget is a customized jQCloud script based on [jQCloud](http://mistic100.github.io/jQCloud/index.html#words-options). and 
This widget used to word clouds and tag clouds that are actually shaped like a cloud. 

jQCloud screenshot:
-------------------
![alt text](https://github.com/coderius/github-images/blob/master/pic2.png "jQCloud example")

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require coderius/yii2-jqcloud2-widget "@dev"
```

or add

```json
"coderius/yii2-jqcloud2-widget" : "@dev"
```

to the require section of your application's `composer.json` file.




Basic usage.
-----------
In view:

```php
use coderius\jqcloud2;

<?= \coderius\jqcloud2\jQCloud::widget([
    'tagOptions' => [
        'style' => 'width:100%; height: 350px; border: 1px solid #ccc;',
    ],
    
    'wordsOptions' => [
        ['text'=>"Lorem",'weight' => 13, 'link' =>"#"],
        ['text'=>"Ipsum",'weight' => 10.5, 'html' => ['title' => "My Title", "class" => "custom-class"], 'link' => ['href' => "http://jquery.com/", 'target' => "_blank"]],
        [
            'text'=>"Dolor",
            'weight' => 9.4, 
            'handlers' => [
                'click' => new \yii\web\JsExpression("
                    function() {
                        alert('You clicked the word !');
                    }
                "),
            ]
        ],
        ['text'=>"Sit",'weight' => 8],
        ['text'=>"Amet",'weight' => 6.2],
        ['text'=>"Consectetur",'weight' => 5],
        ['text'=>"Adipiscing",'weight' => 5],
        ['text'=>"Elit",'weight' => 5],
        ['text'=>"Nam et", 'weight' => 5]
            
    ],
   
]); ?>
```

Advanced usage.
--------------
* In view:
```php
use coderius\jqcloud2;

<?= \coderius\jqcloud2\jQCloud::widget([
    'tagOptions' => [
        'style' => 'width:100%; height: 350px; border: 1px solid #ccc;',
//        'id' => 'myid',
        ],
    
    'wordsOptions' => [
        ['text'=>"Lorem",'weight' => 13, 'link' =>"#"],
        ['text'=>"Ipsum",'weight' => 10.5, 'html' => ['title' => "My Title", "class" => "custom-class"], 'link' => ['href' => "http://jquery.com/", 'target' => "_blank"]],
        [
            'text'=>"Dolor",
            'weight' => 9.4, 
            'handlers' => [
                'click' => new \yii\web\JsExpression("
                    function() {
                        alert('You clicked the word !');
                    }
                "),
            ]
        ],
        ['text'=>"Sit",'weight' => 8],
        ['text'=>"Amet",'weight' => 6.2],
        ['text'=>"Consectetur",'weight' => 5],
        ['text'=>"Adipiscing",'weight' => 5],
        ['text'=>"Elit",'weight' => 5],
        ['text'=>"Nam et", 'weight' => 5]
            
    ],
    'cloudOptions' => [
        'delay' => 50,
        'autoResize' => true,
//        'colors' => ["#800026", "#bd0026", "#e31a1c", "#fc4e2a", "#fd8d3c", "#feb24c", "#fed976", "#ffeda0", "#ffffcc"],
        'fontSize' => [
            'from' => 0.1,
            'to' => 0.02
        ]
    ],
    'methods' =>    function($containerId, $words){
                        return new \yii\web\JsExpression("
                            var arr = arr || $words;
                            $('#update-demo').on('click', function(e) {
                                e.preventDefault();
                                arr.splice(0, 1);
                                $('#{$containerId}').jQCloud('update', arr);
                            });
                            
//                            $('#{$containerId}').jQCloud('destroy');

                        ");
                    } 
   
    
]); ?>
```

More info about options look in: 
[site about jQuery plugin](http://mistic100.github.io/jQCloud/index.html#words-options)


Reference to plugin [github](https://github.com/mistic100/jQCloud) repository that is used in this widget.
