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

	public static function getBehavoirsList() {
		return [ 'placeholderBehavoir','readonlyBehavior','autocompleteBehavior' ];
	}

	public static function getAttributesNotInHtml() {
		return [ 'inputs', "label", "afterElement", "fileTypes", "allowedExtensions", "text", "userDefinedAllowedExtensions" ];
	}
}
