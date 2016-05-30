<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Task.php';
require_once 'Modele/Person.php';

class ControleurTask extends Controleur{
    private $task;
    private $person;
    
    public function __construct() {
        $this->task = new Task();
        $this->person = new Person();
    }
    public function index() {
        $idPerson = $this->requete->getParametre("id");
        $tasks = $this->task->getTasks($idPerson);
        
        $this->genererVue(array('tasks' => $tasks, 'idPerson' => $idPerson));
    }
    
}