<?php

class Vaissaux {
	protected $_nom;
	protected $_taille;
	protected $_sprite;
	protected $_puis_moteur;
	protected $_vitesse;
	protected $_manoeuvre;
	protected $_bouclier;
	protected $_arme;
	protected $_vie;
	protected $_active;

	public function show_name() {
		return($this->_nom);
	}

	public function show_vie() {
		return($this->_vie);
	}

	public function show_taille() {
		return($this->_taille);
	}

	public function show_puis_moteur() {
		return($this->_puis_moteur);
	}

	public function show_vitesse() {
		return($this->_vitesse);
	}

	public function show_manoeuvre() {
		return($this->_manoeuvre);
	}

	public function show_bouclier() {
		return($this->_bouclier);
	}

	public function show_arme() {
		return($this->_arme);
	}

	public function add_vie($add) {
		$this->_vie = $add;
	}

	public function add_vitesse($add) {
		$this->_vitesse = $this->_vitesse + $add;
	}

	public function add_bouclier($add) {
		$this->_bouclier = $this->_bouclier + $add;
	}

	public function add_port($arme, $add) {
		print_r($arme);
		$arme->add_portee($add);
	}

	public function reset($val) {
		$this->_bouclier = 0;
		$this->_vitesse = $val;
	}
}
?>