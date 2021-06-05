<?php

trait HandleEvents
{
	private static $events = [
			"onclick" => "onClick",
			"ondblclick" => "onDblClick",
			"oncontextmenu" => "onContextMenu",
			"onfocus" => "onFocus",
			"oninvalid" => "onInvalid",
			"onmousedown" => "onMouseDown",
			"onmouseup" => "onMouseUp",
			"onmousemove" => "onMouseMove",
			"onwheel" => "onWheel",
			"oncopy" => "onCopy",
			"onpaste" => "onPaste",
			"onCut" => "onCut",
			"oninput" => "onInput",
			"onchange" => "onChange",
			"onselect" => "onSelect",
			"onreset" => "onReset",
			"onblur" => "onBlur",
			"onkeydown" => "onDeyDown",
			"onkeyup" => "onKeyUp",
			"onkeypress" => "onKeyPress",
			"onerror" => "onError",
			"onload" => "onLoad"
	];

	public function setOn( $event, $function, ...$param ) {
		$function .= "(";
		foreach ( $param as $p ) {
			$function .= '"' . $p . '", ';
		}
		$function = trim( $function, ', ' );
		$function .= ")";
		$event = self::$events[ strtolower("on" . $event) ];
		$this->attributes[$event] = $function;
	}
}