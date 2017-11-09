<?php
/**
 * Layout da index.
 *
 * @package CRUD-Agenda
 */

/**
 * Require do arquivo header.php.
 */
require_once 'header.php';

if ( ! isset( $_SESSION['id'] ) ) :
?>	
	<div class="jumbotron">
		<h1 class="display-3">Agenda de Eventos</h1>
		<p class="lead">Esta é uma aplicação desenvolvida com o objetivo de demonstrar conhecimentos relacionados ao Desenvolvimento Back-end com PHP e um CRUD no banco de dados.</p>
	</div>
<?php else : ?>
	<div id="table-container">
		<?php require_once 'user-page.php'; ?>
	</div>
<?php
endif;
require_once 'footer.php';
