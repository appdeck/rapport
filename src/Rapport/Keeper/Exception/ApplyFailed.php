<?php

namespace Rapport\Keeper\Exception;

use Rapport\Exception\Exception;

class ApplyFailed extends Exception {
	protected $message = 'Failed to apply evolution.';
}