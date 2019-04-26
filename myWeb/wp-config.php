<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file viene utilizzato, durante l’installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via
 * web, è anche possibile copiare questo file in «wp-config.php» e
 * riempire i valori corretti.
 *
 * Questo file definisce le seguenti configurazioni:
 *
 * * Impostazioni MySQL
 * * Prefisso Tabella
 * * Chiavi Segrete
 * * ABSPATH
 *
 * È possibile trovare ultetriori informazioni visitando la pagina del Codex:
 *
 * @link https://codex.wordpress.org/it:Modificare_wp-config.php
 *
 * È possibile ottenere le impostazioni per MySQL dal proprio fornitore di hosting.
 *
 * @package WordPress
 */

// ** Impostazioni MySQL - È possibile ottenere queste informazioni dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define( 'DB_NAME', 'mywebwp' );

/** Nome utente del database MySQL */
define( 'DB_USER', 'mywebAdmin' );

/** Password del database MySQL */
define( 'DB_PASSWORD', 'CiaoCiao1.' );

/** Hostname MySQL  */
define( 'DB_HOST', 'localhost' );

/** Charset del Database da utilizzare nella creazione delle tabelle. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Il tipo di Collazione del Database. Da non modificare se non si ha idea di cosa sia. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * È possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 * È possibile cambiare queste chiavi in qualsiasi momento, per invalidare tuttii cookie esistenti. Ciò forzerà tutti gli utenti ad effettuare nuovamente il login.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'JfbIV@4D]P=o3GM@pKFD;o^MmMd$ZFWO?!u#/P&/@M8jMHm8dE7 JBge$ZLa{/1=' );
define( 'SECURE_AUTH_KEY',  'nNf$6B;q@Wl%x[aj$7e]Bla3-9=PzI,8h}jOBGl<}Kw[LPmPIjp3[^1Q@rQgO{:#' );
define( 'LOGGED_IN_KEY',    'mg(IS[&5$y3}9qUPaaK:O2@h))@~FsCH. C7|~}7/84m;zs^5FK!s^dQN+P!r1Vd' );
define( 'NONCE_KEY',        '~ EkaZt~soMGzx)-$nFJ@ax583w9gU93&PmGRSl4BFLh7(pAPO(BcR-Ph:j<f^b!' );
define( 'AUTH_SALT',        'IfL.!kfOTd007_z$oPn),!OmBpq}wjHXdd!rx&9Q!g#bLJEe*Y=%!8b#~F40M8y1' );
define( 'SECURE_AUTH_SALT', 'kd9DjKh%VNo86a^x[z%#&or$)Dbi}dZkC]f`FLX%]0](VsK90X]`r>-U[De>F&ja' );
define( 'LOGGED_IN_SALT',   'j<Q,yc.2 )K[E26mH29FrNW]d1n]!l=lsJLPwO~^U|6*u7i@Y{mI&=bk9Pz8nSqH' );
define( 'NONCE_SALT',       'U>3cm;FId5Q{l_WDV#4k(9L+i&Z/1>55tz=n&5#%aaQ+Wc^z4a@dc+*`M>!)JY1[' );

/**#@-*/

/**
 * Prefisso Tabella del Database WordPress.
 *
 * È possibile avere installazioni multiple su di un unico database
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix = 'myweb_';

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi
 * durante lo sviluppo.
 * È fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all’interno dei loro ambienti di sviluppo.
 */
define('WP_DEBUG', false);

/* Finito, interrompere le modifiche! Buon creazione di contenuti. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta le variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');