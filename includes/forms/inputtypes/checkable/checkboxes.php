<?php

class Checkboxes extends KInput
{
	private $checkboxes = [];
  
  public function addCheckbox( checkbox $checkbox ) {
    $this->checkboxes[] = $checkbox;
  }

  public function setStyle( $style ) {
    for ( $i = 0; $i < sizeof( $this->checkboxes ); $i++ ) {
      $this->checkboxes[$i]->setStyle( $style );
    }
  }

  public function setName( $name ) {
    for ( $i = 0; $i < sizeof( $this->checkboxes ); $i++ ) {
      $this->checkboxes[$i]->setName( $name );
    }
  }
  public function renderDiv() {
    for ( $i = 0; $i < sizeof( $this->checkboxes ); $i++ ) {
      $this->checkboxes[$i]->renderDiv();
    }
  }

}