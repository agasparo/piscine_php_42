<?php

class Fregate extends Vaissaux {
	public $_nom = "Fregate";
	public $_taille = "6x4";
	public $_sprite = "img/fregate.png";
	public $_puis_moteur = "9";
	public $_vitesse = "20";
	public $_manoeuvre = "0";
	public $_bouclier = "0";
	public $_vie = 50;
	public $_active = 1;
	public $_arme = "minigun";

	public function attack($cible) {
		$dammage = new minigun();
		print_r($dammage->get_info($this->_arme));
		$dammage->get_dammage($this->_arme);
		if ($cible->_bouclier > 0) {
			$degat = intval($dammage->_puis) - intval($_bouclier);
			$cible->_vie = $cible->_vie - intval($degat);
			$cible->_bouclier = 0;
		} else {
			$cible->_vie = $cible->_vie - intval($dammage->_puis);
		}
	}	 
}

?>