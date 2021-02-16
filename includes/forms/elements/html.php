<?php

class Html {
	private $element;
	private $attributes = [];
	// List of void elements from HTML5, section 8.1.2 as of 2016-09-19
	private static $voidElements = [
		'area',
		'base',
		'br',
		'col',
		'embed',
		'hr',
		'img',
		'input',
		'keygen',
		'link',
		'meta',
		'param',
		'source',
		'track',
		'wbr',
	];

	// Boolean attributes, which may have the value omitted entirely.  Manually
	// collected from the HTML5 spec as of 2011-08-12.
	private static $boolAttribs = [
		'async',
		'autofocus',
		'autoplay',
		'checked',
		'controls',
		'default',
		'defer',
		'disabled',
		'formnovalidate',
		'hidden',
		'ismap',
		'itemscope',
		'loop',
		'multiple',
		'muted',
		'novalidate',
		'open',
		'pubdate',
		'readonly',
		'required',
		'reversed',
		'scoped',
		'seamless',
		'selected',
		'truespeed',
		'typemustmatch',
		// HTML5 Microdata
		'itemscope',
	];

	private $validTypes = [
		'hidden',
		'text',
		'password',
		'checkbox',
		'radio',
		'file',
		'submit',
		'image',
		'reset',
		'button',

		// HTML input types
		'datetime',
		'datetime-local',
		'date',
		'month',
		'time',
		'week',
		'number',
		'range',
		'email',
		'url',
		'search',
		'tel',
		'color',
	];

	public function __construct( $element, array $attributes = [] ) {
		// This is not required in HTML5, but let's do it anyway, for
		// consistency and better compression.
		$this->element = strtolower( $element );

		// Some people were abusing this by passing things like
		// 'h1 id="foo" to $element, which we don't want.
		if ( strpos( $this->element, ' ' ) !== false ) {
			// TODO: Make the element is the element only
		}

		// Not technically required in HTML5 but we'd like consistency
		// and better compression anyway.
		foreach ( $attributes as $attribute => $value) {
			$this->attributes[ strtolower($attribute) ] = $value;
		}
	}

	/**
	 * Returns an HTML element in a string.  The major advantage here over
	 * manually typing out the HTML is that it will escape all attribute
	 * values.
	 *
	 * @param string $contents The raw HTML contents of the element: *not*
	 *   escaped!
	 * @return string Raw HTML
	 */
	public function rawElement( $contents = '' ) {
		$start = self::openElement();
		if ( in_array( $this->element, self::$voidElements ) ) {
			return substr( $start, 0, -1 ) . '/>';
		} else {
			return $start . $contents . $this->closeElement();
		}
	}

	public function openElement() {

		// Remove invalid input types
		if ( $this->element == 'input' ) {
			if ( isset( $this->attributes['type'] ) && !in_array( $this->attributes['type'], $this->validTypes ) ) {
				unset( $this->attributes['type'] );
			}
		}

		// According to standard the default type for <button> elements is "submit".
		// Depending on compatibility mode IE might use "button", instead.
		// We enforce the standard "submit".
		if ( $this->element == 'button' && !isset( $this->attributes['type'] ) ) {
			$this->attributes['type'] = 'submit';
		}

		$this->dropDefaults();
		return "<$this->element" . $this->expandAttributes() . '>';
	}

	public function closeElement() {
		return "</$this->element>";
	}

	/**
	 * Return an array that is functionally identical to the input array, but
	 * possibly smaller. In particular, attributes might be stripped if they
	 * are given their default values.
	 */
	private function dropDefaults() {
		static $attribDefaults = [
			'area' => [ 'shape' => 'rect' ],
			'button' => [
				'formaction' => 'GET',
				'formenctype' => 'application/x-www-form-urlencoded',
			],
			'canvas' => [
				'height' => '150',
				'width' => '300',
			],
			'form' => [
				'action' => 'GET',
				'autocomplete' => 'on',
				'enctype' => 'application/x-www-form-urlencoded',
			],
			'input' => [
				'formaction' => 'GET',
				'type' => 'text',
			],
			'keygen' => [ 'keytype' => 'rsa' ],
			'link' => [ 'media' => 'all' ],
			'menu' => [ 'type' => 'list' ],
			'script' => [ 'type' => 'text/javascript' ],
			'style' => [
				'media' => 'all',
				'type' => 'text/css',
			],
			'textarea' => [ 'wrap' => 'soft' ],
		];

		foreach ( $this->attributes as $attribute => $value ) {
			if ( is_array( $value ) ) {
				$value = implode( ' ', $value );
			} else {
				$value = strval( $value );
			}

			// Simple checks using $attribDefaults
			if ( isset( $attribDefaults[$this->element][$attribute] )
				&& $attribDefaults[$this->element][$attribute] == $value
			) {
				unset( $this->attributes[$attribute] );
			}

			if ( $attribute == 'class' && $value == '' ) {
				unset( $this->attributes[$attribute] );
			}
		}

		// More subtle checks
		if ( $this->element === 'link'
			&& isset( $this->attributes['type'] ) && strval( $this->attributes['type'] ) == 'text/css'
		) {
			unset( $this->attributes['type'] );
		}

		if ( $this->element === 'input' ) {
			$type = $this->attributes['type'] ? $this->attributes['type'] : null;
			$value = $this->attributes['value'] ? $this->attributes['value'] : null;
			if ( $type === 'checkbox' || $type === 'radio' ) {
				// The default value for checkboxes and radio buttons is 'on'
				// not ''. By stripping value="" we break radio boxes that
				// actually wants empty values.
				if ( $value === 'on' ) {
					unset( $this->attributes['value'] );
				}
			} elseif( $type != "submit" ) {
				// The default value for submit appears to be "Submit" but
				// let's not bother stripping out localized text that matches
				// that.

				// The default value for nearly every other field type is ''
				// The 'range' and 'color' types use different defaults but
				// stripping a value="" does not hurt them.
				if ( $value === '' ) {
					unset( $this->attributes['value'] );
				}
			}
		}

		if ( $this->element === 'select' && isset( $this->attributes['size'] ) ) {
			if ( in_array( 'multiple', $this->attributes )
				|| ( isset( $this->attributes['multiple'] ) && $this->attributes['multiple'] !== false )
			) {
				// A multi-select
				if ( strval( $this->attributes['size'] ) == '4' ) {
					unset( $this->attributes['size'] );
				}
			} else {
				// Single select
				if ( strval( $this->attributes['size'] ) == '1' ) {
					unset( $this->attributes['size'] );
				}
			}
		}
	}

	/**
	 * @return string HTML fragment that goes between element name and '>'
	 *   (starting with a space if at least one attribute is output)
	 */
	public function expandAttributes() {
		$ret = '';
		foreach ( $this->attributes as $attribute => $value ) {
			// Support intuitive [ 'checked' => true/false ] form
			if ( $value === false || is_null( $value ) ) {
				continue;
			}

			// For boolean attributes, support [ 'foo' ] instead of
			// requiring [ 'foo' => 'meaningless' ].
			if ( is_int( $attribute ) && in_array( strtolower( $value ), self::$boolAttribs ) ) {
				$attribute = $value;
			}

			// https://www.w3.org/TR/html401/index/attributes.html ("space-separated")
			// https://www.w3.org/TR/html5/index.html#attributes-1 ("space-separated")
			$spaceSeparatedListAttributes = [
				'class', // html4, html5
				'accesskey', // as of html5, multiple space-separated values allowed
				// html4-spec doesn't document rel= as space-separated
				// but has been used like that and is now documented as such
				// in the html5-spec.
				'rel',
			];

			// Specific features for attributes that allow a list of space-separated values
			if ( in_array( $attribute, $spaceSeparatedListAttributes ) ) {
				// Apply some normalization and remove duplicates

				// Convert into correct array. Array can contain space-separated
				// values. Implode/explode to get those into the main array as well.
				if ( is_array( $value ) ) {
					// If input wasn't an array, we can skip this step
					$newValue = [];
					foreach ( $value as $k => $v ) {
						if ( is_string( $v ) ) {
							// String values should be normal `[ 'foo' ]`
							// Just append them
							if ( !isset( $value[$v] ) ) {
								// As a special case don't set 'foo' if a
								// separate 'foo' => true/false exists in the array
								// keys should be authoritative
								$newValue[] = $v;
							}
						} elseif ( $v ) {
							// If the value is truthy but not a string this is likely
							// an [ 'foo' => true ], falsy values don't add strings
							$newValue[] = $k;
						}
					}
					$value = implode( ' ', $newValue );
				}
				$value = explode( ' ', $value );

				// Normalize spacing by fixing up cases where people used
				// more than 1 space and/or a trailing/leading space
				$value = array_diff( $value, [ '', ' ' ] );

				// Remove duplicates and create the string
				$value = implode( ' ', array_unique( $value ) );
			} elseif ( is_array( $value ) ) {
				// TODO throw exception error { HTML attribute $key can not contain a list of values }
			}

			$quote = '"';

			if ( in_array( $attribute, self::$boolAttribs ) ) {
				$ret .= " $attribute=\"\"";
			} else {
				$ret .= " $attribute=$quote" . $this->encodeAttribute( $value ) . $quote;
			}
		}
		return $ret;
	}

	private function encodeAttribute( $text ) {
		$encValue = htmlspecialchars( $text, ENT_QUOTES );

		$encValue = strtr( $encValue, [
			"\n" => '&#10;',
			"\r" => '&#13;',
			"\t" => '&#9;',
		] );

		return $encValue;
	}
}
