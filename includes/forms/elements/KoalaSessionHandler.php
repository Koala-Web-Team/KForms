<?php

class KoalaSessionHandler
{
	public static function init() {
		if ( !session_id() ) {
			session_start();
		}

		$_SESSION['KOALA_ERRORS'] = $_SESSION['KOALA_ERRORS'] ?? [];
		$_SESSION['KOALA_VALUES'] = $_SESSION['KOALA_VALUES'] ?? [];
	}

	public static function setError( $key, $error ): void {
		$_SESSION['KOALA_ERRORS'][$key] = $error;
	}

	public static function setErrors( $errors ): void {
		$_SESSION['KOALA_ERRORS'] = $errors;
	}

	public static function setValues( $values ): void {
		$_SESSION['KOALA_VALUES'] = $values;
	}

	public static function getErrors(): array {
		$errors = $_SESSION['KOALA_ERRORS'];
		self::emptyErrors();
		return $errors;
	}

	public static function getListOfErrors(): array {
		$errors = [];
		foreach ( $_SESSION['KOALA_ERRORS'] as $error ) {
			foreach ($error as $er) {
				$errors[] = $er;
			}
		}
		self::emptyErrors();
		return $errors;
	}

	public static function getValue( $key, $default = null ) {
		return $_SESSION['KOALA_VALUES'][$key] ?? $default;
	}

	public static function fresh() {
		$_SESSION['KOALA_ERRORS'] = [];
		$_SESSION['KOALA_VALUES'] = [];
	}

	public static function emptyErrors() {
		$_SESSION['KOALA_ERRORS'] = [];
	}
}