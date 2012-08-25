<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Eren
 * Date: 8/25/12
 * Time: 1:11 PM
 * To change this template use File | Settings | File Templates.
 */
include_once('../lib/Util.php');
include_once('../model/DatabaseConnector.php');
require_once('../model/category.php');
$category_id = isset($_GET['category_id'])?$_GET['category_id']:NULL;
if($category_id == NULL)
    die('-1');
$result = category::getSubCategories($category_id);
echo json_encode($result);

