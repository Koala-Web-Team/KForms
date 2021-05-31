<?php
	require_once ("config.php");

	class Form
	{
		private $inputs = [];
		private $attributes;

		public function __construct( array $attributes = [] ) {
			$this->attributes['cssClass'] = "";
			foreach ( $attributes as $key => $value ) {
				$this->attributes[$key] = $value;
			}
			$this->addCssClass( "koala-form" );
		}

		public function setAction( $action ) {
			$this->attributes['action'] = $action;
		}

		public function getAction() {
			return $this->attributes['action'];
		}

		public function addCssClass( $class ) {
			$this->attributes['cssClass'] .= " " . $class;
		}

		public function getCssClass() {
			return trim( $this->attributes['cssClass'] );
		}

		public function setId( $id ) {
			$this->attributes['id'] = $id;
		}

		public function getId() {
			return $this->attributes['id'];
		}

		public function setLegend( $legend ) {
			$this->attributes['legend'] = $legend;
		}

		public function getLegend() {
			return $this->attributes['legend'];
		}

		public function setMethod( $method ) {
			$this->attributes['method'] = $method;
		}

		public function getMethod() {
			return $this->attributes['method'];
		}

		public function setName( $name ) {
			$this->attributes['name'] = $name;
		}

		public function getName() {
			return $this->attributes['name'];
		}

		public function setAcceptCharset( $acceptCharset ) {
			$this->attributes['acceptCharset'] = $acceptCharset;
		}

		public function getAcceptCharset() {
			return $this->attributes['acceptCharset'];
		}

		public function setAutocomlete( $autocomplete = true ) {
			$this->attributes['autocomplete'] = $autocomplete;
		}

		public function isAutocomlete() {
			return $this->attributes['autocomplete'];
		}

		public function setEncrypt( $encrypt ) {
			$this->attributes['encrypt'] = $encrypt;
		}

		public function getEncrypt() {
			return $this->attributes['encrypt'];
		}

		public function setNoValidate( $noValidate ) {
			$this->attributes['noValidate'] = $noValidate;
		}

		public function getNovalidate() {
			return $this->attributes['noValidate'];
		}

		public function addInput( KInput $input ) {
			$this->inputs[] = $input;
		}

		public function addInputs( array $inputs ) {
			foreach ( $inputs as $input ) {
				$this->addInput( $input );
			}
		}

		public function setOn( $event, $function, ...$param ) {
			$function .= "(";
			foreach ( $param as $p ) {
				$function .= '"' . $p . '", ';
			}
			$function = trim( $function, ', ' );
			$function .= ")";
			$event = mb_strtolower( "on$event" );
			$this->attributes[$event] = $function;
		}

		public function setOnReset( $function, ...$param ) {
			$this->setOn( 'rest', $function, ...$param );
		}

		public function getOnReset() {
			return $this->attributes['onReset'];
		}

		public function toHtml() {
			return $this->__toString();
		}

		public function __toString() {
			$this->attributes['class'] = $this->attributes['cssClass'];
			unset($this->attributes['cssClass']);
			$form = new Html("form", $this->attributes);
			$formBody = "";

			foreach ( $this->inputs as $input ) {
				$formBody .= $input->toHtml();
			}

			return $form->toHtml($formBody);
		}

		public function renderForm() {
			echo $this->toHtml();
		}
	}