<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Eren
 * Date: 8/25/12
 * Time: 11:44 AM
 * To change this template use File | Settings | File Templates.
 */
class category{
    public static function getCategories(){
        $sql = "SELECT * FROM category ORDER BY name";
        return DatabaseConnector::get_results($sql);
    }
    public static function addCategory($name){
        $name = Util::FilterString($name);
        $sql = "INSERT INTO category (name) VALUES ('$name')";
        DatabaseConnector::query($sql);
        $category_id =  mysql_insert_id();
        return $category_id;
    }
    public static function addSubCategory($name,$category_id){
        $name = Util::FilterString($name);
        if(!is_numeric($category_id))
            die("category_id must be numeric");
        $sql = "INSERT INTO sub_category (name) VALUES ('$name')";
        DatabaseConnector::query($sql);
        $sub_category_id = mysql_insert_id();
        $sql = "INSERT INTO under (category_id,sub_category_id) VALUES ($category_id,$sub_category_id)";
        DatabaseConnector::query($sql);
        return $sub_category_id;
    }
    public static function getSubCategories($category_id){
        if(!is_numeric($category_id))
            die("category_id must be numeric");
        $sql = "SELECT S.name,S.sub_category_id
                FROM sub_category S
                INNER JOIN under U ON U.sub_category_id=S.sub_category_id
                INNER JOIN category C ON C.category_id=U.category_id
                WHERE C.category_id = $category_id";
        if(!$result  = DatabaseConnector::get_results($sql))
            die(mysql_error());
        return $result;

    }

}
