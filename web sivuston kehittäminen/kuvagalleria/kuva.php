<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <center>
        <h3>Kuvagalleria</h3>
        <?php
        $tiedosto=$_GET['tiedosto'];
        $alkuphakemisto="lataukset/";
        print "<img src='$alkuphakemisto" . "$tiedosto'/>";
        ?>
        <br/><br/>
        <a href="index.php">Takaisin kuvien selaukseen</a>
    </center>
    </body>
</html>
