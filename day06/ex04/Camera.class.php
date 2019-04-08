<?php

class Camera {
	public static $verbose = False;
	private $_proj;
	private $_tR;
	private $_tT;
	private $_origine;
	private $_width;
	private $_height;
	private $_ratio;

	public function __Construct(array $data) {
		if (isset($data['origin']))
			$this->_origine = $data['origin'];
			$this->_tT = new Matrix ( array('preset' => Matrix::TRANSLATION, 'vtc' => $this->_origine->opposite()));
			$this->_tR = $this->exchange($data['orientation']);
			$this->_height = $data['height'];
			$this->_width = $data['width'];
			$this->_ratio = $this->_width / $this->_height;
			$this->_proj = new Matrix(array( 'preset' => Matrix::PROJECTION, 'fov' => $data['fov'], 'ratio' => $this->_ratio, 'near' => $data['near'], 'far' => $data['far']));
		if (Self::$verbose)
            echo "Camera instance constructed\n";
	}

	//*****************************************************************************************************************\\

	public function exchange(Matrix $tab_matrix) {
		$i = 0;
		$b = 0;
		while (isset($tab_matrix->matrix[$i])) {
			
			if (is_int($i / 4)) {
				$j = 0;
				$a = $i / 4;
				while ($j < 4) {
					$tab[$b] = $tab_matrix->matrix[$a];
					$a = $a + 4;
					$j++;
					$b++;
				}
			}
			$i++;
		}
		$tab_matrix->matrix = $tab;
		return ($tab_matrix);
	}

	public function watchVertex(Vertex $worldVertex) {
		$vtx = $this->_proj->transformVertex($this->_tR->transformVertex($worldVertex));
        $vtx->setX($vtx->getX() * $this->_ratio);
        $vtx->setY($vtx->getY());
        $vtx->setColor($worldVertex->_color);
       	return ($vtx);
    }

    //*****************************************************************************************************************\\

	public function __ToString() {
		$tmp = "Camera( \n";
		$tmp .= "+ Origine: ".$this->_origine."\n";
		$tmp .= "+ tT:\n".$this->_tT."\n";
		$tmp .= "+ tR:\n".$this->_tR."\n";
		$tmp .= "+ tR->mult( tT ):\n".$this->_tR->mult($this->_tT)."\n";
		$tmp .= "+ Proj:\n".$this->_proj."\n)";
		return ($tmp);
	}

	public function __Destruct() {
		if (Self::$verbose)
			printf("Camera instance destructed\n");
	}

	public static function doc() {
		return (file_get_contents("Camera.doc.txt"));
	} 
}
?>