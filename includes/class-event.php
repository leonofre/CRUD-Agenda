<?php
/**
 * Event
 *
 * @package CRUD-Agenda
 */

/**
 * Classe responsável pelos dados do Evento
 */
class Event {
	/**
	 * Id do Evento.
	 *
	 * @var Int
	 */
	private $id;

	/**
	 * Id do Usuário.
	 *
	 * @var Int
	 */
	private $user_id;

	/**
	 * Descrição do Evento.
	 *
	 * @var String
	 */
	private $description;

	/**
	 * Título do Evento.
	 *
	 * @var String $title Título do Evento.
	 */
	private $title;

	/**
	 * Data do Evento.
	 *
	 * @var Date
	 */
	private $date;

	/**
	 * Método construtor da classe Event.
	 *
	 * @param int    $user_id     Id da Agenda.
	 * @param string $description Descrição do Evento.
	 * @param string $title       Título do Evento.
	 * @param date   $date        Data do Evento.
	 * @param int    $id          Id do Evento.
	 */
	public function __construct( $user_id, $description, $title, $date, $id = 0 ) {
		$this->id          = $id;
		$this->user_id     = $user_id;
		$this->description = $description;
		$this->title       = $title;
		$this->date        = $date;
	}

	/**
	 * Função para retornar o atributo $id da classe Event.
	 *
	 * @return  string $id Id do Evento.
	 */
	public function get_id() {
		return $this->id;
	}

	/**
	 * Função para retornar o atributo $user_id da classe Event.
	 *
	 * @return  string $user_id Id do Usuário.
	 */
	public function get_user_id() {
		return $this->user_id;
	}

	/**
	 * Função para retornar a descrição do evento.
	 *
	 * @return string $description Descrição do Evento.
	 */
	public function get_description() {
		return $this->description;
	}

	/**
	 * Função para retornar o título do evento.
	 *
	 * @return string $title Título do Evento.
	 */
	public function get_title() {
		return $this->title;
	}

	/**
	 * Função para retornar a data do evento.
	 *
	 * @return date $date Data do Evento.
	 */
	public function get_date() {
		return $this->date;
	}

	/**
	 * Função para definir a descrição do evento.
	 *
	 * @param string $description Descrição do Evento.
	 */
	public function set_description( $description ) {
		$this->description = $description;
	}

	/**
	 * Função para definir o título do evento.
	 *
	 * @param string $title Título do Evento.
	 */
	public function set_title( $title ) {
		$this->title = $title;
	}

	/**
	 * Função para definir a data do evento.
	 *
	 * @param date $date Data do Evento.
	 */
	public function set_date( $date ) {
		$this->date = $date;
	}
}
