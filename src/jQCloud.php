<?php

/**
 * @package yii2-extentions
 * @license BSD-3-Clause
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
    private $pluginName = 'jQCloud';

    public $id;
    /**
     * @var string the name of the jQCloud container tag.
     */
    public $tag = 'div';
    /**
     * @var array the HTML attributes for the jQCloud container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $tagOptions = ['class' => 'jqcloud'];
    /**
     * @var array the words & options for the JS plugin.
     * @see http://mistic100.github.io/jQCloud/index.html 
     */
    public $wordsOptions = [];
    /**
     * @var array. Cloud options
     * @see http://mistic100.github.io/jQCloud/index.html#cloud-options
     */
    public $cloudOptions = [];
    /**
     * @var closure. Methods
     * @see http://mistic100.github.io/jQCloud/index.html#methods
     */
    public $methods;
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        
        ArrayHelper::merge(['id' =>  $this->getId()], $this->tagOptions);
        if(empty($this->tagOptions['id'])){
            $this->tagOptions['id'] = $this->getId();
        }
        $this->id = $this->tagOptions['id'];
        
        
        
    } 
    
    /**
     * @inheritdoc
     */
    public function run()
    {
        $pluginJs = $this->makePlugin('jQCloud');
        $this->registerAssets($pluginJs);
        $container = Html::tag($this->tag, '', $this->tagOptions);
        echo $container;
    }
    
    /**
     * @param string $name
     * @return string json
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
        
        return YII_DEBUG ? $js : preg_replace('/(\n|\r|\s)*/',"", $js);
    }
    
    /**
     * @param string $plugin
     */
    protected function registerAssets($plugin){
        $view = $this->getView();
        $bundle = jQCloudAsset::register($view);
        $view->registerJs($plugin);
    }
    /**
     * @param type $autoGenerate
     * @return string widget id
     */
    public function getId($autoGenerate = true){
        
        return strtolower($this->pluginName)."-".parent::getId();
    }
    
    
    
    
}