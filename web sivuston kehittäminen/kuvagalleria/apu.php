<?php
/*
 * Tarkoitus: Tekee thumbnailin m��riteltyyn kansioon. 
 *            Kuva tallennetaan jpg-formaattiin.
 * Sy�tteit�: $tiedosto = Kuvatiedoston polku/nimi, josta tehd��n thumbnaili.
 *            $mihin = Kohdehakemisto, johon thumbnaili tallennetaan.
 *            $max_koko = Kuvan enimm�iskoko.
 *            $uusinimi = Kuvan uusi tallennusnimi tai tyhj� merkkijono, jolloin kuvan nimeksi tulee alkuper�inen nimi, jonka alkuun liitettn t_ (=thumbnail).
 *            $tarkkuus = Kuvan tarkkuus.
 *            $resample = K�sitell��n kuva "uudestaan" vain tehd��nk� pelk�st��n koon muutos.
 * Palauttaa: -
 * Esimerkki:  make_thumb("kuva.jpg","thumbs/",100);
 */
function make_thumb($tiedosto, $mihin, $max_koko,$uusinimi="", $tarkkuus = 84, $resample = 0){
    //Luetaan kuvan tiedot. Palautusarvo on yksiulotteinen taulukko, joka
    //sis�lt�� erilaisia ominaisuuksia kuvasta.
    $kuvantiedot = getimagesize($tiedosto);

    //Luetaan kuvan tyyppi.
    $tyyppi = $kuvantiedot[2];

    //Tarkastetaan, onko kuvan tyyppi jpg.
    if($tyyppi == 2){ 
        $kuva = imagecreatefromjpeg($tiedosto);        
    }
    else{
        return -1;
    }

    //Luetaan alkuper�isen kuvan leveys ja korkeus.
    $kuva_lev = $kuvantiedot[0];
    $kuva_kor = $kuvantiedot[1];

    //Lasketaan parametrina asetetun enimm�iskoon mukaan thumbnailin koko.
    if($kuva_lev > $kuva_kor){
        $k = $kuva_kor/$kuva_lev;
        $uusi_lev = $max_koko;
        $uusi_kor = round($k*$max_koko);
        $max = $kuva_lev;
    }
    else{
        $k = $kuva_lev/$kuva_kor;
        $uusi_lev = round($k*$max_koko);
        $uusi_kor = $max_koko;
        $max = $kuva_kor;
    }

    //Jos kuvan uutta nime� ei ole annettu parametrina, luetaan talletettavan tiedoston nimi parametrina
    //saadusta alkuper�isest� tiedoston nimest�.
    if (strlen($uusinimi)==0)
    {
        $uusinimi = basename(substr($tiedosto, 0, strrpos($tiedosto, "."))). ".jpg";
    }

    //Jos kuvan alkuper�inen koko ei ole suurempi, kun asetettu enimm�iskoko, tallennetaan kuva
    //haluttuun kansioon uudelle nimell� ja parametrina annetulla tarkkuudella.
    if($max_koko >= $max){
        imagejpeg($kuva, "$mihin/$uusinimi", $tarkkuus);
    }
    //Muutetaan (pienennet��n) kuvan kokoa.
    else{
        $muokattu = imagecreatetruecolor($uusi_lev, $uusi_kor);
        if($resample){
            imagecopyresampled($muokattu, $kuva, 0, 0, 0, 0, $uusi_lev, $uusi_kor, $kuva_lev, $kuva_kor);
        }else{
            imagecopyresized($muokattu, $kuva, 0, 0, 0, 0, $uusi_lev, $uusi_kor, $kuva_lev, $kuva_kor);
        }
        imagejpeg($muokattu, "$mihin/$uusinimi", $tarkkuus);
        imagedestroy($muokattu);
    } 
    imagedestroy($kuva);
}

?>
