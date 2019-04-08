<?php

class Map {
	public $map;
	private $_obj;
	private $_size_x;
	private $_size_y;

	public function __Construct() {
		$this->_obj = rand(6, 10);
		$this->_size_x = 100;
		$this->_size_y = 150;
		$this->create_map();
		$this->add_obs();
	}

	public function create_map() {
		$i = 0;
		while ($i < $this->_size_x) {
			$j = 0;
			while ($j < $this->_size_y) {
				$this->map[$i][$j] = 0;
				$j++;
			}
			$i++;
		}
	}

	public function add_obs() {
		$obs_place = 0;
		$x = intval($this->_size_x / 2);
		$y = intval($this->_size_y / 2);
		$size_obj_x = rand(3, 10);
		$size_obj_y = rand(3, 5);
		$all_place = array();
		while ($obs_place <= $this->_obj) {
			while (in_array($x."/".$y, $all_place)) {
				$x = rand(20, $this->_size_x - 20);
				$y = rand(0, $this->_size_y);
				$size_obj_x = rand(1, 7);
				$size_obj_y = rand(1, 7);
			}
			$a = $x + $size_obj_x;
			$c = $y + $size_obj_y;
			if ($a > $this->_size_x) {
				$b = $a - $this->_size_x;
				$a = $x + $b;
			}
			if ($c > $this->_size_y) {
				$d = $c - $this->_size_y;
				$c = $y + $d;
			}
			$e = $y;
			while ($x < $a) {
				$y = $e;
				while ($y < $c) {
					$this->map[$x][$y] = "1";
					$y++;
				}
				$this->map[$x][$y] = "1";
				$x++;
			}
			$all_place[$obs_place] = $x."/".$y;
			$obs_place++;
		}
	}
}
?>