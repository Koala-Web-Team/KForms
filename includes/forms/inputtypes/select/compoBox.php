<?php
    class CompoBox extends select
    {
        protected $list;
        protected $multiselect;
		protected $class;
        public function __construct( array $attributes = [] ) {
            parent::__construct($attributes);
            $this->setList("datalist");
        }

        public function setList( $list = "datalist" ) {
			$this->list = $list;
        }

        public function getList() {
			return $this->list;
		}


		protected function render() {
			if ( !$this->label->isAfterElement() ) {
                $this->label->render();
                echo "<input type='text' " . $this->getHtmlAttributes() . ">";
                echo "<datalist id=". $this->getList() .">";
				//echo "<select style='display: none;' >";
				$this->renderOptions();
                //echo "</select>";
                echo "</datalist>";
			} else {
				echo "<input type='text' " . $this->getHtmlAttributes() . "/>";
                echo "<datalist id=". $this->getList() .">";
				//echo "<select style='display: none;' >";
				$this->renderOptions();
                //echo "</select>";
                echo "</datalist>";
				$this->label->render();
			}
		}
    }
