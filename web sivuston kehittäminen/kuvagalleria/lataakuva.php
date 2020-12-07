<?php
include_once("apu.php")
?>
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
        <h3>Kuvagalleria</h3>
        <hr/>
        <p>
        <?php       
        if($_FILES['tiedosto']['error'] == UPLOAD_ERR_OK)
        {
            $tiedosto = $_FILES['tiedosto']['name'];
            
            if($_FILES['tiedosto']['size']>0)
            {
                $tyyppi=$_FILES['tiedosto']['type'];
                
                if(strcmp($tyyppi,"image/jpeg")==0 || strcmp($tyyppi,"image/pjpeg")==0)
                {
                    $tiedosto = basename($tiedosto);
                    $kansio = 'lataukset/';
                    make_thumb($_FILES['tiedosto']['tmp_name'],$kansio,300,$tiedosto);
                    make_thumb("$kansio$tiedosto",$kansio . "thumbs/",75);
                    print("<p>Kuva on tallennettu palvelimelle.</p>");
                }
                else
                {
                    print("<p>Voit ladata vain jpg-kuvia.</p>");
                }
            }
        }
        ?>
        </p>
        <a href="index.php">Selaa kuvia</a>
    </body>
</html>
