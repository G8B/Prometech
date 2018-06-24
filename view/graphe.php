<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>


<div id="container" style="width: 1000px; height: 500px; margin-left: 200px; "></div>
<?php


$donnees = getDonnees($numero);


?>

<script>
    var data = []; </script>

<?php foreach ($donnees as $donnee) {
    ?>
    <script> data.push(<?php echo $donnee["valeur"] ?>); </script>
<?php } ?>

<script>
    var data2 = []; </script>

<?php foreach ($donnees as $donnee) {
    ?>
    <script> data2.push('<?php echo $donnee["date"] ?>'); </script>
<?php } ?>


<script>


    Highcharts.chart('container', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Valeurs relevées par le capteur'
        },

        xAxis: {
            categories: data2
        },
        yAxis: {
            title: {
                text: 'Valeurs'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: true
            }
        },
        series: [{
            data: data,
            name: 'Capteur'


        },
        ]
    });

</script>


<a href="index.php?target=user&page=dashboard-conso"><input type="button" style="width: 110%" class="form-button"
                                                            name="Choix " value="Choisir un autre capteur"/></a>








