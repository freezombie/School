<?php
/*
 * Tarkoitus: Tekee thumbnailin määriteltyyn kansioon. 
 *            Kuva tallennetaan jpg-formaattiin.
 * Syötteitä: $tiedosto = Kuvatiedoston polku/nimi, josta tehdään thumbnaili.
 *            $mihin = Kohdehakemisto, johon thumbnaili tallennetaan.
 *            $max_koko = Kuvan enimmäiskoko.
 *            $uusinimi = Kuvan uusi tallennusnimi tai tyhjä merkkijono, jolloin kuvan nimeksi tulee alkuperäinen nimi, jonka alkuun liitettn t_ (=thumbnail).
 *            $tarkkuus = Kuvan tarkkuus.
 *            $resample = Käsitellään kuva "uudestaan" vain tehdäänkö pelkästään koon muutos.
 * Palauttaa: -
 * Esimerkki:  make_thumb("kuva.jpg","thumbs/",100);
 */
function make_thumb($tiedosto, $mihin, $max_koko,$uusinimi="", $tarkkuus = 84, $resample = 0){
    //Luetaan kuvan tiedot. Palautusarvo on yksiulotteinen taulukko, joka
    //sisältää erilaisia ominaisuuksia kuvasta.
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

    //Luetaan alkuperäisen kuvan leveys ja korkeus.
    $kuva_lev = $kuvantiedot[0];
    $kuva_kor = $kuvantiedot[1];

    //Lasketaan parametrina asetetun enimmäiskoon mukaan thumbnailin koko.
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

    //Jos kuvan uutta nimeä ei ole annettu parametrina, luetaan talletettavan tiedoston nimi parametrina
    //saadusta alkuperäisestä tiedoston nimestä.
    if (strlen($uusinimi)==0)
    {
        $uusinimi = basename(substr($tiedosto, 0, strrpos($tiedosto, "."))). ".jpg";
    }

    //Jos kuvan alkuperäinen koko ei ole suurempi, kun asetettu enimmäiskoko, tallennetaan kuva
    //haluttuun kansioon uudelle nimellä ja parametrina annetulla tarkkuudella.
    if($max_koko >= $max){
        imagejpeg($kuva, "$mihin/$uusinimi", $tarkkuus);
    }
    //Muutetaan (pienennetään) kuvan kokoa.
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
