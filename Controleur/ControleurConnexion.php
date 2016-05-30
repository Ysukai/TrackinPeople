<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Utilisateur.php';

class ControleurConnexion extends Controleur{
    private $utilisateur;
    
    public function __construct() {
        $this->utilisateur = new Utilisateur();
    }
    public function index() {
        $this->genererVue();
    }
    public function connecter() {
        $login = $this->requete->getParametre("login");
        $mdp = $this->requete->getParametre("mdp");
        if($this->utilisateur->connecter($login, $mdp)){
            $utilsateur = $this->utilisateur->getUtilisateur($login, $mdp);
            $this->requete->getSession()->setAttribut("idUtilisateur", $utilsateur['idUtilisateur']);
            $this->requete->getSession()->setAttribut("login", $utilsateur['login']);
            if($this->requete->getSession()->existeAttribut("controleur") &&
            $this->requete->getSession()->existeAttribut("action")){
                $controleur = $this->requete->getSession()->getAttribut("controleur");
                $action = $this->requete->getSession()->getAttribut("action");
                $this->rediriger($controleur . '/' . $action . '/');
            }else{
                $this->rediriger("acceuil");
            }
        }else{
            $this->genererVue(array('msgErreur' => 'Login ou mot de pass inccorect'),"index");
        }
    }
    public function deconnecter(){
        $this->requete->getSession()->detruire();
    
        if($this->requete->existeParametre("Scontroleur") && $this->requete->existeParametre("Saction")){
            $controleur = $this->requete->getParametre("Scontroleur");
            $action = $this->requete->getParametre("Saction");
            $this->rediriger($controleur . '/' . $action . '/');
        }else{
            $this->rediriger("acceuil");
        }
    }
}