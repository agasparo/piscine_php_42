<?php

class Place {

	public static $place_x = 0;
	public static $place_y = 20;
	private $_size_x;
	private $_size_y;
	private $_e;
	public $map;
	private $_nom;

	public function __Construct($map, $vaisseau, $equipe) {
		$taille = explode("x", $vaisseau->_taille);
		$this->_nom = $vaisseau->_nom;
		$this->_e = $equipe;
		$this->_size_x = $taille[0];
		$this->_size_y = $taille[1];
		$this->map = $map->map;
		$this->place_on_map();
	}

	public function place_on_map() {
		$i = Place::$place_x;
		while ($i < $this->_size_x + Place::$place_x) {
			$j = Place::$place_y;
			while ($j < $this->_size_y + Place::$place_y) {
				if ($this->_e == 1)
					$this->map[$i][$j] = 2.1.','.$this->_nom;
				else
					$this->map[$i][$j] = 2.2.','.$this->_nom;
				$j++;
			}
			$i++;
		}
		Place::$place_y = Place::$place_y + $this->_size_y + 20;
	}
}
?>