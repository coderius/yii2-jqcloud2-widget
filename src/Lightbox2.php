<?php

/**
 * @package yii2-extentions
 * @license The MIT License
 * @copyright Copyright (C) 2012-2018 Sergio coderius <coderius>
 * @contacts sunrise4fun@gmail.com - Have suggestions, contact me :) 
 * @link https://github.com/coderius - My github
 */
namespace coderius\lightbox2;

use yii\base\Widget;
use yii\helpers\Json;

class Lightbox2 extends Widget
{
    
    public $clientOptions = [];
    
    public function init()
    {
        parent::init();
        
        $this->registerPlugin('lightbox');
         
        
        
    }   
    
    
    protected function registerPlugin($name)
    {
        $view = $this->getView();
        $bundle = Lightbox2Asset::register($view);
        
        if ($this->clientOptions !== false) {
            $options = empty($this->clientOptions) ? '' : Json::encode($this->clientOptions);
            $js = "$name.option($options);";
            $view->registerJs($js);
            
        }
        
    }
    
    
}