<?php

abstract class KTimes extends KInput
{
    protected $autocomplete;
    protected $readonly;
    protected $max;
    protected $min;
    protected $step;
    protected $list;
    
    public function setAutocomplete( $autocomplete ) {
        $this->autocomplete = $autocomplete;
    }

    public function getAutocomplete() {
        return $this->autocomplete;
    }
    
    public function setReadonly( $readonly = true ) {
        $this->readonly = $readonly;
    }

    public function getReadonly() {
        return $this->readonly;
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

}