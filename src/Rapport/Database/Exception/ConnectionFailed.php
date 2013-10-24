<?php

namespace Rapport\Database\Exception;

use Rapport\Exception\Exception;

class ConnectionFailed extends Exception {
	protected $message = 'Database connection failed.';
}