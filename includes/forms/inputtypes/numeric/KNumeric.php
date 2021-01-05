<?php


abstract class KNumeric extends KInput
{

	protected $min = 0;
	protected $max = 100;
	protected $step = 1;
	protected $list;


	public function setMax( $max ) {
		$this->max = $max;
	}

	public function setMin($min)
	{
		$this->min = $min;
	}

	public function setStep($step)
	{
		$this->step = $step;
	}

	public function setList($id)
	{
		$this->list = $id;
	}

	public function getMax()
	{
		return $this->max;
	}

	public function getMin()
	{
		return $this->min;
	}

	public function getStep()
	{
		return $this->step;
	}

	public function getList()
	{
		return $this->list;
	}

}
