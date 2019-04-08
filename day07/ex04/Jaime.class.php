<?php

Class Jaime { 
	public function sleepWith($colegue) {
		if ($colegue instanceof Tyrion)
			print("Not even if I'm drunk !\n");
		else if ($colegue instanceof Sansa)
			print("Let's do this.\n");
		else if ($colegue instanceof Cersei)
			print("With pleasure, but only in a tower in Winterfell, then.\n");
	}
}

?>