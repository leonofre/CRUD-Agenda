<?php
/**
 * Função de tratamento do AJAX de cadastro de Evento
 *
 * @package CRUD-Agenda
 */

include_once '../../includes.php';
if ( ! isset( $_SESSION ) ) session_start();

if ( $_SESSION['id'] && $_POST['event_title'] ) {
	$event  = new Event( $_SESSION['id'], $_POST['event_title'], $_POST['event_description'], $_POST['event_date'] );
	$result = $connect->set_element( $event, 'event' );

	if ( 'Success' === $result ) {
		$args = array(
			'success' => true,
			'status'  => 200,
			'message' => $result,
		);
	} else {
		$args = array(
			'success' => false,
			'status'  => 200,
			'message' => $result,
		);
	}
} else {
	$args = array(
		'status' => 500,
	);
}

echo json_encode( $args );
