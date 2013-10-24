<?php

namespace Rapport\History;

use Rapport\History\Exception;

class File implements History {
	private $file;
	private $history;
	private $abort = false;

	public function __construct($file) {
		if (is_file($file)) {
			$contents = file_get_contents($file);
			if ($contents === false)
				throw new Exception\LoadFailed;
			$this->history = json_decode($contents, true);
			if (is_null($this->history))
				throw new Exception\InvalidFormat;
		} else
			$this->history = array();
		$this->file = $file;
	}

	public function __destruct() {
		if ($this->abort)
			return;
		if (!file_put_contents($this->file, json_encode($this->history)))
			throw new Exception\StorageFailed;
	}

	public function check($id, $hash) {
		if (empty($this->history[$id]))
			return false;
		if ($this->history[$id] === $hash)
			return true;
		throw new Exception\UpdateChanged;
	}

	public function apply($id, $hash) {
		$this->history[$id] = $hash;
	}

	public function abort() {
		$this->abort = true;
	}

}