<?php
	class colorInput extends KInput
	{
		private $defaultValue="#000000"; // black color
		public function __construct( array $attributes = [] ) {
			parent::__construct( $attributes );
			$this->setType( "color" );
		}
		// convert rgb color format to hex format
		function rgb_to_hex( string $rgba ) : string {
			if ( strpos( $rgba, '#' ) === 0 ) {
				return $rgba;
			}
			preg_match( '/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i', $rgba, $by_color );
			return sprintf( '#%02x%02x%02x', $by_color[1], $by_color[2], $by_color[3] );
		}
	}





