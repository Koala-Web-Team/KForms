<?php
    class CompoBox extends select
    {
        protected $list;
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

          $this->renderOptions();
          echo "</datalist>";
			} else {
				echo "<input type='text' " . $this->getHtmlAttributes() . "/>";
                echo "<datalist id=". $this->getList() .">";
        
				$this->renderOptions();
          echo "</datalist>";
				$this->label->render();
			}
		}
    }