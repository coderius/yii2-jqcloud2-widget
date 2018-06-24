<?php

/**
 * @package yii2-extentions
 * @license The MIT License
 * @copyright Copyright (C) 2012-2018 Sergio coderius <coderius>
 * @contacts sunrise4fun@gmail.com - Have suggestions, contact me :) 
 * @link https://github.com/coderius - My github
 */

namespace coderius\lightbox2;

use Yii;
use yii\web\AssetBundle;

class Lightbox2Asset extends AssetBundle
{
    public $sourcePath = '@bower/lightbox2/dist';
    
    public $css = [];
    
    public $js = [];
    
//    public $jsOptions = [
//        'position' => \yii\web\View::POS_END,
//    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
    ];
    public function init()
    {
        parent::init();
        
        $this->js[] = YII_DEBUG ? 'js/lightbox.js' : 'lightbox.min.js';
        $this->css[] = YII_DEBUG ? 'css/lightbox.css' : 'lightbox.min.css';
    }
    
}

