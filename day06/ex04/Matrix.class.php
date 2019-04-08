<?php
class Matrix {

	public static $verbose = False;
	const IDENTITY = "IDENTITY";
	const SCALE = "SCALE";
	const RX = "Ox ROTATION";
	const RY = "Oy ROTATION";
	const RZ = "Oz ROTATION";
	const TRANSLATION = "TRANSLATION";
	const PROJECTION = "PROJECTION";

	private $_name;
	private $_scale;
	private $_angle;
	private $_vtc;
	private $_fov;
	private $_ratio;
	private $_near;
	private $_far;
	public $matrix = array();

	public function __Construct($data = null) {
		if (isset($data['preset']))
			$this->_name = $data['preset'];
		if (isset($data['scale']))
			$this->_scale = $data['scale'];
		if (isset($data['angle']))
			$this->_angle = $data['angle'];
		if (isset($data['vtc']))
			$this->_vtc = $data['vtc'];
		if (isset($data['fov']))
			$this->_fov = $data['fov'];
		if (isset($data['ratio']))
			$this->_ratio = $data['ratio'];
		if (isset($data['near']))
			$this->_near = $data['near'];
		if (isset($data['far']))
			$this->_far = $data['far'];
		$this->create_tab_matrix();
		if (Self::$verbose) {
			if (Self::$verbose) {
				if ($this->_name == Self::IDENTITY)
					echo "Matrix " . $this->_name . " instance constructed\n";
			}
		}
		$this->go_to_function();
	}

	
	public function __Destruct()
	{
		if (Self::$verbose)
			printf("Matrix instance destructed\n");
	}

	public function __ToString()
	{
		$tmp = "M | vtcX | vtcY | vtcZ | vtxO\n";
		$tmp .= "-----------------------------\n";
		$tmp .= "x | %0.2f | %0.2f | %0.2f | %0.2f\n";
		$tmp .= "y | %0.2f | %0.2f | %0.2f | %0.2f\n";
		$tmp .= "z | %0.2f | %0.2f | %0.2f | %0.2f\n";
		$tmp .= "w | %0.2f | %0.2f | %0.2f | %0.2f";
		return (vsprintf($tmp, array($this->matrix[0], $this->matrix[1], $this->matrix[2], $this->matrix[3], $this->matrix[4], $this->matrix[5], $this->matrix[6], $this->matrix[7], $this->matrix[8], $this->matrix[9], $this->matrix[10], $this->matrix[11], $this->matrix[12], $this->matrix[13], $this->matrix[14], $this->matrix[15])));
	}

	public function go_to_function() {
		switch ($this->_name) {
			case (self::IDENTITY) :
				$this->init(1);
				break;
			case (self::TRANSLATION) :
				$this->translation();
				break;
			case (self::SCALE) :
				$this->init($this->_scale);
				break;
			case (self::RX) :
				$this->rotation_x();
				break;
			case (self::RY) :
				$this->rotation_y();
				break;
			case (self::RZ) :
				$this->rotation_z();
				break;
			case (self::PROJECTION) :
				$this->projection();
				break;
		}
	}

	public function init($init_matrix) {

		$this->matrix[0] = $init_matrix;
		$this->matrix[5] = $init_matrix;
		$this->matrix[10] = $init_matrix;
		$this->matrix[15] = 1;
	}

	public function translation() {
		$this->init(1);
		$this->matrix[3] = $this->_vtc->getX();
		$this->matrix[7] = $this->_vtc->getY();
		$this->matrix[11] = $this->_vtc->getZ();
	}

	public function rotation_x() {
		$this->init(1);
		$this->matrix[5] = cos($this->_angle);
		$this->matrix[6] = -sin($this->_angle);
		$this->matrix[9] = sin($this->_angle);
		$this->matrix[10] = cos($this->_angle);
	}

	public function rotation_y() {
		$this->init(1);
		$this->matrix[0] = cos($this->_angle);
		$this->matrix[2] = sin($this->_angle);
		$this->matrix[8] = -sin($this->_angle);
		$this->matrix[10] = cos($this->_angle);
	}

	public function rotation_z() {
		$this->init(1);
		$this->matrix[0] = cos($this->_angle);
		$this->matrix[1] = -sin($this->_angle);
		$this->matrix[4] = sin($this->_angle);
		$this->matrix[5] = cos($this->_angle);
	}

	public function projection() {
		$this->init(1);
		$this->matrix[5] = 1 / tan(0.5 * deg2rad($this->_fov));
		$this->matrix[0] = $this->matrix[5] / $this->_ratio;
		$this->matrix[10] = -1 * (-$this->_near - $this->_far) / ($this->_near - $this->_far);
		$this->matrix[14] = -1;
		$this->matrix[11] = (2 * $this->_near * $this->_far) / ($this->_near - $this->_far);
		$this->matrix[15] = 0;
	}

	public function mult(Matrix $mat) {
		$calc = array();
		$i = 0;
		while ($i < 16) {
			$j = 0;
			while ($j < 4) {
				$calc[$i + $j] = 0;
				$calc[$i + $j] += $this->matrix[$i + 0] * $mat->matrix[$j + 0];
                $calc[$i + $j] += $this->matrix[$i + 1] * $mat->matrix[$j + 4];
                $calc[$i + $j] += $this->matrix[$i + 2] * $mat->matrix[$j + 8];
                $calc[$i + $j] += $this->matrix[$i + 3] * $mat->matrix[$j + 12];
				$j++;
			}
			$i = $i + 4;
		}
		$new_created_matrice = new Matrix();
        $new_created_matrice->matrix = $calc;
        return ($new_created_matrice);
	}

	public function transformVertex($vertex) {
		$new_vertex = array();
		$new_vertex['x'] = ($vertex->getX() * $this->matrix[0]) + ($vertex->getY() * $this->matrix[1]) + ($vertex->getZ() * $this->matrix[2]) + ($vertex->getW() * $this->matrix[3]);
		$new_vertex['y'] = ($vertex->getX() * $this->matrix[4]) + ($vertex->getY() * $this->matrix[5]) + ($vertex->getZ() * $this->matrix[6]) + ($vertex->getW() * $this->matrix[7]);
		$new_vertex['z'] = ($vertex->getX() * $this->matrix[8]) + ($vertex->getY() * $this->matrix[9]) + ($vertex->getZ() * $this->matrix[10]) + ($vertex->getW() * $this->matrix[11]);
		$new_vertex['w'] = ($vertex->getX() * $this->matrix[11]) + ($vertex->getY() * $this->matrix[13]) + ($vertex->getZ() * $this->matrix[14]) + ($vertex->getW() * $this->matrix[15]);
		$new_vertex['color'] = $vertex->_color;
		return (new Vertex($new_vertex));
	}

	public function create_tab_matrix() {
		$i = 0;
		while ($i < 15) {
			$this->matrix[$i] = 0;
			$i++;
		}
	}

	public static function doc() {
	 	return (file_get_contents("Matrix.doc.txt"));
	}
}
?>