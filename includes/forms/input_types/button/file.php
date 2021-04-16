<?php

class File extends KInput
{
	protected $fileTypes = [];
	protected $allowedExtensions = [
		"compressed" => ["7z", "arj", "deb", "pkg", "rar", "rpm", "tar.gz", "z", "zip"],
		"media" => ["bin", "dmg", "iso", "toast", "vcd"],
		"database" => ["csv", "dat", "db", "dbf", "log", "mdb", "sav", "sql", "tar", "xml"],
		"mail" => ["email", "eml", "emlx", "msg", "oft", "ost", "pst", "vcf"],
		"executable" => ["apk", "bat", "bin", "cgi", "pl", "com", "exe", "gadget", "jar", "msi", "py", "wsf"],
		"font" => ["fnt", "fon", "otf", "ttf"],
		"image" => ["ai", "bmp", "gif", "ico", "jpeg", "jpg", "png", "ps", "psd", "svg", "tif", "tiff"],
		"internet-related" => ["asp", "aspx", "cer", "cfm", "cgi", "pl", "css", "htm", "html", "js", "jsp", "part", "php", "py", "rss", "xhtml"],
		"programming" => ["cgi", "pl", "class", "cpp", "cs", "h", "java", "php", "py", "sh", "swift", "vb"],
		"system-related" => ["bak", "cab", "cfg", "cpl", "cur", "dll", "dmp", "drv", "icns", "ico", "ini", "lnk", "msi", "sys", "tmp"],
		"audio" => ["aif", "cda", "mid", "midi", "mp3", "mpa", "ogg", "wav", "wma", "wpl"],
		"video" => ["3g2", "3gp", "avi", "flv", "h264", "m4v", "mkv", "mov", "mp4", "mpg", "mpeg", "rm", "swf", "vob", "wmv"],
		"text" => ["doc", "docx", "odt", "pdf", "rtf", "tex", "txt", "wpd"],
		"spreadsheet" => ["ods", "xls", "xlsm", "xlsx"],
		"presentation" => ["key", "odp", "pps", "ppt", "pptx"]
	];

	protected $accept;
	protected $capture;
	protected $files;

	protected $onChange;
	protected $onSelect;

//	private $userDefinedAllowedExtensions = [];
//	private $userDefinedRestrictedExtensions = [];
	protected $multiple;

	public function __construct( array $attributes = [] ) {
		parent::__construct( $attributes );
		$this->setType( "file" );
		$this->multiple = false;
	}

	public function setMultiple( $multiple = true ) {
		$this->multiple = $multiple;
	}

	public function isMultiple() {
		return $this->multiple;
	}

	public function addFileType( $fileType ) {
		$this->fileTypes[] = $fileType;
	}

	public function getFileTypes() {
		return $this->fileTypes;
	}

	public function setCapture( $capture ) {
		$this->capture = $capture;
	}

	public function getCapture() {
		return $this->capture;
	}

	public function getFiles() {
		return $this->files;
	}

	public function setFiles( $files ) {
		$this->files = $files;
	}


//	public function addAllowedExtension( $allowedExtension ) {
//		$this->userDefinedAllowedExtensions[] = $allowedExtension;
//	}

//	public function removeAllowedExtension( $restrictedExtension ) {
//		$this->userDefinedRestrictedExtensions[] = $restrictedExtension;
//	}

//	public function getAllowedExtensions() {
//		$extensions = [];
//		if ( isset( $this->allowedExtensions[strtolower( $this->getFileType() )] ) ) {
//			$extensions = $this->allowedExtensions[strtolower( $this->getFileType() )];
//		}
//		$extensions = array_merge( $extensions, $this->userDefinedAllowedExtensions );
//		$extensions = array_diff( $extensions, $this->userDefinedRestrictedExtensions );
//
//		return $extensions;
//	}

//	public function getAllowedExtensionsString( $glue = ", " ) {
//		return implode( $glue, $this->getAllowedExtensions() );
//	}

	private function setAccept() {
		foreach ( $this->getFileTypes() as $type ) {
			foreach ( $this->allowedExtensions[$type] as $extension ) {
				$this->accept .= $type . "/" . $extension . ", ";
			}
		}
//		foreach ( $this->userDefinedAllowedExtensions as $extension ) {
//			foreach ($this->allowedExtensions as $type => $type_extensions ) {
//				if ( in_array($extension, $type_extensions ) ) {
//					$this->accept .= $type . "/" . $extension . ", ";
//				}
//			}
//		}
		$this->accept = trim( $this->accept, ", " );
	}

	public function addAccept( $accept ) {
		$this->accept .= $accept . ", ";
	}

	public function getAccept() {
		$this->setAccept();
		return $this->accept;
	}

	private function getFileTypesString() {
		return implode( ",", $this->getFileTypes() );
	}

	public function setOnChange( $function, ...$param ) {
		$this->setOn( 'change', $function, ...$param );
	}

	public function getOnChange() {
		return $this->onChange;
	}

	public function setOnSelect( $function, ...$param ) {
		$this->setOn( 'select', $function, ...$param );
	}

	public function getOnSelect() {
		return $this->onSelect;
	}

	protected function render() {
		$this->setAccept();
		$inputString = "<input " . $this->getHtmlAttributes() . "file-type ='" . $this->getFileTypesString() . "'>";
		if ( !$this->getLabel()->isAfterElement() ) {
			$this->getLabel()->render();
			echo $inputString;
		} else {
			echo $inputString;
			$this->getLabel()->render();
		}
	}
}