<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Prometech</title>
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <?php
    if (isset($userInfos) or $title == "Ajouter un produit" or $title == "Ajouter une pièce" or $title == "Edition de produit")
        $style = '<link rel="stylesheet" type="text/css" href="/public/css/mon_compte.css">';
    elseif ($title == "Choisir un capteur") {
        $style = '<link rel="stylesheet" type="text/css" href="/public/css/consoStyle.css">';
    } else
        $style = '<link rel="stylesheet" type="text/css" href="/public/css/styles.css">';

    echo $style; ?>
    <link rel="stylesheet" type="text/css" href="/public/css/headerAndFooter.css">
    <link rel="stylesheet" type="text/css" href="/public/css/modal.css">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
<?php require_once("header.php"); ?>
<div id="content-window">
    <?php require_once("sidebar.php"); ?>

    <?php include($tab . '.php'); ?>
</div>
<!-- Sidebar toggle -->
<script>
    $(document).ready(function () {
        $("#bars-button ").click(function () {
            $("#sidebar").toggle(/*'slide', {
                direction: 'left'
            }*/);
        });
    });
</script>
<script src="/public/js/modal.js"></script>
<script src="/public/js/deletePost.js"></script>
</body>
</html>
