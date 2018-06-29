<?php

/**
 * @package yii2-extentions
 * @license The MIT License
 * @copyright Copyright (C) 2012-2018 Sergio coderius <coderius>
 * @contacts sunrise4fun@gmail.com - Have suggestions, contact me :) 
 * @link https://github.com/coderius - My github
 */
namespace coderius\jqcloud2;

use yii\base\Widget;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use Closure;

class jQCloud extends Widget
{
    public $id;
    /**
     * @var string the name of the jQCloud container tag.
     */
    public $tag = 'div';
    /**
     * @var array the HTML attributes for the jQCloud container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $tagOptions = ['class' => 'tags'];
    
    
    /**
     * @var array the words & options for the JS plugin.
     * @see http://mistic100.github.io/jQCloud/index.html 
     */
    public $wordsOptions = [];
    
    public $cloudOptions = [];
    /**
     * 
     */
    public $methods;
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        
        $this->id = ArrayHelper::remove($this->tagOptions, 'id', $this->getId());
    } 
    
    /**
     * @inheritdoc
     */
    public function run()
    {
        $pluginJs = $this->makePlugin('jQCloud');
        $this->registerAssets($pluginJs);
        
        echo Html::tag($this->tag, '', $this->tagOptions);
    }
    
    /**
     * @param string $name
     * @return string
     */
    protected function makePlugin($name)
    {
        $id = $this->id;
        $wordsOptions = "";
        $cloudOptions = "";
        $js = "$('#{$id}').{$name}(";
        
        if ($this->wordsOptions !== false) {
            $wordsOptions = empty($this->wordsOptions) ? '' : Json::encode($this->wordsOptions);
            $js .= "$wordsOptions";
        }
        
        if ($this->cloudOptions !== false) {
            $cloudOptions = empty($this->cloudOptions) ? '' : Json::encode($this->cloudOptions);
            $js .= ", $cloudOptions";
        }
            
        $js .= ");";
        
        if ($this->methods instanceof Closure){
            $methods = call_user_func($this->methods, $this->id, $wordsOptions);
            $js .= "\n{$methods}";
        }
        
        return $js;
    }
    
    /**
     * @param string $plugin
     */
    protected function registerAssets($plugin){
        $view = $this->getView();
        $bundle = jQCloudAsset::register($view);
        $view->registerJs($plugin);
    }
    
    
    
    
}