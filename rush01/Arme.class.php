<?php

class Arme {
	
	protected $_puis = 0;
	protected $_portee = 0;
	protected $_cout = 0;

	public function get_dammage($arme) {
		return ($this->_puis);
	}

	public function get_info($arme) {
		return (vsprintf("puissance : %3s\nportee : %3s\ncout : %3s\n", array($this->_puis, $this->_portee, $this->_cout)));
	}

	public function get_round($arme) {
		return ($this->_portee);
	}

}
?>