<?php

trait InputEvents
{
	public function setOnBlur( $function, ...$param ) {
		$this->setOn( 'blur', $function, ...$param );
	}

	public function getOnBlur() {
		return $this->attributes['onBlur'];
	}

	public function setOnClick( $function, ...$param ) {
		$this->setOn( 'click', $function, ...$param );
	}

	public function getOnClick() {
		return $this->attributes['onClick'];
	}

	public function setOnDblClick( $function, ...$param ) {
		$this->setOn( 'dblclick', $function, ...$param );
	}

	public function getOnDblClick() {
		return $this->attributes['onDblClick'];
	}

	public function setOnContextMenu( $function, ...$param ) {
		$this->setOn( 'contextmenu', $function, ...$param );
	}

	public function getOnContextMenu() {
		return $this->attributes['onContextMenu'];
	}

	public function setOnFocus( $function, ...$param ) {
		$this->setOn( 'focus', $function, ...$param );
	}

	public function getOnFocus() {
		return $this->attributes['onFocus'];
	}

	public function setOnInvalid( $function, ...$param ) {
		$this->setOn( 'invalid', $function, ...$param );
	}

	public function getOnInvalid() {
		return $this->attributes['onInvalid'];
	}

	public function setOnMouseDown( $function, ...$param ) {
		$this->setOn( 'mousedown', $function, ...$param );
	}

	public function getOnMouseDown() {
		return $this->attributes['onMouseDown'];
	}

	public function setOnMouseUp( $function, ...$param ) {
		$this->setOn( 'mouseup', $function, ...$param );
	}

	public function getOnMouseUp() {
		return $this->attributes['onMouseUp'];
	}

	public function setOnMouseMove( $function, ...$param ) {
		$this->setOn( 'mousemove', $function, ...$param );
	}

	public function getOnMouseMove() {
		return $this->attributes['onMouseMove'];
	}

	public function setOnMouseOut( $function, ...$param ) {
		$this->setOn( 'mouseout', $function, ...$param );
	}

	public function getOnMouseOut() {
		return $this->attributes['onMouseOut'];
	}

	public function setOnMouseOver( $function, ...$param ) {
		$this->setOn( 'mouseover', $function, ...$param );
	}

	public function getOnMouseOver() {
		return $this->attributes['onMouseOver'];
	}

	public function setOnWheel( $function, ...$param ) {
		$this->setOn( 'wheel', $function, ...$param );
	}

	public function getOnWheel() {
		return $this->attributes['onWheel'];
	}

	public function setOnCopy( $function, ...$param ) {
		$this->setOn( 'copy', $function, ...$param );
	}

	public function getOnCopy() {
		return $this->attributes['onCopy'];
	}

	public function setOnPaste( $function, ...$param ) {
		$this->setOn( 'paste', $function, ...$param );
	}

	public function getOnPaste() {
		return $this->attributes['onPaste'];
	}

	public function setOnCut( $function, ...$param ) {
		$this->setOn( 'cut', $function, ...$param );
	}

	public function getOnCut() {
		return $this->attributes['onCut'];
	}
}