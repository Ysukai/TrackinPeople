<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/Person.php';
require_once 'Modele/Task.php';

class ControleurAdmin extends ControleurSecurise
{
    private $person;
    private $task;
    
    public function __construct() {
        $this->person = new Person();
        $this->task = new Task();
    }
    public function index() {
        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('login' => $login));
    }
}