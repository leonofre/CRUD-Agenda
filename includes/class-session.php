<?php
/**
 * Session
 *
 * @package CRUD-Agenda
 */

/**
 * Classe responsável pelos dados da Sessão
 */
final class Session {

	/**
	 * Função para iniciar a sessão do usuário.
	 *
	 * @param string $name  Nome do Usuário.
	 * @param string $email Email do Usuário.
	 * @param db     $db    Objeto da classe DB.
	 */
	public static function login( $name, $email, $db ) {
		try {
			$element = $db->get_element_by_column( $name, 'name', 'user' );
		} catch ( PDOException $e ) {
			return $e->getMessage();
		}
		if ( $element && $email === $element->get_email() ) {
			if ( ! isset( $_SESSION ) ) {
				session_start();
			}
			$_SESSION['id']          = $element->get_id();
			$_SESSION['name']        = $element->get_name();
			$_SESSION['email']       = $element->get_email();
			$_SESSION['phone']       = $element->get_phone();
			$_SESSION['description'] = $element->get_description();

			header( 'Location: index.php' );
			die();
		} else {
			return false;
		}
	}

	/**
	 * Função para finalizar a sessão do Usuário.
	 */
	public static function logout() {
		session_destroy();
		header( 'Location: /CRUD-Agenda/index.php' );
		die();
	}
}
