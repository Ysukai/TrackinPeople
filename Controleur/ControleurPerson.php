<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Person.php';

class ControleurPerson extends Controleur {
    private $person;
    
    public function __construct() {
        $this->person = new Person();
    }
    public function index() {
        
        $people = $this->person->getPeople();
        $this->genererVue(array('people' => $people));
    }

    
}