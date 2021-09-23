<?php

require __DIR__ . '/vendor/autoload.php';

function run(){
	
	$available_methods  = ["mysql", "daemon", "log", "debug"];
	
	foreach(\App\Lib::param() as $w){
		
		if (in_array($w[0], $available_methods)) {

			switch ($w[0]) {
					case "mysql":
						$q = \App\MySQL::getAdRecord($w[1]);
						\App\Front::render($q, $w[0]);
						
						foreach(\App\Lib::param() as $value)
						{
							if(in_array("log", $value, true))
							{
								\App\Lib::log_to_file( "MySQL::getAdRecord({$w[1]})" );
							}
						}
						
						break;
					case "daemon":
						$q = \App\Daemon::getAdInfoById($w[1]);
						\App\Front::render($q, $w[0]);

						foreach(\App\Lib::param() as $value)
						{
							if(in_array("log", $value, true))
							{
								\App\Lib::log_to_file( "Daemon::getAdInfoById({$w[1]})" );
							}
						}

						break;
					case "debug":
						echo "<pre>";
							var_dump( \App\Lib::param() );
						echo "</pre>";
						break;
			}

		}

	}
}

run();
