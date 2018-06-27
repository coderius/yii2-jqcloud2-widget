<?php

namespace lightbox2Unit;

use coderius\lightbox2\Lightbox2;
use yii\di\Container;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * Test for class Lightbox2
 */
class Lightbox2Test extends TestCase {
    
    /**
     * Testing result for makePlugin method
     */
    public function testMakePlugin() {
        
        $expectedJs = 'lightbox.option({"resizeDuration":200,"wrapAround":true});';
        $config =   [
                        'class' => Lightbox2::class,
                        'clientOptions' => [
                            'resizeDuration' => 200,
                            'wrapAround' => true
                        ]
                    ];
        $widget = Yii::createObject($config);
        
        //Because the 'makePlugin' method are declared as protected we are using Reflection
        //If the method were public, then it would be possible to do so:
        //$js = $widget->makePlugin('lightbox');
        $reflObj = new \ReflectionMethod($widget, 'makePlugin');
        $reflObj->setAccessible(true);
        $js = $reflObj->invokeArgs($widget, ['lightbox']);
         
        $this->assertEquals($expectedJs, $js);
    }

}
