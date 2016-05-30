<?php

require_once 'Controleur.php';
require_once 'Requete.php';
require_once 'Vue.php';

class Routeur
{
    public function routeurRequete() {
        try {
            $requete = new Requete(array_merge($_GET, $_POST, $_FILES));
            
            $controleur = $this->creerControleur($requete);
            $action = $this->creerAction($requete);
            
            $controleur->executerAction($action);
        } catch (Exception $exc) {
            $this->gererErreur($exc);
        }
    }
    
    private function creerAction(Requete $requete){
        $action = "index";
        if($requete->existeParametre('action')){
            $action = $requete->getParametre('action');
        }
        return $action;
    }

    private function creerControleur(Requete $requete) {
        $controleur = "Acceuil";
        if($requete->existeParametre('controleur')){
            $controleur = $requete->getParametre('controleur');
            $controleur = ucfirst(strtolower($controleur));
        }
        
        $classControleur = "Controleur" . $controleur;
        $fichierControleur = "Controleur/" . $classControleur. ".php";
        if(file_exists($fichierControleur)){
            require($fichierControleur);
            $controleur = new $classControleur();
            $controleur->setRequete($requete);
            return $controleur;
        }
        else{
            throw new Exception("Fichier '$fichierControleur' introuvable");
        }
    }
    
    private function gererErreur(Exception $exc){
        $vue = new Vue('erreur');
        $vue->generer(array('msgErreur' => $exc->getMessage()));
    }
}