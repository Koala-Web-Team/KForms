<?php

class textarea extends KFields
{
    protected $text;
    protected $autocapitalize;
    protected $cols;
    protected $rows;
    protected $spellcheck;
    protected $wrap;
    public function __construct( array $attributes = [] ) {
		parent::__construct( $attributes );
    }
    
    public function setText( $text ) {
        $this->text = $text;
    }

    public function getText() {
		return $this->text;
    }

    public function isSpellcheck() {
		return $this->spellcheck;
	}

	public function spellcheck() {
		$this->spellcheck = true;
	}

	public function unspellcheck() {
		$this->spellcheck = false;
    }

    public function setAutocapitalize( $autocapitalize ) {
		$this->autocapitalize = $autocapitalize;
	}

	public function getAutocapitalize() {
		return $this->autocapitalize;
    }

    public function setCols( $cols ) {
		$this->cols = $cols;
	}

	public function getCols() {
		return $this->cols;
    }

    public function setRows( $rows ) {
		$this->rows = $rows;
	}

	public function getRows() {
		return $this->rows;
    }

    public function setWrap( $wrap ) {
		$this->wrap = $wrap;
	}

	public function getWrap() {
		return $this->wrap;
    }

    protected function render() {
        if ( !$this->label->isAfterElement() ) {
            $this->label->render();
            echo "<textarea  " . $this->getHtmlAttributes() . ">" . $this->text . "</textarea >";
        } else {
            echo "<textarea  " . $this->getHtmlAttributes() . ">" . $this->text . "</textarea >";
            $this->label->render();
        }
    }

}