<?php
    class option extends KComboBox
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

        protected function render() {
            if ( !$this->label->isAfterElement() ) {
                $this->label->render();
                echo "<option " . $this->getHtmlAttributes() . ">" . $this->text . "</option>";
            } else {
                echo "<option " . $this->getHtmlAttributes() . ">" . $this->text . "</option>";
                $this->label->render();
            }
        }

    }