<?php

	require_once ("config.php");

	class Form
	{
		private $id;
		private $cssClass = "";
		private $acceptCharset;
		private $legend;
		private $action;
		private $autocomlete;
		private $encrypt;
		private $noValidate;
		private $method = "POST";
		private $name;
		private $inputs = [];

		public function __construct( array $attributes = [] ) {
			foreach ( $attributes as $key => $value ) {
				if ( property_exists( $this, Helper::getAttributeWithCamelCase( $key ) ) ) {
					$key = Helper::getAttributeWithCamelCase( $key );
					$this->$key = $value;
				}
			}
		}

		public function setAction( $action ) {
			$this->action = $action;
		}

		public function getAction() {
			return $this->action;
		}

		public function addCssClass( $class ) {
			$this->cssClass .=  " " . $class;
		}

		public function getCssClass() {
			return trim( $this->cssClass );
		}

		public function setId( $id ) {
			$this->id = $id;
		}

		public function getId() {
			return $this->id;
		}

		public function setLegend( $legend ) {
			$this->legend = $legend;
		}

		public function getLegend() {
			return $this->legend;
		}

		public function setMethod( $method ) {
			$this->method = $method;
		}

		public function getMethod() {
			return $this->method;
		}

		public function setName( $name ) {
			$this->name = $name;
		}

		public function getName() {
			return $this->name;
		}

		public function setAcceptCharset( $acceptCharset ) {
			$this->acceptCharset = $acceptCharset;
		}

		public function getAcceptCharset() {
			return $this->acceptCharset;
		}

		public function setAutocomlete( $autocomlete ) {
			$this->autocomlete = $autocomlete;
		}

		public function getAutocomlete() {
			return $this->autocomlete;
		}

		public function setEncrypt( $encrypt ) {
			$this->encrypt = $encrypt;
		}

		public function getEncrypt() {
			return $this->encrypt;
		}

		public function setNoValidate( $noValidate ) {
			$this->noValidate = $noValidate;
		}

		public function getNovalidate() {
			return $this->noValidate;
		}

		public function addInput(KInput $input) {
			$this->inputs[] = $input;
		}

		public function addInputs( array $inputs ) {
			foreach ( $inputs as $input ) {
				$this->addInput( $input );
			}
		}

		public function renderForm() {
			$this->renderOpenTag();

			foreach ( $this->inputs as $input ) {
				$input->renderDiv();
			}

			$this->renderClosingTag();
		}

		private function renderOpenTag() {
			$openTag = "<form " . $this->getHtmlAttributes() . ">";

			echo $openTag;
		}

		private function getHtmlAttributes() {
			$attributes = get_object_vars($this);
			$htmlAttributes = "";
			foreach ( $attributes as $key => $value ) {
				if ( $value !== NULL
					&& !in_array( $key, Helper::getAttributesNotInHtml() )
					&& !in_array( $key, Helper::getBehavoirsList() ) ) {
					$htmlAttributes .= Helper::getHtmlAttributeName( $key ) . "='" . $value . "' ";
				}
			}
			return $htmlAttributes;
		}

		private function renderClosingTag() {
			echo "</form>";
		}
	}