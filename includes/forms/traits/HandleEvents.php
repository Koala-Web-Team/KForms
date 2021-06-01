<?php

trait HandleEvents
{
	public function setOn( $event, $function, ...$param ) {
		$function .= "(";
		foreach ( $param as $p ) {
			$function .= '"' . $p . '", ';
		}
		$function = trim( $function, ', ' );
		$function .= ")";
		$event = Helper::getAttributeWithCamelCase( "on" . $event );
		$this->attributes[$event] = $function;
	}
}