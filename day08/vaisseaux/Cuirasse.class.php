<?php

class Cuirasse extends Vaissaux
{
	public $_nom = "Cuirasse";
	public $_vie = 50;
	public $_taille = "7x2";
	public $_sprite = "img/Cuirasse.png";
	public $_puis_moteur = "9";
	public $_vitesse = "15";
	public $_manoeuvre = "0";
	public $_bouclier = "0";
	public $_arme = "cannons";

	public function attack($cible) {
		$dammage = new cannons();
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