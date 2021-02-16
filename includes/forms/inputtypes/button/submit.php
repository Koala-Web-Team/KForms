<?php
include_once("KButton.php");

	class submit extends KButton
	{
		protected $formaction;
		protected $formenctype;
		protected $formtarget;
		protected $formmethod;
		protected $formnovalidate;

		public function __construct( array $attributes = [] ) {
			parent::__construct( $attributes );
			$this->setType('submit');

		}

		/**
		 * @param mixed $formaction
		 */
		public function setFormaction( $formaction ) {
			$this->formaction = $formaction;
		}

		/**
		 * @return mixed
		 */
		public function getFormaction() {
			return $this->formaction;
		}

		/**
		 * @param mixed $formtarget
		 */
		public function setFormtarget( $formtarget ) {
			$this->formtarget = $formtarget;
		}

		/**
		 * @return mixed
		 */
		public function getFormtarget() {
			return $this->formtarget;
		}

		/**
		 * @param mixed $formnovalidate
		 */
		public function setFormnovalidate( $formnovalidate ) {
			$this->formnovalidate = $formnovalidate;
		}

		/**
		 * @return mixed
		 */
		public function getFormnovalidate() {
			return $this->formnovalidate;
		}

		/**
		 * @param mixed $formmethod
		 */
		public function setFormmethod( $formmethod ) {
			$this->formmethod =  mb_strtolower($formmethod);
		}

		/**
		 * @return mixed
		 */
		public function getFormmethod() {
			return  mb_strtolower($this->formmethod);
		}

		/**
		 * @param mixed $formenctype
		 */
		public function setFormenctype( $formenctype ) {
			$this->formenctype = $formenctype;
		}

		/**
		 * @return mixed
		 */
		public function getFormenctype() {
			return $this->formenctype;
		}

	}