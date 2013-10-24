<?php

namespace Rapport\Keeper;

use Rapport\Database\Database;
use Rapport\History\History;
use Rapport\Evolution\Evolution;
use Rapport\Keeper\Exception;

class Keeper {
	private $database;
	private $history;
	private $verbose;

	private function verbose($text) {
		if ($this->verbose)
			echo $text;
	}

	public function __construct(Database $database, History $history, $verbose = false) {
		$this->database = $database;
		$this->history = $history;
		$this->verbose = $verbose;
	}

	public function begin() {
		$this->database->beginTransaction();
		$this->verbose("begin\n");
	}

	public function end() {
		$this->database->commit();
		$this->verbose("end\n");
	}

	public function apply(Evolution $evolution) {
		$stats = array(
			'skip' => 0,
			'done' => 0
		);
		foreach ($evolution as $name => $content) {
			$hash = sha1($content);
			$this->verbose("{$name}: ");
			if ($this->history->check($name, $hash)) {
				if ($stats['done'] > 0) {
					$this->verbose("failed\n");
					$this->abort();
					throw new Exception\BrokenHistory;
				}
				$stats['skip']++;
				$this->verbose("skip\n");
			} else {
				try {
					$this->database->execute($content);
					$this->history->apply($name, $hash);
					$stats['done']++;
					$this->verbose("done\n");
				} catch (\Exception $exception) {
					$this->verbose("failed\n");
					$this->abort();
					throw new Exception\ApplyFailed(sprintf('Apply failed: %s', $exception->getMessage()));
				}
			}
		}
		return $stats;
	}

	public function abort() {
		$this->verbose("abort\n");
		$this->history->abort();
		return $this->database->rollBack();
	}

}