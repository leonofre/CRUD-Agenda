<?php
/**
 * Arquivo com os includes necessários.
 */

include_once 'includes/class-user.php';
include_once 'includes/class-event.php';
include_once 'includes/class-db.php';
include_once 'includes/class-session.php';

$connect = new DB( 'localhost', 'agenda', 'Usuario Do Banco', 'Senha Do Banco' );
