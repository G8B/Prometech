
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
  
 <link rel="stylesheet" type="text/css" href="/public/css/secondaryUser.css"> 
 
 
 <div class="main-wrapper">
	<button class="accordion">Enfant 1</button>
	<div class="panel">
		<table>
                        <br>
                        <tbody>
                            <tr>
                            <th>Pieces</th>
                            <th>Capteurs autorises</th>
                            
                            </tr>
                    
                            <tr>
                                <td>Chambre 2</td>
                                <td>Temperature <br>Lumiere<br> Actionneurs volets <br> content 4 <br>
                                content 5 <br> content 6
                                </td>
                            
                            </tr>

                            <tr>
                                <td>Salon</td>
                                <td>Lumiere <br> Actionneurs verrous <br> Temperature <br> content 4 <br>
                                content 5 <br> content 6
                                </td>
                            
                            </tr>
                            <tr>
                                <td>Cuisine</td>
                                <td>Detecteur de fumee <br> Lumiere  <br> content 4 <br>
                                content 5 <br> content 6
                                </td>
                            
                            </tr>
                        </tbody>
                        
                    </table>
                    <div class = "autorisations">
                    <div class="blocBoutton1">
                        <input class='modifAutorisation' type="submit" value="Modifier autorisations"/>
                    </div>
                    
                    <div class="blocBoutton2">
                        <input class='suprUtilisateur' type="submit" value="Supprimer utilisateur "/>
                    </div>
	</div>
	
</div>
 <button class="accordion">Enfant 2</button>
	<div class="panel">
		<table>
                        <br>
                        <tbody>
                            <tr>
                            <th>Pieces</th>
                            <th>Capteurs autorises</th>
                            
                            </tr>
                    
                            <tr>
                                <td>Chambre 2</td>
                                <td>Temperature <br>Lumiere<br> Actionneurs volets <br> content 4 <br>
                                content 5 <br> content 6
                                </td>
                            
                            </tr>

                            <tr>
                                <td>Salon</td>
                                <td>Lumiere <br> Actionneurs verrous <br> Temperature <br> content 4 <br>
                                content 5 <br> content 6
                                </td>
                            
                            </tr>
                            <tr>
                                <td>Cuisine</td>
                                <td>Detecteur de fumee <br> Lumiere  <br> content 4 <br>
                                content 5 <br> content 6
                                </td>
                            
                            </tr>
                        </tbody>
                        
                    </table>
                    <div class = "autorisations">
                    <div class="blocBoutton1" >
                        <input class='modifAutorisation' type="submit" value="Modifier autorisations"/>
                    </div>
                    
                    <div class="blocBoutton2">
                        <input class='suprUtilisateur' type="submit" value="Supprimer utilisateur "/>
                    </div>
	</div>
	
</div>

<button class="accordion">Invite 1</button>
	<div class="panel">
		<table>
                        <br>
                        <tbody>
                            <tr>
                            <th>Pieces</th>
                            <th>Capteurs autorises</th>
                            
                            </tr>
                    
                            <tr>
                                <td>Chambre 2</td>
                                <td>Temperature <br>Lumiere<br> Actionneurs volets <br> content 4 <br>
                                content 5 <br> content 6
                                </td>
                            
                            </tr>

                            <tr>
                                <td>Salon</td>
                                <td>Lumiere <br> Actionneurs verrous <br> Temperature <br> content 4 <br>
                                content 5 <br> content 6
                                </td>
                            
                            </tr>
                            <tr>
                                <td>Cuisine</td>
                                <td>Detecteur de fumee <br> Lumiere  <br> content 4 <br>
                                content 5 <br> content 6
                                </td>
                            
                            </tr>
                        </tbody>
                        
                    </table>
                    <div class = "autorisations">
                    <div class="blocBoutton1">
                        <input class='modifAutorisation' type="submit" value="Modifier autorisations"/>
                    </div>
                    
                    <div class="blocBoutton2">
                        <input class='suprUtilisateur' type="submit" value="Supprimer utilisateur "/>
                    </div>
	</div>
	
</div>

<div class="ajoutUser">
	<form action="ajoutSecondUser.php" method="post">
		<p id="ajout"><input class='ajoutUtilisateur' type="submit" value="Ajouter utilisateur "/></p></form>
	
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

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
</script>

</div>

</body>
</html>
 