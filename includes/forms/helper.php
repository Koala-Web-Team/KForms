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

			case "novalidate":
				return "novalidate";

			default:
				return $attribute;
		}
	}

	public static function getBehavoirsList() {
		return [ 'placeholderBehavoir' ];
	}

	public static function getAttributesNotInHtml() {
		return [ 'inputs', "label", "afterElement", "fileTypes", "allowedExtensions", "text", "userDefinedAllowedExtensions" ];
	}
}
