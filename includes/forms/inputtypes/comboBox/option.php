<?php
    class Option extends KComboBox
    {
        private $text;
        public function __construct( array $attributes = [] ) {
            parent::__construct( $attributes );
        }
        
        public function setText( $text ) {
            $this->text = $text;
        }

        public function getText (){
            return $this->text;
        }

        public function render() {
			echo "<option " . $this->getHtmlAttributes() . ">" . $this->text . "</option>\n";
		}

    }