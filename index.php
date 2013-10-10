<?php
/**
 * Created by JetBrains PhpStorm.
 * User: pazzionate
 * Date: 10/10/13
 * Time: 1:04 AM
 * To change this template use File | Settings | File Templates.
 */

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . "modules" . DIRECTORY_SEPARATOR . "errorLog.php");
$sample_file = dirname(__FILE__) . DIRECTORY_SEPARATOR . "errorlog";
$sample_pattern = '/photo\s"(\d+)"/';
$error_obj = new ErrorLog($sample_file, $sample_pattern);
$error_obj->begin();
$error_obj->echoOutput();
var_dump($error_obj->getCount());