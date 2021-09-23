<?php

namespace App;

class Daemon {
	
	public static function getAdInfoById($id) {
		// Колонки:
			// 1. id - объявления
			// 2. id - кампании
			// 3. id - пользователя
			// 4. название объявления
			// 5. текст объявления
			// 6. стоимость объявления
		return "{$id}\t235678\t12348\tAdName_FromDaemon\tAdText_FromDaemon\t20";

	}
}

