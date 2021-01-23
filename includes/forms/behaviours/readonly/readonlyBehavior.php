<?php

class readonlyBehavior
{
	private $readonly;

	public function setReadonly( $readonly ) {
		$this->readonly = $readonly;
	}

	public function getReadonly() {
		return $this->readonly;
	}

}