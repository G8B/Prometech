<?php
require('C:/xampp/htdocs/controller/edition_compte-controller.php');

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Prometech</title>
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
   
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
<?php require_once("header.php"); ?>
<div id="content-window">
    <?php require_once("sidebar.php"); ?>

    
    
 <link rel="stylesheet" type="text/css" href="/public/css/mon_compte.css">

 

	
<div id="user-compte">
	
		<form action="" method="post">
	
		<h1>Mon compte</h1>
		<br>
				
		<p >
            <label for="nom">Nom :</label>
            <input type="Nom" name="Nom"  placeholder="<?php echo $userinfo['nom']?>" size="25"/>
        </p>
        <br>
        <p >
            <label for="prenom">Prenom :</label>
            <input type="prenom" name="prenom" placeholder="<?php echo $userinfo['prenom']?>"   size="25"/>
        </p>
        <br>
         <!--
         <p >
            <label for="adresse">Adresse :</label>
            <input type="adresse" name="adresse" placeholder="adresse"  size="25"/>
        </p>
        <br>
        -->
        <p >
            <label for="email">Email :</label>
            <input type="email" name="email" placeholder="<?php echo $userinfo['email']?>"  size="25"/>
        </p>
        <br>
        <p >
            <label for="password">Mot de passe actuel :</label>
            <input type="password" name="password" placeholder="Actual password"  size="25"/>
        </p>        
        <br>
        
        <p >
            <label for="newpassword">Nouveau mot de passe:</label>
            <input type="newpassword" name="newpassword" placeholder="New password"  size="25"/>
        </p>
        <br>
        
        <p >
            <label for="confirm">Confirmer nouveau mot de passe:</label>
            <input type="confirm" name="confirmation" placeholder="New password"  size="25"/>
        </p>
        <br>
        <br>
         <p>
            <input class="form-button" type="submit" value="Confirmer"  style="width: 100px" />
        </p>
        
        
	</form>
	

	
</div>
    
    
    
</div>
<!-- Sidebar toggle -->
<script>
    $(function () {
        $("#bars-button ").click(function () {
            $("#sidebar").toggle(/*'slide', {
                direction: 'left'
            }*/);
        });
    });
</script>
</body>
</html>
