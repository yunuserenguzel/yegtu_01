<?php

class DatabaseConnector{
	
//	public static $hostName='',$user='bilkent_root',$password='741285',$database='bilkent_biltrader';
    public static $hostName='',$user='biltrade_1',$password='741285',$database='biltrade_1';
//    public static $hostName='',$user='root',$password='',$database='biltrader';

    private static $isConnected = false;
	
	public static function get_results( $sql  ){
		if(DatabaseConnector::$isConnected == false){
			DatabaseConnector::connect();
			DatabaseConnector::$isConnected = true;
		}
		if(!$resultset = mysql_query($sql))return false;
		$results = array();	
		while($row = mysql_fetch_object($resultset))
			$results[] = $row;
		return $results;	
	}
	
	public static function get_single( $sql ){
		if(DatabaseConnector::$isConnected == false){
			DatabaseConnector::connect();
			DatabaseConnector::$isConnected = true;
		}
		$sql .= ' LIMIT 1';
		$resultset = mysql_query($sql);
		return mysql_fetch_object($resultset);
	}
	
	public static function get_value( $sql ){
		if(DatabaseConnector::$isConnected == false){
			DatabaseConnector::connect();
			DatabaseConnector::$isConnected = true;
		}
		$sql .= ' LIMIT 1';
		$resultset = mysql_query($sql);
		$row = mysql_fetch_array($resultset, MYSQL_NUM);
		return $row[0];
	}
	
	public static function query( $sql ){
		if(DatabaseConnector::$isConnected == false){
			DatabaseConnector::connect();
			DatabaseConnector::$isConnected = true;
		}
		return mysql_query($sql);
	}
	
	private static  function connect(){
		mysql_connect(DatabaseConnector::$hostName,DatabaseConnector::$user,DatabaseConnector::$password);
		mysql_select_db(DatabaseConnector::$database);
	}
	
}