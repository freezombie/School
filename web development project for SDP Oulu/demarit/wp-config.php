<?php
/** 
 * WordPressin perusasetukset.
 *
 * Tämä tiedosto sisältää seuraavat asetukset: MySQL-asetukset, Tietokantataulun etuliite,
 * henkilökohtaiset salausavaimet (Secret Keys), WordPressin kieli, ja ABSPATH. Löydät lisätietoja
 * Codex-sivulta {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php}. Saat MySQL-asetukset palveluntarjoajaltasi.
 *
 * Automaattinen wp-config.php-tiedoston luontityökalu käyttää tätä tiedostoa
 * asennuksen yhteydessä. Sinun ei tarvitse käyttää web-asennusta, vaan voit 
 * tallentaa tämän tiedoston nimellä "wp-config.php" ja muokata allaolevia arvoja.
 *
 * @package WordPress
 */

// ** MySQL asetukset - Saat nämä tiedot palveluntarjoajaltasi ** //
/** WordPressin käyttämän tietokannan nimi */
define('DB_NAME', 'n3pian00_demarit');

/** MySQL-tietokannan käyttäjätunnus */
define('DB_USER', 'n3pian00_demarit');

/** MySQL-tietokannan salasana */
define('DB_PASSWORD', 'Ugyldlzz1');

/** MySQL-palvelin */
define('DB_HOST', 'localhost');

/** Tietokantatauluissa käytettävä merkistö. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Älä muuta tätä jos et ole varma. */
define('DB_COLLATE', 'utf8_swedish_ci');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Muuta nämä omiksi uniikeiksi lauseiksi!
 * Voit luoda nämä käyttämällä {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org palvelua}
 * Voit muuttaa nämä koska tahansa. Kaikki käyttäjät joutuvat silloin kirjautumaan uudestaan.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Y-R>bvJRTFf%YcR(v4HB(%{3/[hw-6{ [7jy|W--X[nhkUn@ 9xwAI|pAY_+PM_d');
define('SECURE_AUTH_KEY',  'N/=X-4JV:mg U0wp=0~);-gRj9y-;d0V0AUxe>SyX-y&$!eJbjow$PG].niZ Ca/');
define('LOGGED_IN_KEY',    'FO?p|4M;H5pkb-~ pe@a8`+5@5SfE9:6]ra6_uv.KL]-Di1sKn4}T?uvB(]yGwwk');
define('NONCE_KEY',        '(<`l5iK.H}s6!LV`GmmhBy`cFqA1<igVjj4BrbNy)3z?VE;UCd~seb,@)LIjPlF.');
define('AUTH_SALT',        'P(VGCQ8c$:u/QE`t}nBz`cv;C?#vNeYHALn_I{e t:dw3|r1 2^JM}zxLZ)a}A5=');
define('SECURE_AUTH_SALT', '~7;H(Dux]Vx-nJ,Kr}OKX##.Oeh-F(!q3)dMl1jW T,x7z+R&aK*=0eq9uCPB+SY');
define('LOGGED_IN_SALT',   '|(|h8tAMF>xS3?(i<ewg`8RT7SV$o/D2la0I)9gl|(o+Y#t@+kb>QkTRr|P#(]nJ');
define('NONCE_SALT',       'Tg.>0={;5f2q[ut~-X}O!0`PKN}?CSrGD-*ZCk//Ff}A`7+h@VbSKm=c/s!UtGES');
/**#@-*/

/**
 * WordPressin tietokantataulujen etuliite (Table Prefix).
 *
 * Samassa tietokannassa voi olla useampi WordPress-asennus, jos annat jokaiselle
 * eri tietokantataulujen etuliitteen. Sallittuja merkkejä ovat numerot, kirjaimet
 * ja alaviiva _.
 *
 */
$table_prefix  = 'wp_';

/**
 * Kehittäjille: WordPressin debug-moodi.
 *
 * Muuta tämän arvoksi true jos haluat nähdä kehityksen ajan debug-ilmoitukset
 * Tämä on erittäin suositeltavaa lisäosien ja teemojen kehittäjille.
 */
define('WP_DEBUG', false);

/* Siinä kaikki, älä jatka pidemmälle! */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
