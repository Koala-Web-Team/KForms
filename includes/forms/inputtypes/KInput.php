<?php

	Abstract class KInput
	{
		private $id;
		private $group;
		private $formId;
		private $type;
		private $style;
		private $name;
		private $value;
		private $disabled;
		private $autoFocus;
		protected $label;
		private $onClick;

		private $placeholderBehavoir;
		private $autocompleteBehavior;
		private $readonlyBehavior;

		public function __construct( array $attributes = [] ) {
			foreach ( $attributes as $key => $value ) {
				if ( property_exists( $this, Helper::getAttributeWithCamelCase( mb_strtolower( $key ) ) ) ) {
					$key = Helper::getAttributeWithCamelCase( mb_strtolower( $key ) );
					$this->$key = $value;
				}
			}

			$this->placeholderBehavoir = new placeholderbehavior();
			$this->autocompleteBehavior = new autocompleteBehavior();
			$this->readonlyBehavior = new readonlyBehavior();

			$this->label = new Label();
		}

		public function setId( $id ) {
			$this->id = $id;
			$this->label->setFor( $id );
		}

		public function getId() {
			return $this->id;
		}

		public function setGroup( $group ) {
			$this->group = $group;
		}

		public function getGroup() {
			return $this->group;
		}

		public function setFormId( $formId ) {
			$this->formId = $formId;
		}

		public function getFormId() {
			return $this->formId;
		}

		public function getType() {
			return $this->type;
		}

		protected function setType( $type ) {
			$this->type = $type;
		}

		public function getStyle() {
			return $this->style;
		}

		public function setName( $name ) {
			$this->name = $name;
		}

		public function getName() {
			return $this->name;
		}

		public function setValue( $value ) {
			$this->value = $value;
		}

		public function getValue() {
			return $this->value;
		}

		public function setDisabled( $disabled = true ) {
			$this->disabled = $disabled;
		}

		public function getDisabled() {
			return $this->disabled;
		}

		public function setAutoFocus( $autoFocus = true ) {
			$this->autoFocus = $autoFocus;
		}

		public function getAutoFocus() {
			return $this->autoFocus;
		}

		public function setLabel( Label $label ) {
			$this->label = $label;
			$this->label->setFor( $this->id );
		}

		public function getLabel() {
			return $this->label;
		}

		public function setPlaceholder( $placeholder ) {
			$this->placeholderBehavoir->setPlaceholder( $placeholder );
		}

		public function getPlaceholder() {
			return $this->placeholderBehavoir->getPlaceholder();
		}

		protected function setPlaceholderBehavoir( $placeholderBehavior ) {
			$this->placeholderBehavoir = $placeholderBehavior;
		}

		public function setAutocomplet( $autocomplete ) {
			$this->autocompleteBehavior->setAutocomplet( $autocomplete );
		}

		public function getAutocomplet() {
			return $this->autocompleteBehavior->getAutocomplet();
		}

		protected function setAutocompleteBehavior( $autocompleteBehavior ) {
			$this->autocompleteBehavior = $autocompleteBehavior;
		}

		public function setReadonly( $readonly ) {
			$this->readonlyBehavior->setReadonly( $readonly );
		}

		public function getReadonly() {
			return $this->readonlyBehavior->getReadonly();
		}

		protected function setReadonlyBehavior( $readonlyBehavior ) {
			$this->readonlyBehavior = $readonlyBehavior;
		}

		protected function render() {
			if ( !$this->getLabel()->isAfterElement() ) {
				$this->getLabel()->render();
				echo "<input " . $this->getHtmlAttributes() . ">";
			} else {
				echo "<input " . $this->getHtmlAttributes() . ">";
				$this->getLabel()->render();
			}
		}

		// @TODO: Implement the Function.
		public function setOn( $event, $function, $param = "" ) {
		}

		// TODO: Implement the function for the other
		public function setOnClick( $function, ...$param ) {
			$this->setOn( "click", $function, $param );
		}

		public function getOnClick() {
			return $this->onClick;
		}

		public function setProperties() {
		}

		public function getProperty() {
		}

		public function getInput() {
		}

		public function setCss() {
		}

		public function createInput() {
		}

		public function renderDiv() {
			$this->renderOpenTag();
			$this->render();
			$this->renderCloseTag();
		}

		protected function renderOpenTag() {
			echo "<div>\n";
		}

		protected function renderCloseTag() {
			echo "</div>\n";
		}

		protected function getHtmlAttributes() {
			$attributes = get_object_vars( $this );
			$htmlAttributes = "";
			foreach ( $attributes as $key => $value ) {
				if ( $value !== NULL
					&& !in_array( $key, Helper::getAttributesNotInHtml() )
					&& !in_array( $key, Helper::getBehavoirsList() )
					&& $value != false ) {
					$htmlAttributes .= Helper::getHtmlAttributeName( $key ) . "='" . $value . "' ";
				}
			}
			return $htmlAttributes;
		}
	}
