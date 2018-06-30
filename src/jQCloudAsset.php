<?php

/**
 * @package yii2-extentions
 * @license BSD-3-Clause
 * @copyright Copyright (C) 2012-2018 Sergio coderius <coderius>
 * @contacts sunrise4fun@gmail.com - Have suggestions, contact me :) 
 * @link https://github.com/coderius - My github
 */

namespace coderius\jqcloud2;

use Yii;
use yii\web\AssetBundle;
/**
 * Asset bundle jQCloudAsset
 */
class jQCloudAsset extends AssetBundle
{
    public $sourcePath = '@bower/jqcloud2/dist';
    
    public $css = [];
    
    public $js = [];
    
    public $depends = [
        'yii\web\JqueryAsset',
    ];
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        
        $this->js[] = YII_DEBUG ? 'jqcloud.js' : 'jqcloud.min.js';
        $this->css[] = YII_DEBUG ? 'jqcloud.css' : 'jqcloud.min.css';
    }
    
}

