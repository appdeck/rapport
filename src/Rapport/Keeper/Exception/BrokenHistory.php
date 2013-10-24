<?php

namespace Rapport\Keeper\Exception;

use Rapport\Exception\Exception;

class BrokenHistory extends Exception {
	protected $message = 'There is a previous not applied evolution on your history.';
}