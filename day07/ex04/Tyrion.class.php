<?php

Class Tyrion { 
	public function sleepWith($colegue) {
		if ($colegue instanceof Jaime)
			print("Not even if I'm drunk !\n");
		else if ($colegue instanceof Sansa)
			print("Let's do this.\n");
		else if ($colegue instanceof Cersei)
			print("Not even if I'm drunk !\n");
	}
}

?>