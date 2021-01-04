<?php

class Label 
{
	private $for;
	private $text;
	private $cssClass;
	private $id;
	private $afterElement = true;

	public function __construct(array $attributes = []) {
		foreach ( $attributes as $key => $value ) {
			if ( property_exists( $this, Helper::getAttributeWithCamelCase( $key ) ) ) {
				$key = Helper::getAttributeWithCamelCase( $key );
				$this->$key = $value;
			}
		}
	}

	public function getId() {
		return $this->id;
	}

	public function setId( $id ) {
		$this->id = $id;
	}

	public function getCssClass() {
		return $this->cssClass;
	}

	public function setCssClass( $cssClass ) {
		$this->cssClass = $cssClass;
	}

	public function setFor( $for ) {
		$this->for = $for;
	}

	public function getText() {
		return $this->text;
	}

	public function setText( $text ) {
		$this->text = $text;
	}

	public function isAfterElement() {
		return $this->afterElement;
	}

	public function setAfterElement( $afterElement = true ) {
		$this->afterElement = $afterElement;
	}

	public function render() {
		echo "<label " . $this->getHtmlAttributes() . ">";
	}

	private function getHtmlAttributes() {
		$attributes = get_object_vars($this);
		$htmlAttributes = "";
		foreach ( $attributes as $key => $value ) {
			if ( $value !== NULL
				&& !in_array( $key, Helper::getAttributesNotInHtml() )
				&& !in_array( $key, Helper::getBehavoirsList() ) ) {
				$htmlAttributes .= Helper::getHtmlAttributeName( $key ) . "='" . $value . "'";
			}
		}
		return $htmlAttributes;
	}

}