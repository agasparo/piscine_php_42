<?php

Class UnholyFactory {

	public static $fighter_absorbed = "";
	public static $fighter_name = "";

	public function absorb($obj) {
		$get_class = get_class($obj);
		if ($obj->fighter == 1) {
			$e = explode("/", UnholyFactory::$fighter_absorbed);
			$a = array_search($get_class, $e);
			if ($a) {
				print("(Factory already absorbed a fighter of type ".$obj->name.")\n");
			} else {
				print("(Factory absorbed a fighter of type ".$obj->name.")\n");
				UnholyFactory::$fighter_absorbed = UnholyFactory::$fighter_absorbed."/".$get_class;
				UnholyFactory::$fighter_name = UnholyFactory::$fighter_name."/".$obj->name;
			}
		} else {
			print("(Factory can't absorb this, it's not a fighter)\n");
		}
	}
	public function fabricate($rf) {
		$e = explode("/", UnholyFactory::$fighter_name);
		$ex = explode("/", UnholyFactory::$fighter_absorbed);
		$a = array_search($rf, $e);
		if ($a) {
			print("(Factory fabricates a fighter of type ".$rf.")\n");
			return (new $ex[$a]);
		} else {
			print("(Factory hasn't absorbed any fighter of type ".$rf.")\n");
		}
	}
}

?>