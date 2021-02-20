<?php
class Helper
{

	public static function getAttributeWithCamelCase( $attribute ) {
		switch ( mb_strtolower($attribute) ) {
			case "cssclass":
				return "cssClass";

			case "acceptcharset":
				return "acceptCharset";

			case "novalidate":
				return "noValidate";

			case "afterelement":
				return "afterElement";

			case "filetype":
				return "fileType";
        
			case "onclick":
				return "onClick";

			case "ondblclick":
				return "onDblClick";

			case "oncontextmenu":
				return "onContextMenu";

			case "onfocus":
				return "onFocus";

			case "oninvalid":
				return "onInvalid";

			case "onmousedown":
				return "onMouseDown";

			case "onmouseup":
				return "onMouseUp";

			case "onmousemove":
				return "onMouseMove";

			case "onwheel":
				return "onWheel";

			case "oncopy":
				return "onCopy";

			case "onpaste":
				return "onPaste";

			case "onCut":
				return "onCut";

			case "oninput":
				return "onInput";

			case "onchange":
				return "onChange";

			case "onselect":
				return "onSelect";

			case "onreset":
				return "onReset";

			case "onblur":
				return "onBlur";

			case "onkeydown":
				return "onDeyDown";

			case "onkeyup":
				return "onKeyUp";

			case "onkeypress":
				return "onKeyPress";

			case "onerror":
				return "onError";

			case "onload":
				return "onLoad";

			case "minlength":
				return "minLength";

			case "maxlength":
				return "maxLength";

			case "formaction":
				return "formAction";

			case "formenctype":
				return "formEnctype";

			case "formtarget":
				return "formTarget";

			case "formmethod":
				return "formMethod";

			case "formnovalidate":
				return "formNoValidate";

			case "spellcheck":
				return "spellCheck";

			default:
				return $attribute;
		}
	}

	public static function getHtmlAttributeName( $attribute ) {
		switch ( mb_strtolower($attribute) ) {
			case "cssclass":
				return "class";

			case "acceptcharset":
				return "accept-charset";

			default:
				return mb_strtolower( $attribute );
		}
	}

	public static function getBehaviorsList() {
		return [ 'placeholderBehavior', 'autocompleteBehavior' ];
	}

	public static function getAttributesNotInHtml() {
		return [ 'inputs', "label", "afterElement", "fileTypes", "allowedExtensions", "text", "userDefinedAllowedExtensions" ];
	}
}
