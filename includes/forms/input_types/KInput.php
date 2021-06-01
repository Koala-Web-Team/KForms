<?php

	Abstract class KInput
	{
		use HandleEvents;
		use InputEvents;

		private $attributes;
		protected $label;

		private $placeholderBehavior;
		private $autocompleteBehavior;

		public function __construct( array $attributes = [] ) {
			foreach ( $attributes as $key => $value ) {
				$this->attributes[$key] = $value;
				if ( property_exists( $this, Helper::getAttributeWithCamelCase( mb_strtolower( $key ) ) ) ) {
					$key = Helper::getAttributeWithCamelCase( mb_strtolower( $key ) );
					$this->$key = $value;
				}
			}

			$this->placeholderBehavior = new PlaceholderBehavior();
			$this->autocompleteBehavior = new AutocompleteBehavior();

			$this->label = new Label();
		}

		public function setId( $id ) {
			$this->attributes['id'] = $id;
			$this->label->setFor( $id );
		}

		public function getId() {
			return $this->attributes['id'];
		}

		public function addCssClass( $class ) {
			$this->attributes['cssClass'] .= " " . $class;
		}

		public function getCssClass() {
			return trim( $this->attributes['cssClass'] );
		}

		public function setGroup( $group ) {
			$this->attributes['group'] = $group;
		}

		public function getGroup() {
			return $this->attributes['group'];
		}

		public function setFormId( $formId ) {
			$this->attributes['formId'] = $formId;
		}

		public function getFormId() {
			return $this->attributes['formId'];
		}

		public function getType() {
			return $this->attributes['type'];
		}

		protected function setType( $type ) {
			$this->attributes['type'] = $type;
		}

		public function getStyle() {
			return $this->attributes['style'];
		}

		public function setName( $name ) {
			$this->attributes['name'] = $name;
		}

		public function getName() {
			return $this->attributes['name'];
		}

		public function setValue( $value ) {
			$this->attributes['value'] = $value;
		}

		public function getValue() {
			return $this->attributes['value'];
		}

		public function setDisabled( $disabled = true ) {
			$this->attributes['disabled'] = $disabled;
		}

		public function getDisabled() {
			return $this->attributes['disabled'];
		}

		public function setAutoFocus( bool $autoFocus = true ) {
			$this->attributes['autoFocus'] = $autoFocus;
		}

		public function isAutoFocus() {
			return $this->attributes['autoFocus'];
		}

		public function setLabel( Label $label ) {
			$this->label = $label;
			$this->label->setFor( $this->attributes['id'] );
		}

		public function getLabel() {
			return $this->label;
		}

		public function setPlaceholder( $placeholder ) {
			$this->placeholderBehavior->setPlaceholder( $placeholder );
		}

		public function getPlaceholder() {
			return $this->placeholderBehavior->getPlaceholder();
		}

		protected function setPlaceholderBehavior( $placeholderBehavior ) {
			$this->placeholderBehavior = $placeholderBehavior;
		}

		public function setAutocomplete( $autocomplete ) {
			$this->autocompleteBehavior->setAutocomplete( $autocomplete );
		}

		public function getAutocomplete() {
			return $this->autocompleteBehavior->getAutocomplete();
		}

		protected function setAutocompleteBehavior( $autocompleteBehavior ) {
			$this->autocompleteBehavior = $autocompleteBehavior;
		}

		public function setReadOnly( bool $readOnly = true ) {
			$this->attributes['readOnly'] = $readOnly ;
		}

		public function isReadOnly() {
			return $this->attributes['readOnly'];
		}

		public function setRequired( $required = true ) {
			$this->attributes['required'] = $required;
		}

		public function isRequired() {
			return $this->attributes['required'];
		}

		public function toHtml($divClass = "") {
			$div = new Html("div", ["class" => $divClass] );
			return $div->toHtml($this->__toString());
		}

		public function __toString() {
			// TODO: Fetch the Values of the Behaviors and add them to the Attributes
			$input = new Html("input", $this->attributes);
			return $input->toHtml();
		}
	}
