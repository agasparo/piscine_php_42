<?php

class Big_boom extends Vaissaux
{
	public $_nom = "Big_boom";
	public $_vie = 250;
	public $_taille = "15x8";
	public $_sprite = "img/Big_boom.png";
	public $_puis_moteur = "9";
	public $_vitesse = "10";
	public $_manoeuvre = "1";
	public $_bouclier = "0";
	public $_arme = "El vie";

	public function attack($cible) {
		$dammage = new el_vie();
		print_r($dammage->get_info($this->_arme));
		$dammage->get_dammage($this->_arme);
		if ($cible->_bouclier > 0) {
			$degat = intval($dammage->_puis) - intval($_bouclier);
			$cible->_vie = $cible->_vie - intval($degat);
			$cible->_bouclier = 0;
		} else {
			$cible->_vie = $cible->_vie - intval($dammage->_puis);
		}
		$this->_vie = $this->_vie + (intval($dammage->_puis) / 2);
	}
}

?>