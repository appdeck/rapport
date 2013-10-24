<?php

require __DIR__ . '/autoload.php';
require __DIR__ . '/settings.php';

use Rapport\Database\PDO;
use Rapport\History\File;
use Rapport\Evolution\Directory;
use Rapport\Keeper\Keeper;

try {
	echo "Rapport simple example\n";
	//basic requirements
	$pdo = new PDO($conf['db']['dsn'], $conf['db']['user'], $conf['db']['pass']);
	$file = new File($conf['history']);
	$directory = new Directory($conf['evolution']);
	//keeper object
	$keeper = new Keeper($pdo, $file);
	$keeper->begin();
	$stats = $keeper->apply($directory);
	$keeper->end();
	//display stats
	printf("Skipped: %d\nApplied: %d\nTotal: %d\n", $stats['skip'], $stats['done'], array_sum($stats));
} catch (Exception $exception) {
	//something went wrong
	printf("Exception: %s (%s:%d)\n", $exception->getMessage(), $exception->getFile(), $exception->getLine());
}