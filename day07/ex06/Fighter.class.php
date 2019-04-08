<?php

Class Fighter {

	public $fighter = 0;
	public $name;
	public $check;

	public function __construct($class_soldats) {
		$this->fighter = 1;
		$this->name = $class_soldats;
		if (!method_exists($this, 'fight'))
			$check = $this->fight("the Hound");
	}
}

?>