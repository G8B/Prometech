

<div id="user-compte">
	
		<form action="" method="post">
	
		<h1>Mon compte</h1>
		<br>
				
		<p >
            <label for="nom">Nom :</label>
            <input type="text" name ="newnom" placeholder="<?php echo $userInfos['nom']?>" size="25"/>
        </p>
        <br>
        <p >
            <label for="prenom">Prenom :</label>
            <input type="text" name="newprenom" placeholder="<?php echo $userInfos['prenom']?>"   size="25"/>
        </p>
        <br>
        <p >
            <label for="email">Email :</label>
            <input type="email" name="newmail"  placeholder="<?php echo $userInfos['email']?>"  size="25"/>
        </p>
        <br>
        <p >
            <label for="password">Mot de passe actuel :</label>
            <input type="password" name="mdpactuel" placeholder="Actual password"  size="25"/>
        </p>        
        <br>
        
        <p >
            <label for="newpassword">Nouveau mot de passe:</label>
            <input type="password" name="newmdp1" placeholder="New password"  size="25"/>
        </p>
        <br>
        
        <p >
            <label for="confirm">Confirmer nouveau mot de passe:</label>
            <input type="password" name="newmdp2" placeholder="New password"  size="25"/>
        </p>
        <br>
        <br>
         <p>
            <input class="form-button" type="submit" value="Confirmer"  style="width: 100px" />
        </p>
        
        
	</form>
	

	
</div>
