<?php

namespace Rapport\History\Exception;

use Rapport\Exception\Exception;

class StorageFailed extends Exception {
	protected $message = 'Failed to store history contents.';
}