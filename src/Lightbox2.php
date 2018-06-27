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
    /**
     * @var array the options for the lightbox2 JS plugin.
     * @see https://lokeshdhakar.com/projects/lightbox2/ 
     */
    public $clientOptions = [];
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        
    } 
    
    /**
     * @inheritdoc
     */
    public function run()
    {
        $plugin = $this->makePlugin('lightbox');
        $this->registerAssets($plugin);
        
    }
    
    /**
     * @param string $name
     * @return string
     */
    protected function makePlugin($name)
    {
        $js = false;
        
        if ($this->clientOptions !== false) {
            $options = empty($this->clientOptions) ? '' : Json::encode($this->clientOptions);
            $js = "$name.option($options);";
            
        }
            
        return $js;
    }
    
    /**
     * @param string $plugin
     */
    protected function registerAssets($plugin){
        $view = $this->getView();
        $bundle = Lightbox2Asset::register($view);
        $view->registerJs($plugin);
    }
    
    
    
    
}