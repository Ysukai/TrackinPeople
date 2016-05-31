<?php

require_once 'Configuration.php';
class Vue {
    
    private $fichier;
    private $titre;
    
    public function __construct($action, $controleur = "") {
        $fichier = "Vue/";
        if($controleur != ""){
            $fichier = $fichier . $controleur . "/";
        }
        $this->fichier = $fichier. $action . ".php";
    }
    public function generer($donnees, $login = NULL){
        $contenu = $this->genererFichier($this->fichier, $donnees);
        $vue = $this->genererFichier('Vue/gabarit.php', 
                array('titre' => $this->titre,
                    'contenu' => $contenu,
                    'login' => $login));
        echo $vue;
    }
    private function genererFichier($fichier, $donnees) {
        if(file_exists($fichier)){
            extract($donnees);
            
            $racineWeb = Configuration::get("racineWeb", "/");
            ob_start();
            
            require $fichier;
            
            return ob_get_clean();
        }
        else{
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }
    private function nettoyer($valeur){
        return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
    }
}