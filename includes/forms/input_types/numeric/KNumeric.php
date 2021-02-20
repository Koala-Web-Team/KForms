<?php
	abstract class KNumeric extends KInput
	{
		protected $max = 100;
		protected $min = 0;
		protected $step = 1;
		protected $list;

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

		public function setList( $id ) {
			$this->list = $id;
		}

		public function getList() {
			return $this->list;
		}

	}
