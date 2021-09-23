<?php

namespace App;

	function dol_to_rub($d){
		$get_rub_to_dol = 65;
		return $d*$get_rub_to_dol;
	}

class Front {

	public static function render($q, $type){
		
		switch ($type) {
			
			case "mysql":
				\App\Front::templ($q);
				break;
			case "daemon":
				$q2 = explode("\t", $q);
				$q3=[];
				$q3['t_name'] = $q2[3];
				$q3['t_text'] = $q2[4];
				$q3['t_price'] = $q2[5];
				\App\Front::templ($q3);
				break;
		}
		

	}
	public static function templ($q){

		$q['t_price'] = dol_to_rub($q['t_price']);
		echo "<h1>{$q['t_name']} </h1>";
		echo "<p> {$q['t_text']} </p>";
		echo "<p> {$q['t_price']} </p>";
		
	}
}
