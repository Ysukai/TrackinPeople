<?php

require_once 'Controleur/ControleurSecurise.php';
require_once 'Modele/Person.php';
require_once 'Modele/Task.php';


class ControleurAdminPeople extends ControleurSecurise{
    private $person;
    private $task;
    private $ok = 'false';
    public function __construct() {
        $this->person = new Person();
        $this->task = new Task();
    }
    public function index() {
        $people = $this->person->getPeople();
        $login = $this->requete->getSession()->getAttribut("login");
        $erreur = '';
        $prenom = '';
        $nom = '';
        $gender = '';
        $email = '';
        $date_of_birth = '';
        $date_joined_organisation = '';
        $date_left_organisation = '';
        $other_details = '';
        if($this->ok == 'true'){
            $erreur = 'courriel';
            $this->ok = 'false';
            $prenom = $this->requete->getParametre('prenom');
            $nom = $this->requete->getParametre('name');
            $gender = $this->requete->getParametre('gender');
            $email = $this->requete->getParametre('email');
            $date_of_birth = $this->requete->getParametre('date_of_birth');
            $date_joined_organisation = $this->requete->getParametre('date_joined_organisation');
            if($this->requete->existeParametre('date_left_organisation')){
                $date_left_organisation = $this->requete->getParametre('date_left_organisation');
            }
            if($this->requete->existeParametre('other_details')){
                $other_details = $this->requete->getParametre('other_details');
            }
        }
        $this->genererVue(array('people' => $people, 'login' => $login, 'erreur' => $erreur, 'prenom' => $prenom, 'nom' => $nom, 'gender' => $gender, 'email' => $email, 'date_of_birth' => $date_of_birth, 'date_joined_organisation' => $date_joined_organisation, 'date_left_organisation' => $date_left_organisation, 'other_details' => $other_details));
        
    }
    public function masquerPerson() {
        $idPerson = $this->requete->getParametre("id");
        $this->person->effacerPerson($idPerson);
        
        $this->executerAction("index");
    }
    public function montrerPerson() {
        $idPerson = $this->requete->getParametre("id");
        $this->person->retablirPerson($idPerson);
        
        $this->executerAction("index");
    }
    public function ajouterPerson() {
        $prenom = $this->requete->getParametre("prenom");
        $name = $this->requete->getParametre("name");
        $gender = $this->requete->getParametre("gender");
        $email = $this->requete->getParametre("email");   
        $date_of_birth = $this->requete->getParametre("date_of_birth");
        $date_joined_organisation = $this->requete->getParametre("date_joined_organisation");
        if($this->requete->existeParametre("date_left_organisation")){
           $date_left_organisation = $this->requete->getParametre("date_left_organisation"); 
        }  else {
           $date_left_organisation = null;
        }
        if($this->requete->existeParametre("other_details")){
           $other_details = $this->requete->getParametre("other_details"); 
        }  else {
           $other_details = null;
        }
        if(filter_var($email, FILTER_VALIDATE_EMAIL) !== false){
            $this->person->postPeople($name, $prenom, $gender, $email, $date_of_birth, $date_joined_organisation, $date_left_organisation, $other_details);
        }else{
            $this->ok = 'true';
        }
        $this->executerAction("index");
    }
}