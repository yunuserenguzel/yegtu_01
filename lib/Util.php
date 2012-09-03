<?php

class Util{
	public static function FilterString($str){
		$str = mysql_escape_string($str);
		$str = str_replace("<","&lt;",$str);
		$str = str_replace(">","&gt;",$str);
		return $str;
	}
    public static function GeneratePasscode(){
        return uniqid("BILTRADER+");
    }
} 