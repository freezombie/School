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
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h3>Kuvagalleria</h3>
        <a href="lataakuva.html">Lataa uusi kuva</a>
        <br/>
        <?php
        $hakemisto="lataukset/thumbs/";
        
        if($osoitin=opendir($hakemisto))
        {
            while(false !== ($tiedosto=readdir($osoitin)))
            {
                $paate= end(explode('.',$tiedosto));
                if(strcmp($paate,"jpg")==0)
                {
                    $polku=$hakemisto . "/$tiedosto";
                    echo "<div><a href='kuva.php?tiedosto=$tiedosto'><img src='$polku'/></a></div>";
                }
            }
            closedir($osoitin);
        }        
        ?>
    </body>
</html>
