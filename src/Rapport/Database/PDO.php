<?php

namespace Rapport\Database;

use Rapport\Database\Exception;

class PDO implements Database {
	private $pdo;

	public function __construct($dsn, $user, $pass) {
		try {
			$options = array(
				\PDO::ATTR_EMULATE_PREPARES => false,
				\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
			);
			$this->pdo = new \PDO($dsn, $user, $pass, $options);
		} catch (\Exception $e) {
			throw new Exception\ConnectionFailed($e->getMessage());
		}
	}

	public function execute($query) {
		return $this->pdo->exec($query);
	}

	public function beginTransaction() {
		return $this->pdo->beginTransaction();
	}

	public function rollBack() {
		return $this->pdo->rollBack();
	}

	public function commit() {
		return $this->pdo->commit();
	}

}