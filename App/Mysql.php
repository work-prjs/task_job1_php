<?php

namespace App;

class Mysql {
	
	public static function getAdRecord($id) {
		// $out = DB::query($sql);
		$out = array(
			't_id'       => $id,
			't_name'     => 'AdName_FromMySQL',
			't_text'     => 'AdText_FromMySQL',
			't_keywords' => 'Some Keywords',
			't_price'    => 10
		);
		return $out;
	}
}
