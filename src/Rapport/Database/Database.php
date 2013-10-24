<?php

namespace Rapport\Database;

interface Database {

	public function execute($query);

	public function beginTransaction();

	public function rollBack();

	public function commit();

}