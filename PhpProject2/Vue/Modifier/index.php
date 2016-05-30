<?php $this->titre = 'Travail pratique 3 - Yoann Proulx';?>
<!-- création du form -->
<form action="modifier/modifierPerson" method="post">
    <p>
        <label for="Prenom">Prénom:</label><input type="text" name="prenom" id="prenom" value="<?php echo $this->nettoyer($modifier['prenom']); ?>" required /><br />
        <label for="Nom">Nom:</label><input type="text" name="name" id="name" value="<?php echo $this->nettoyer($modifier['name']); ?>" required /><br />
        Sexe:
        <input type='radio' name='gender' value='Masculin' id='masculin' <?php
        if ($modifier['gender'] == "Masculin") {
            echo 'checked';
        }
        ?>/><label for='Masculin'>Masculin</label>
        <input type='radio' name='gender' value='Feminin' id='feminin' <?php
        if ($modifier['gender'] == "Feminin") {
            echo 'checked';
        }
        ?>/> <label for='Feminin'>Feminin</label><br/>
        <label for="email">Email:</label><input type="text" name="email" id="email" value="<?php echo $this->nettoyer($modifier['email']); ?>" required/>
        <?php 
        if(isset($erreur) && $erreur == 'courriel'){
            echo "Entrez un courriel valide";
        } 
        ?><br/>
        Date de naissance:
        <input type="date" required id="date_of_birth" pattern="(?:19|20)(?:(?:[13579][26]|[02468][048])-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))|(?:[0-9]{2}-(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:29|30))|(?:(?:0[13578]|1[02])-31)))" name="date_of_birth" placeholder="yyyy-mm-dd" value="<?php echo $this->nettoyer($modifier['date_of_birth']); ?>"/>
        <br/>
        <br/>
        Date entrez dans l'organization:
        <input type="date" required id="date_joined_organisation" pattern="(?:19|20)(?:(?:[13579][26]|[02468][048])-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))|(?:[0-9]{2}-(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:29|30))|(?:(?:0[13578]|1[02])-31)))" name="date_joined_organisation" placeholder="yyyy-mm-dd" value="<?php echo $this->nettoyer($modifier['date_joined_organisation']); ?>"/>

        <br/>
        <br/>
        Date sortie de l'organization
        <!--condition si la personne travail ou non encore--> 
        <?php
        if (!is_null($donnees['date_left_organisation'])) {
            ?>
            <input type="date" required pattern="(?:19|20)(?:(?:[13579][26]|[02468][048])-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))|(?:[0-9]{2}-(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:29|30))|(?:(?:0[13578]|1[02])-31)))" name="date_left_organisation" placeholder="yyyy-mm-dd" id="date_left_organisation" value="<?php echo $this->nettoyer($modifier['date_left_organisation']); ?>"/>
            <?php
            echo "<input type='checkbox' name='te' id='te'/><label for='null'>Travail Encore</label><br/>";
            echo "enabled";
        } else {
            ?>
            <input type="date" disabled required pattern="(?:19|20)(?:(?:[13579][26]|[02468][048])-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))|(?:[0-9]{2}-(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:29|30))|(?:(?:0[13578]|1[02])-31)))" name="date_left_organisation" placeholder="yyyy-mm-dd" id="date_left_organisation" value="<?php echo $this->nettoyer($modifier['date_left_organisation']); ?>"/>
            <?php
            echo "<input type='checkbox' checked name='te' id='te'/><label for='null'>Travail Encore</label><br/>";
            echo "disabled";
        }
        ?>
        <!--script pour disabled le champ date sortie si checkbox is checked-->
        <script>
            document.getElementById('te').onclick = function () {
                document.getElementById('date_left_organisation').disabled = this.checked;
                document.getElementById('date_left_organisation').value = "";
            };
        </script>

        <label for="other_details">Autre information :</label><textarea rows="4" cols="50" maxlength="255" placeholder="255 caractères maximum" name="other_details" id="other_details"><?php echo $this->nettoyer($modifier['other_details']); ?></textarea><br/>
        <input type="hidden" name="id" value="<?php echo $idPerson; ?>" />
        <input type="submit" value="Modifier" />
    </p>
</form>
<form action="acceuil" method="post">
    <input type="submit" value="Annuler"/>
</form>

