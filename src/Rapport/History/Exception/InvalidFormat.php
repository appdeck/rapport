<?php

namespace Rapport\History\Exception;

use Rapport\Exception\Exception;

class InvalidFormat extends Exception {
	protected $message = 'Invalid history format.';
}