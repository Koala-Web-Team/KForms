<?php
	class Color extends KInput
	{
		private $RgbColor;
		private $HexaColor;

		public function __construct( array $attributes = [] ) {
			parent::__construct( $attributes );
			$this->setType( "color" );
		}

		public function setRgbColor( $RgbColor ) {
			$Rgb = $this->rgb_to_hex( $RgbColor );
			$this->setValue( $Rgb );
		}

		public function getRgbColor() {
			return $this->rgb_to_hex( $this->RgbColor );
		}

		public function setHexaColor( $HexaColor ) {
			$this->HexaColor = $HexaColor;
			$this->setValue( $HexaColor );
		}

		public function getHexaColor() {
			return $this->HexaColor;
		}

		// convert rgb color format to hex format
		function rgb_to_hex( string $rgba ): string {
			if ( strpos( $rgba, '#' ) === 0 ) {
				return $rgba;
			}
			preg_match( '/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i', $rgba, $by_color );
			return sprintf( '#%02x%02x%02x', $by_color[1], $by_color[2], $by_color[3] );
		}
	}
