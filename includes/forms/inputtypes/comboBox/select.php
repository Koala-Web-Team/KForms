<?php

    class select extends KComboBox
    {
        private $options = [];

        public function __construct( array $attributes = [] ) {
            parent::__construct( $attributes );
        }

        public function addOption( option $option ) {
            $this->options[] = $option;
        }
        
        public function addOptions( array $options ) {
            foreach ( $options as $option ) {
                $this->addoption( $option );
            }
        }

        public function getOption() {
            $option = "";
            foreach ($this->options as $value) {
                $option = $value->renderDiv() ;
            }
            return $option;
        }
        
        protected function render() {
            if ( !$this->label->isAfterElement() ) {
                $this->label->render();
                echo "<select " . $this->getHtmlAttributes() . ">" ;
                echo $this->getOption();
                echo "</select>" ;
            } else {
                echo "<select " . $this->getHtmlAttributes() . ">" ;
                echo $this->getOption();
                echo "</select>" ;
                $this->label->render();
            }
        }

    }