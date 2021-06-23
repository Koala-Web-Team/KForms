<?php

	Abstract class KInput
	{
		use HandleEvents;
		use InputEvents;

		const FILLED_BORDER = "filled-border-input";

		private $attributes;
		protected $label;
		protected $labelContent;

		private $placeholderBehavior;
		private $autocompleteBehavior;
		private $labelBehavior;

		public function __construct( array $attributes = [] ) {
			$this->attributes['cssClass'] = "";
			foreach ( $attributes as $key => $value ) {
				$this->attributes[$key] = $value;
			}

			$this->placeholderBehavior = new PlaceholderBehavior();
			$this->autocompleteBehavior = new AutocompleteBehavior();
			$this->labelBehavior = new LabelBehavior();

			$this->label = new Html("label");
		}

		public function setId( $id ) {
			$this->attributes['id'] = $id;
			$this->label->addAttribute( "for", $id );
		}

		public function getId() {
			return $this->attributes['id'] ?? null;
		}

		public function addCssClass( $class ) {
			$this->attributes['cssClass'] .= " " . $class;

			if ( $class == KInput::FILLED_BORDER ) {
				$this->setLabelBehavior(new NoLabelBehavior());
			}
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

		public function isDisabled() {
			return $this->attributes['disabled'];
		}

		public function setAutoFocus( bool $autoFocus = true ) {
			$this->attributes['autoFocus'] = $autoFocus;
		}

		public function isAutoFocus() {
			return $this->attributes['autoFocus'];
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

		public function setLabel( string $label ) {
			$this->labelBehavior->setLabel($label);
		}

		public function getLabel(): string {
			return $this->labelBehavior->getLabel();
		}

		protected function setLabelBehavior( $labelBehavior ) {
			$this->labelBehavior = $labelBehavior;
		}

		public function setIdentity( string $identity ) {
			$this->setName($identity);
			$this->setLabel($identity);
			$this->setPlaceholder($identity);
		}

		public function setLabelClass( string $class ) {

		}

		public function toHtml($divClass = "") {
			$div = new Html( "div", ["class" => $divClass] );
			$this->label->setAttributes(
				[
					"for" => $this->getId(),
					"class" => "float-label"
				]
			);
			return $div->toHtml( $this->__toString() . $this->label->toHtml( $this->labelContent ) );
		}

		public function __toString() {
			$this->handleBehaviors();
			$this->handleCssClass();
			$input = new Html("input", $this->attributes);

			return $input->toHtml();
		}

		private function handleBehaviors() {
			$this->attributes['placeholder'] = $this->getPlaceholder();
			$this->attributes['autocomplete'] = $this->getAutocomplete();
		}

		private function handleCssClass() {
			$this->attributes['class'] = $this->attributes['cssClass'];
			unset( $this->attributes['cssClass'] );
		}
	}
