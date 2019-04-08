<?php


	Class Vector
	{
		private $_x = 1.0;
		private $_y = 1.0;
		private $_z = 1.0;
		private $_w = 0.0;
		public static $verbose = False;
		
		public function __Construct(array $coord)
		{
			if (isset($coord["x"]) && isset($coord["y"]) && isset($coord["z"])) {
				$this->_x = $coord["x"];
				$this->_y = $coord["y"];
				$this->_z = $coord["z"];
			} else {
				if (!isset($coord["orig"]))
					$coord["orig"] = new Vertex(array("x" => 0.0, "y" => 0.0, "z" => 0.0));
				$this->_x = $coord["dest"]->getX() - $coord["orig"]->getX();
				$this->_y = $coord["dest"]->getY() - $coord["orig"]->getY();
				$this->_z = $coord["dest"]->getZ() - $coord["orig"]->getZ();
				$this->_w = 0.0;
			}
			if (Self::$verbose)
				printf("Vector (x:%.2f, y:%.2f, z:%.2f, w:%.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);

		}

		public function __ToString() {
			return(vsprintf("Vector (x:%.2f, y:%.2f, z:%.2f, w:%.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
		}

		public function __Destruct() {
			if (Self::$verbose)
				printf("Vector (x:%.2f, y:%.2f, z:%.2f, w:%.2f ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
		}

		public static function doc() {
			return (file_get_contents("Vector.doc.txt"));
		}

		//*****************************************************************************************************************\\
		public function magnitude() {
			return (sqrt(($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z)));
		}

		public function normalize() {
			$norme = $this->magnitude();
			return (new Vector(['dest' => new Vertex(['x' => $this->_x / $norme, 'y' => $this->_y / $norme, 'z' => $this->_z / $norme])]));
		}

		public function add($vecteur) {
			return (new Vector(['dest' => new Vertex(['x' => $this->_x + $vecteur->_x, 'y' => $this->_y + $vecteur->_y, 'z' => $this->_z + $vecteur->_z])]));
		}

		public function sub($vecteur) {
			return (new Vector(['dest' => new Vertex(['x' => $this->_x - $vecteur->_x, 'y' => $this->_y - $vecteur->_y, 'z' => $this->_z - $vecteur->_z])]));
		}

		public function scalarProduct($nb) {
			return (new Vector(['dest' => new Vertex(['x' => $this->_x * $nb, 'y' => $this->_y * $nb, 'z' => $this->_z * $nb])]));
		}

		public function dotProduct($vecteur) {
			return ($this->_x * $vecteur->_x + $this->_y * $vecteur->_y + $this->_z * $vecteur->_z);
		}

		public function crossProduct($vecteur) {
			return (new Vector(['dest' => new Vertex(['x' => ($this->_y * $vecteur->_z) - ($this->_z * $vecteur->_y), 'y' => ($this->_z * $vecteur->_x) - ($this->_x * $vecteur->_z), 'z' => ($this->_x * $vecteur->_y) - ($this->_y * $vecteur->_x)])]));
		}

		public function cos($vecteur) {
			return ($this->_x * $vecteur->_x + $this->_y * $vecteur->_y + $this->_z * $vecteur->_z) / 
			sqrt(($this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z) * ($vecteur->_x * $vecteur->_x +
				  $vecteur->_y * $vecteur->_y + $vecteur->_z * $vecteur->_z));
		}

		public function opposite() {
			return (new Vector(['dest' => new Vertex(['x' => -$this->_x, 'y' => -$this->_y, 'z' => -$this->_z])]));
		}

		//*****************************************************************************************************************\\
		public function getX() {
			return ($this->_x);
		}
		public function getY() {
			return ($this->_y);
		}
		public function getZ() {
			return ($this->_z);
		}
		public function getW() {
			return ($this->_w);
		}
	} 