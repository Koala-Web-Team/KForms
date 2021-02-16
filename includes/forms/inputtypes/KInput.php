<?php

	Abstract class KInput
	{
		private $id;
		private $cssClass = "";
		private $group;
		private $formId;
		private $type;
		private $style;
		private $name;
		private $value;
		private $disabled;
		private $autoFocus;
		protected $label;

		protected $onClick;
		protected $ondblclick;
		protected $oncontextmenu;
		protected $onfocus;
		protected $oninvalid;
		protected $onmousedown;
		protected $onmouseup;
		protected $onmousemove;
		protected $onmouseout;
		protected $onmouseover;
		protected $onwheel;
		protected $oncopy;
		protected $onpaste;
		protected $oncut;

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

		public function addCssClass( $class ) {
			$this->cssClass .=  " " . $class;
		}

		public function getCssClass() {
			return trim( $this->cssClass );
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


		public function setOn( $event,$function,...$param) {
			$function.="(";
				foreach ($param as $p) {
					$function.='"'.$p.'", ';
				}
				$function=trim($function,', ');
				$function.=")";
				$event= mb_strtolower("on$event");
				$this->$event=$function;
	}
		public function setOnClick($function,...$param) {
			$this->setOn('click',$function,...$param);
		}
		public function getOnClick(){
			return $this->onClick;
		}

		public function setOnDblClick($function,...$param) {
			$this->setOn('dblclick',$function,...$param);
		}
		public function getOnDblClick() {
			return $this->ondblclick;
		}

		public function setOnContextMenu($function,...$param) {
			$this->setOn('contextmenu',$function,...$param);
		}
		public function getOnContextMenu() {
			return $this->oncontextmenu;
		}
		public function setOnBlur($function,...$param) {
			$this->setOn('blur',$function,...$param);
		}
		public function getOnBlur() {
			return $this->onblur;
		}
		
		public function setOnFocus($function,...$param) {
			$this->setOn('focus',$function,...$param);
		}
		public function getOnFocus() {
			return $this->onfocus;
		}

		public function setOnInvalid($function,...$param) {
			$this->setOn('invalid',$function,...$param);
		}
		public function getOnInvalid() {
			return $this->oninvalid;
		}

		public function setOnMouseDown($function,...$param) {
			$this->setOn('mousedown',$function,...$param);
		}
		public function getOnMouseDown() {
			return $this->onmousedown;
		}

		public function setOnMouseUp($function,...$param) {
			$this->setOn('mouseup',$function,...$param);
		}
		public function getOnMouseUp() {
			return $this->onmouseup;
		}

		public function setOnMouseMove($function,...$param) {
			$this->setOn('mousemove',$function,...$param);
		}
		public function getOnMouseMove() {
			return $this->onmousemove;
		}

		public function setOnMouseOut($function,...$param) {
			$this->setOn('mouseout',$function,...$param);
		}
		public function getOnMouseOut() {
			return $this->onmouseout;
		}

		public function setOnMouseOver($function,...$param) {
			$this->setOn('mouseover',$function,...$param);
		}
		public function getOnMouseOver() {
			return $this->onmouseover;
		}

		public function setOnWheel($function,...$param) {
			$this->setOn('wheel',$function,...$param);
		}
		public function getOnWheel() {
			return $this->onwheel;
		}

		public function setOnCopy($function,...$param) {
			$this->setOn('copy',$function,...$param);
		}
		public function getOnCopy() {
			return $this->oncopy;
		}

		public function setOnPaste($function,...$param) {
			$this->setOn('paste',$function,...$param);
		}
		public function getOnPaste() {
			return $this->onpaste;
		}

		public function setOnCut($function,...$param) {
			$this->setOn('cut',$function,...$param);
		}
		public function getOnCut() {
			return $this->oncut;
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
