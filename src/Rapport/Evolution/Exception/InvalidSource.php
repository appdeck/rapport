<?php

namespace Rapport\Evolution\Exception;

use Rapport\Exception\Exception;

class InvalidSource extends Exception {
	protected $message = 'Invalid evolution source supplied.';
}