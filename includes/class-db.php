<?php
/**
 * DB
 *
 * @package CRUD-Agenda
 */

include_once 'class-user.php';
include_once 'class-event.php';
/**
 * Classe responsável pelos dados do usuário
 */
final class DB {
	/**
	 * String de conexão com o banco
	 * .
	 *
	 * @var pdo
	 */
	private $connect;

	/**
	 * Método construtor da classe DB.
	 *
	 * @param string $host   Nome do host.
	 * @param string $dbname Nome do Banco de Dados.
	 * @param string $dbuser Nome do usuário do Banco de Dados.
	 * @param string $dbpass Senha do usuário do Banco de Dados.
	 */
	public function __construct( $host, $dbname, $dbuser, $dbpass ) {
		try {
			$this->connect = new PDO( 'mysql:host=' . $host, $dbuser, $dbpass );
			$this->connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$this->connect->exec( 'CREATE DATABASE IF NOT EXISTS ' . $dbname );
			$this->connect->exec( 'USE ' . $dbname );
			$this->connect->exec( 'CREATE TABLE IF NOT EXISTS user ( id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(150) NOT NULL, email VARCHAR(150) NOT NULL, phone VARCHAR(12) NOT NULL, description TEXT NOT NULL );' );
			$this->connect->exec( 'CREATE TABLE IF NOT EXISTS event (id INT AUTO_INCREMENT PRIMARY KEY, user_id INT NOT NULL, description TEXT NOT NULL, title VARCHAR(150) NOT NULL, date TIMESTAMP NOT NULL, FOREIGN KEY (user_id) REFERENCES user(id));' );
		} catch ( PDOException $e ) {
			echo $e->getMessage();
		}
	}

	/**
	 * Função para retornar $connect.
	 *
	 * @return pdo $connect Objeto da classe PDO.
	 */
	public function get_connect() {
		return $this->connect;
	}

	/**
	 * Função para retornar um elemento qualquer de uma tabela.
	 *
	 * @param  int    $value  Valor da coluna.
	 * @param  string $column Nome da coluna.
	 * @param  string $table  Nome da tabela.
	 * @return array
	 */
	public function get_element_by_column( $value, $column, $table ) {
		$query = $this->connect->prepare( "SELECT * FROM $table WHERE $column = '$value'" );
		if ( $query->execute() ) {
			if ( $query->rowCount() > 0 ) {
				switch ( $table ) {
					case 'user':
						while ( $row = $query->fetch( PDO::FETCH_OBJ ) ) {
							$elements = new User( $row->name, $row->email, $row->phone, $row->description, $row->id );
						}
						break;
					case 'event':
						while ( $row = $query->fetch( PDO::FETCH_OBJ ) ) {
							$elements[ $row->id ] = new Event( $row->user_id, $row->description, $row->title, $row->date, $row->id );
						}
						break;

					default:
						return false;
						break;
				}
			}
		}
		return $elements;
	}

	/**
	 * Função para adicionar um elemento em uma tabela do Banco de Dados.
	 *
	 * @param mixed  $element Objeto do elemento para adicionar na tabela.
	 * @param string $table  Nome da tabela.
	 */
	public function set_element( $element, $table ) {
		try {
			switch ( $table ) {
				case 'user':
					$name        = $element->get_name();
					$email       = $element->get_email();
					$phone       = $element->get_phone();
					$description = $element->get_description();
					$insert      = $this->connect->prepare( "INSERT INTO $table(name, email, phone, description) VALUES('$name', '$email', '$phone', '$description')" );
					$insert->execute();
					return 'Success';
					break;
				case 'event':
					$user_id     = $element->get_user_id();
					$title       = $element->get_title();
					$description = $element->get_description();
					$d           = substr( $element->get_date(), 0, 2 );
					$m           = substr( $element->get_date(), 3, 2 );
					$y           = substr( $element->get_date(), 6 );
					$date        = date( 'Y-m-d G:i:s', mktime( 0, 0, 0, $m, $d, $y ) );
					$insert      = $this->connect->prepare( "INSERT INTO $table(user_id, title, description, date) VALUES('$user_id', '$title', '$description', '$date')" );
					$insert->execute();
					return 'Success';
					break;

				default:
					return false;
					break;
			}
		} catch ( PDOException $e ) {
			return $e->getMessage();
		}
	}

	/**
	 * Função para atualizar um elemento qualquer de uma tabela.
	 *
	 * @param  obj    $element Objeto do elemento para adicionar na tabela.
	 * @param  string $table   Nome da tabela.
	 * @return array
	 */
	public function update_element( $element, $table ) {
		try {
			switch ( $table ) {
				case 'user':
					$id          = $element->get_id();
					$name        = $element->get_name();
					$email       = $element->get_email();
					$phone       = $element->get_phone();
					$description = $element->get_description();
					$update      = $this->connect->prepare( "UPDATE $table SET name = '$name', email = '$email', phone = '$phone', description = '$description' WHERE id = $id" );
					$update->execute();
					return 'Success';
					break;
				case 'event':
					$id          = $element->get_id();
					$user_id     = $element->get_user_id();
					$title       = $element->get_title();
					$description = $element->get_description();
					$d           = substr( $element->get_date(), 0, 2 );
					$m           = substr( $element->get_date(), 3, 2 );
					$y           = substr( $element->get_date(), 6 );
					$date        = date( 'Y-m-d G:i:s', mktime( 0, 0, 0, $m, $d, $y ) );
					$update      = $this->connect->prepare( "UPDATE $table SET title = '$title', description = '$description', date = '$date' WHERE id = $id" );
					$update->execute();
					return 'Success';
					break;

				default:
					return false;
					break;
			}
		} catch ( PDOException $e ) {
			return $e->getMessage();
		}
	}

	/**
	 * Função para deletar um elemento qualquer de uma tabela.
	 *
	 * @param  int    $id    Id do elemento para deletar da tabela.
	 * @param  string $table Nome da tabela.
	 * @return array
	 */
	public function delete_element( $id, $table ) {
		try {
			$delete = $this->connect->prepare( "DELETE FROM $table WHERE id = $id" );
			$delete->execute();
			if ( 'user' === $table ) {
				$delete = $this->connect->prepare( "DELETE FROM event WHERE user_id = $id" );
				Session::logout();
			}
			return 'Success';
		} catch ( PDOException $e ) {
			return $e->getMessage();
		}
	}
}
