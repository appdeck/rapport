<?php

namespace Rapport\History\Exception;

use Rapport\Exception\Exception;

class LoadFailed extends Exception {
	protected $message = '"Failed to load history.';
}