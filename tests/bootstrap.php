<?php
// ensure we get report on all possible php errors
error_reporting(-1);

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'test');
defined('YII_APP_BASE_PATH') or define('YII_APP_BASE_PATH', __DIR__.'/../');

require_once YII_APP_BASE_PATH . '/vendor/autoload.php';
require_once YII_APP_BASE_PATH . '/vendor/yiisoft/yii2/Yii.php';

Yii::setAlias('@tests', __DIR__);

require_once(__DIR__ . '/TestCase.php');

$application = new \yii\web\Application([
    'id' => 'testApp',
    'basePath' => YII_APP_BASE_PATH,
    'vendorPath' => YII_APP_BASE_PATH . '/vendor',
]);

