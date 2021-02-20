<?php

	class Submit extends KButton
	{
		protected $formAction;
		protected $formEnctype;
		protected $formTarget;
		protected $formMethod;
		protected $formNoValidate;

		public function __construct( array $attributes = [] ) {
			parent::__construct( $attributes );
			$this->setType('submit');
		}

		public function setFormAction( $formAction ) {
			$this->formAction = $formAction;
		}

		public function getFormAction() {
			return $this->formAction;
		}

		public function setFormEnctype( $formEnctype ) {
			$this->formEnctype = $formEnctype;
		}

		public function getFormEnctype() {
			return $this->formEnctype;
		}

		public function setFormTarget( $formTarget ) {
			$this->formTarget = $formTarget;
		}

		public function getFormTarget() {
			return $this->formTarget;
		}

		public function setFormMethod( $formMethod ) {
			$this->formMethod = $formMethod;
		}

		public function getFormMethod() {
			return $this->formMethod;
		}

		public function setFormNoValidate( $formNoValidate ) {
			$this->formNoValidate = $formNoValidate;
		}

		public function getFormNoValidate() {
			return $this->formNoValidate;
		}
	}