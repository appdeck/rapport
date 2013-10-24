<?php

namespace Rapport\Evolution;

use Rapport\Evolution\Exception;

class Directory implements Evolution {
	private $list = array();

	public function __construct($path) {
		if (!is_dir($path))
			throw new Exception\InvalidSource;
		$directory = new \RegexIterator(new \DirectoryIterator($path), '/^update-[0-9]{8}\.sql$/');
		foreach ($directory as $item)
			if (($item->isFile()) && ($item->isReadable()))
				$this->list[$item->getFilename()] = $item->getPathname();
		ksort($this->list);
	}

	public function current() {
		return file_get_contents(current($this->list));
	}

	public function key() {
		return key($this->list);
	}

	public function next() {
		next($this->list);
	}

	public function rewind() {
		reset($this->list);
	}

	public function valid() {
		return !is_null(key($this->list));
	}

}