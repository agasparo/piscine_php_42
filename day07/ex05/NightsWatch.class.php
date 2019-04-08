<?php

Class NightsWatch {

	public static $soldat = "";

	public function recruit($obj) {
		NightsWatch::$soldat = NightsWatch::$soldat."/".get_class($obj);
	}

	public function fight() {
		$get_soldats = explode('/', NightsWatch::$soldat);
		foreach ($get_soldats as $key => $value) {
			if (class_exists($value)) { 
				$nv_obj = new $value;
				if (method_exists($nv_obj, 'fight'))
					print($nv_obj->fight());
			}
		}
	} 
}

?>