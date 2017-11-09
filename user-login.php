<?php
/**
 * Função de tratamento do AJAX de cadastro de Usuário
 *
 * @package CRUD-Agenda
 */

include_once 'includes/class-user.php';
include_once 'includes/class-db.php';
include_once 'includes/class-session.php';

/**
 * Require do arquivo header.php.
 */
require_once 'header.php';

if ( ! isset( $_SESSION['id'] ) ) {
	$user = Session::login( $_POST['user_name'], $_POST['user_email'], $connect );
} else {
	$user = Session::logout();
}

require_once 'footer.php';
