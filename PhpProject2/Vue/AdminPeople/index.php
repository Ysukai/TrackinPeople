<?php $this->titre = 'Travail pratique 3 - Yoann Proulx' ?>
    <!--le form générale qui créer les élément de la table-->
    <form action="adminpeople/ajouterPerson" method="post">
        <p>
            <label for="prenom">Prénom:</label><input type="text" name="prenom" id="prenom" required value="<?= $this->nettoyer($prenom)?>" /><br/>
            <label for="name">Nom:</label><input type="text" name="name" id="name" required value="<?= $this->nettoyer($nom)?>" /><br/>
            <label for="gender">Sexe :</label><?php if($gender == 'Masculin' || $gender == ''){
                echo '<input type="radio" name="gender" value="Masculin" id="masculin" checked />Masculin';
                echo '<input type="radio" name="gender" value="Feminin" id="feminin" />Feminin<br/>';
            }else{
                echo '<input type="radio" name="gender" value="Masculin" id="masculin" />Masculin';
                echo '<input type="radio" name="gender" value="Feminin" id="feminin" checked/>Feminin<br/>';
            }
                    ?>
            <label for="email">Email:</label><input type="text" name="email" id="email" value="<?= $this->nettoyer($email) ?>" required/>
            <?php 
            if(isset($erreur) && $erreur == 'courriel'){
                echo "Entrez un courriel valide";
            }
            ?><br/>
            <label for="date_of_birth">Date de naissance : </label><input type="date" required pattern="(?:19|20)(?:(?:[13579][26]|[02468][048])-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-3:1))|(?:[0-9]{2}-(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:29|30))|(?:(?:0[13578]|1[02])-31)))" name="date_of_birth" placeholder="yyyy-mm-dd" value="<?= $this->nettoyer($date_of_birth)?>"/><br/>
            <label for="date_joined_organisation">Date entrez dans l'organization: </label><input type="date" required pattern="(?:19|20)(?:(?:[13579][26]|[02468][048])-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))|(?:[0-9]{2}-(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:29|30))|(?:(?:0[13578]|1[02])-31)))" name="date_joined_organisation" placeholder="yyyy-mm-dd" value="<?= $this->nettoyer($date_joined_organisation)?>" /><br/>       
            <label for="date_left_organisation">Date sortie de l'organization :  </label><input type="date" required pattern="(?:19|20)(?:(?:[13579][26]|[02468][048])-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))|(?:[0-9]{2}-(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:29|30))|(?:(?:0[13578]|1[02])-31)))" name="date_left_organisation" placeholder="yyyy-mm-dd" id="dateLeft" value="<?= $this->nettoyer($date_left_organisation)?>"/>
            <label for="te">Travail Encore</label><input type="checkbox" name="te" id="null"/><br/>

            <!--Script qui permet de disabled le champs de date de sortie de l'organisation-->
            <script>
                document.getElementById('dateLeft').disabled = false;
                document.getElementById('null').onclick = function () 
                {
                    document.getElementById('dateLeft').disabled = this.checked;
                    document.getElementById('dateLeft').value = "";
                };
            </script>
            <input type="hidden" name="id" value="<?= $this->nettoyer($person['id'])?>"/>
            <label for="other_details">Autre information :     </label><textarea rows="4" cols="50" name="other_details" maxlength="255" placeholder="255 caractères maximum" id="other_details"><?= $this->nettoyer($other_details)?></textarea><br>
            <input type="submit" value="Envoyer" />
        </p>
    </form>
    <form method="post" action="person">
        <input type="hidden" name="Saction" value="index" />
        <input type="hidden" name="Scontroleur" value="acceuil" />
        <input type="submit" value="Retour à l'affichage normal" />
    </form>
    <?php
    
    echo "<table align='center' ><tr><th>Liste des tâches</th><th>Prénom</th><th>Nom</th><th>Sexe</th><th>Adresse Courriel</th><th>Date de naissance</th><th>Date d'arriver dans l'org.</th><th>Date de départ</th><th>autre information</th><th>Modifier Personne</th><th>Montrer personne</th><th>Cacher personne</th></tr> ";
    foreach($people as $person){
        if($person['efface']){
            echo '<tr><td><a href="task/index/' . $this->nettoyer($person['id']) . '">[task]</a></td><td>' . $this->nettoyer($person['prenom']) . '</td><td>' . $this->nettoyer($person['name']) . '</td><td>' . $this->nettoyer($person['gender']) . '</td><td>' . $this->nettoyer($person['email']) . '</td><td>' . $this->nettoyer($person['date_of_birth']) . '</td><td>' . $this->nettoyer($person['date_joined_organisation']) . '</td><td>' . $this->nettoyer($person['date_left_organisation']) . '</td><td>' . $this->nettoyer($person['other_details']) . '</td><td><a href="modifier/index/' . $this->nettoyer($person['id']) . '">[modifier]</a></td><td><a href="adminpeople/montrerPerson/' . $this->nettoyer($person['id']) .  '">[Montrer Personne]</a></td><td></th></tr>';
        }else{
            echo '<tr><td><a href="task/index/' . $this->nettoyer($person['id']) . '">[task]</a></td><td>' . $this->nettoyer($person['prenom']) . '</td><td>' . $this->nettoyer($person['name']) . '</td><td>' . $this->nettoyer($person['gender']) . '</td><td>' . $this->nettoyer($person['email']) . '</td><td>' . $this->nettoyer($person['date_of_birth']) . '</td><td>' . $this->nettoyer($person['date_joined_organisation']) . '</td><td>' . $this->nettoyer($person['date_left_organisation']) . '</td><td>' . $this->nettoyer($person['other_details']) . '</td><td><a href="modifier/index/' . $this->nettoyer($person['id']) . '">[modifier]</a></td><td></td><td><a href="adminpeople/masquerPerson/' . $this->nettoyer($person['id']) .  '">[Masquer Personne]</a></th></tr>';
        }
        
    }
    echo '</table>';

