<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Prometech</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css" >
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
<?php include("header.php"); ?>

<?php include("sidebar.php"); ?>

<!-- Sidebar toggle -->
<script>
    $(function() {
        $( "#bars-button" ).click(function() {
            $( "#sidebar" ).toggle('slide', {
                direction: 'left'
            });
        });
    });
</script>
</body>
</html>
