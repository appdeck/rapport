<?php

namespace Rapport\History\Exception;

use Rapport\Exception\Exception;

class UpdateChanged extends Exception {
	protected $message = 'Evolution hash value changed.';
}