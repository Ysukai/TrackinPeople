<?php $this->titre = 'Travail pratique 3 - Yoann Proulx' ?>

    <form method="post" action="AdminPeople">
        <input type="hidden" name="Saction" value="index" />
        <input type="hidden" name="Scontroleur" value="adminpeople" />

        <input type="submit" value="Gérer les Employer" />
    </form>
    <?php
    echo "<table align='center' ><tr><th>Liste des tâches</th><th>Prénom</th><th>Nom</th><th>Sexe</th><th>Adresse Courriel</th><th>Date de naissance</th><th>Date d'arriver dans l'org.</th><th>Date de départ</th><th>autre information</th></tr> ";
    foreach($people as $person){
        if(!$person['efface']){
            echo '<tr><td><a href="task/index/' . $this->nettoyer($person['id']) . '">[task]</a></td><td>' . $this->nettoyer($person['prenom']) . '</td><td>' . $this->nettoyer($person['name']) . '</td><td>' . $this->nettoyer($person['gender']) . '</td><td>' . $this->nettoyer($person['email']) . '</td><td>' . $this->nettoyer($person['date_of_birth']) . '</td><td>' . $this->nettoyer($person['date_joined_organisation']) . '</td><td>' . $this->nettoyer($person['date_left_organisation']) . '</td><td>' . $this->nettoyer($person['other_details']) . '</td></tr>';
        }
    }
    echo '</table>';

