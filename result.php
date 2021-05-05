<?php
include "includes/forms/KValidation.php";

$rules = [
	'mido' => ['min:2','max:5','required','string'],
	'mizo' => ['required','string'],
	'linda' => ['required','string'],
];

$errormsg = [
	'mizo.string' => "not yet string",
	'linda.required' => "not yet rered",
	'max.mido' => 'fddfd',
];

$request = $_POST;

$validation = new KValidation();
$validation->validate($request,$rules,$errormsg);
