<?php

/**
 * @package yii2-extentions
 * @license The MIT License
 * @copyright Copyright (C) 2012-2018 Sergio coderius <coderius>
 * @contacts sunrise4fun@gmail.com - Have suggestions, contact me :) 
 * @link https://github.com/coderius - My github
 */

namespace coderius\jqcloud2;

use Yii;
use yii\web\AssetBundle;

class jQCloudAsset extends AssetBundle
{
    public $sourcePath = '@bower/jQCloud/dist';
    
    public $css = [];
    
    public $js = [];
    
    public $depends = [
        'yii\web\JqueryAsset',
    ];
    public function init()
    {
        parent::init();
        
        $this->js[] = YII_DEBUG ? 'js/jqcloud.js' : 'jqcloud.min.js';
        $this->css[] = YII_DEBUG ? 'css/jqcloud.css' : 'jqcloud.min.css';
    }
    
}

