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
	<div class="secondary-user-board">
        <div class="accordion-tab">
            <input id="accordion-tab-one" type="radio" name="accordion" checked>
            <label for="accordion-tab-one">Enfant 1</label>
            <div class="accordion-tab-content">
                <div class="authorized-content">
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
                     	
    				</table><br>
                   
                </div>
            </div>
        </div>
        <div class="accordion-tab">
            <input id="accordion-tab-two" type="radio" name="accordion">
            <label for="accordion-tab-two">Enfant 2</label>
            <div class="accordion-tab-content">
                <div class="authorized-content">
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
                     	
    				</table><br>
                </div>
            </div>
        </div>
        <div class="accordion-tab">
            <input id="accordion-tab-three" type="radio" name="accordion">
            <label for="accordion-tab-three">Invite</label>
            <div class="accordion-tab-content">
                <div class="authorized-content">
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
                     	
    				</table><br>
                </div>
            </div>
        </div>
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
 