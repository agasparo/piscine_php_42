<?php
	require_once 'day06/ex00/Color.class.php';

	Class Vertex
	{
		private $_x;
		private $_y;
		private $_z;
		private $_w;
		private $_color;
		public static $verbose = False;

		public function __construct( array $points )
		{
			$this->_w = 1.00;
			$this->_color = $this->setC(new Color(array( 'red' =>   255, 'green' =>   255, 'blue' => 255 )));
			if ($points['x'] !== NULL && $points['y'] !== NULL && $points['z'] !== NULL)
			{
				$this->_x = $points['x'];
				$this->_y = $points['y'];
				$this->_z = $points['z'];
				if (array_key_exists('w', $points))
					$this->_w = $points['w'];
				if (array_key_exists('color', $points))
					$this->_color = $points['color'];
			}
			if (self::$verbose === True)
			{
				print('Vertex( x: '.sprintf("%.2f", $this->_x).', y: '.sprintf("%.2f",$this->_y).', z:'.sprintf("%.2f", $this->_z).', w:'.sprintf("%.2f", $this->_w).', '.$this->_color.' ) constructed'.PHP_EOL);			
			}
		}

		public function __toString()
		{
			if (self::$verbose === True)
				return('Vertex( x: '.sprintf("%.2f", $this->_x).', y: '.sprintf("%.2f",$this->_y).', z:'.sprintf("%.2f", $this->_z).', w:'.sprintf("%.2f", $this->_w).', '.$this->_color.' )');
			else
				return('Vertex( x: '.sprintf("%.2f", $this->_x).', y: '.sprintf("%.2f",$this->_y).', z:'.sprintf("%.2f", $this->_z).', w:'.sprintf("%.2f", $this->_w).' )');

		}

		//*****************************************************************************************************************\\

		public function __get($attr)
		{
			return ($this->$attr);
		}

		public function getX()
		{
			return ($this->_x);
		}
		public function getY()
		{
			return ($this->_y);
		}
		public function getZ()
		{
			return ($this->_z);
		}
		public function getW()
		{
			return ($this->_w);
		}
		public function getC()
		{
			return ($this->_color);
		}
		public function setX($x_values)
		{
			return ($this->_x = $x_values);
		}
		public function setY($y_values)
		{
			return ($this->_y = $y_values);
		}
		public function setZ($z_values)
		{
			return ($this->_z = $z_values);
		}
		public function setW($w_values)
		{
			return ($this->_w = $w_values);
		}
		public function setC($color_values)
		{
			return ($this->_Color = $color_values);
		}
		public function setColor($color)
        {
            $this->_color = $color;
        }
        public function getColor()
        {
            return $this->_color;
        }

		public function opposite() {
			return (new Vector(['dest' => new Vertex(['x' => -$this->_x, 'y' => -$this->_y, 'z' => -$this->_z])]));
		}

		//*****************************************************************************************************************\\

		public function __destruct()
		{
			if (self::$verbose === True)
			{
				print('Vertex( x: '.sprintf("%.2f", $this->_x).', y: '.sprintf("%.2f",$this->_y).', z:'.sprintf("%.2f", $this->_z).', w:'.sprintf("%.2f", $this->_w).', '.$this->_color.' ) destructed'.PHP_EOL);			
			}
		}

		public static function doc()
		{
			return (file_get_contents('Vertex.doc.txt'));
		}

	}

?>