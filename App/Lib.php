<?php

namespace App;

class Lib {

	public static function param(){
		$a=[];
		$q = parse_url($_SERVER['REQUEST_URI'])['query'];
		$q = explode('&', $q);
		
		foreach($q as $r){
			$r = explode('=', $r, 2);
			$a[] = $r;
		}
		
		return $a;
	}

	public static function log_to_file($q){
		$fp = fopen('log.txt', 'a');
		$dt = date('Y-m-d H:i:s');
		$out = "[{$dt}]".$q.PHP_EOL;
		fwrite($fp, $out);
		fclose($fp);
	}

}

