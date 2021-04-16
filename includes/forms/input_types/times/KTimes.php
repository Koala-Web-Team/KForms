<?php
    abstract class KTimes extends KInput
    {
        protected $autocomplete;
        protected $max;
        protected $min;
        protected $step;
        protected $list;
        
        public function setAutocomplete( $autocomplete ) {
            $this->autocomplete = $autocomplete;
        }

        public function setMax( $max ) {
            $this->max = $max;
        }

        public function getMax() {
            return $this->max;
        }
        
        public function setMin( $min ) {
            $this->min = $min;
        }

        public function getMin() {
            return $this->min;
        }
        
        public function setStep( $step ) {
            $this->step = $step;
        }

        public function getStep() {
            return $this->step;
        }

		public function getList() {
			return $this->list;
		}

		public function setList( $list ) {
			$this->list = $list;
		}
    }