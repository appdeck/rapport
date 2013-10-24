<?php

namespace Rapport\History;

interface History {

	public function check($id, $hash);

	public function apply($id, $hash);

	public function abort();
}