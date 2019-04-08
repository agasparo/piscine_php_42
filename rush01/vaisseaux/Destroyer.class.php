<?php

class Destroyer extends Vaissaux
{
	public $_nom = "Destroyer";
	public $_vie = 50;
	public $_taille = "9x5";
	public $_sprite = "img/Destroyer.png";
	public $_puis_moteur = "9";
	public $_vitesse = "10";
	public $_manoeuvre = "0";
	public $_bouclier = "0";
	public $_arme = "lance missiles";

	public function attack($cible) {
		$dammage = new lance_missiles();
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