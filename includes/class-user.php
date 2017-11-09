<?php
/**
 * User
 *
 * @package CRUD-Agenda
 */

/**
 * Classe responsável pelos dados do usuário
 */
class User {
	/**
	 * Id do Usuário.
	 *
	 * @var Int
	 */
	private $id;

	/**
	 * Nome do Usuário.
	 *
	 * @var string
	 */
	private $name;

	/**
	 * Email do Usuário.
	 *
	 * @var string
	 */
	private $email;

	/**
	 * Telefone do Usuário.
	 *
	 * @var string
	 */
	private $phone;

	/**
	 * Descrição do Usuário.
	 *
	 * @var string
	 */
	private $description;

	/**
	 * Agenda do Usuário.
	 *
	 * @var Book
	 */
	private $book;

	/**
	 * Método construtor da classe User.
	 *
	 * @param string $name        Nome do Usuário.
	 * @param string $email       Email do Usuário.
	 * @param string $phone       Telefone do Usuário.
	 * @param string $description Descrição do Usuário.
	 * @param int    $id          Id do Usuário.
	 */
	public function __construct( $name, $email, $phone, $description, $id = 0 ) {
		$this->id          = $id;
		$this->name        = $name;
		$this->email       = $email;
		$this->phone       = $phone;
		$this->description = $description;
		$this->book        = array();
	}

	/**
	 * Função para definir o atributo $name da classe User
	 *
	 * @param string $name Nome do Usuário.
	 * @return  void
	 */
	public function set_name( $name ) {
		$this->name = $name;
	}

	/**
	 * Função para definir o atributo $email da classe User
	 *
	 * @param string $email Email do Usuário.
	 * @return  void
	 */
	public function set_email( $email ) {
		$this->email = $email;
	}

	/**
	 * Função para definir o atributo $phone da classe User
	 *
	 * @param string $phone Telefone do Usuário.
	 * @return  void
	 */
	public function set_phone( $phone ) {
		$this->phone = $phone;
	}

	/**
	 * Função para definir o atributo $description da classe User
	 *
	 * @param string $description Descrição do Usuário.
	 * @return  void
	 */
	public function set_description( $description ) {
		$this->description = $description;
	}

	/**
	 * Função para retornar o atributo $id da classe User.
	 *
	 * @return  string $id Id do Usuário.
	 */
	public function get_id() {
		return $this->id;
	}

	/**
	 * Função para retornar o atributo $name da classe User.
	 *
	 * @return  string $name Nome do Usuário.
	 */
	public function get_name() {
		return $this->name;
	}

	/**
	 * Função para retornar o atributo $email da classe User.
	 *
	 * @return  string $email Email do Usuário.
	 */
	public function get_email() {
		return $this->email;
	}

	/**
	 * Função para retornar o atributo $phone da classe User.
	 *
	 * @return  string $phone Telefone do Usuário.
	 */
	public function get_phone() {
		return $this->phone;
	}

	/**
	 * Função para retornar o atributo $description da classe User.
	 *
	 * @return  string $description Descrição do Usuário.
	 */
	public function get_description() {
		return $this->description;
	}
}
