<?php

class File extends KInput
{
	protected $fileType;
	protected $allowedExtensions = [
		"compressed" => [".7z", ".arj", ".deb", ".pkg", ".rar", ".rpm", ".tar.gz", ".z", ".zip"],
		"media" => [".bin", ".dmg", ".iso", ".toast", ".vcd"],
		"database" => [".csv", ".dat", ".db", ".dbf", ".log", ".mdb", ".sav", ".sql", ".tar", ".xml"],
		"mail" => [".email", ".eml", ".emlx", ".msg", ".oft", ".ost", ".pst", ".vcf"],
		"executable" => [".apk", ".bat", ".bin", ".cgi", ".pl", ".com", ".exe", ".gadget", ".jar", ".msi", ".py", ".wsf"],
		"font" => [".fnt", ".fon", ".otf", ".ttf"],
		"image" => [".ai", ".bmp", ".gif", ".ico", ".jpeg", ".jpg", ".png", ".ps", ".psd", ".svg", ".tif", ".tiff"],
		"internet-related" => [".asp", ".aspx", ".cer", ".cfm", ".cgi", ".pl", ".css", ".htm", ".html", ".js", ".jsp", ".part", ".php", ".py", ".rss", ".xhtml"],
		"programming" => [".cgi", ".pl", ".class", ".cpp", ".cs", ".h", ".java", ".php", ".py", ".sh", ".swift", ".vb"],
		"system-related" => [".bak", ".cab", ".cfg", ".cpl", ".cur", ".dll", ".dmp", ".drv", ".icns", ".ico", ".ini", ".lnk", ".msi", ".sys", ".tmp"],
		"audio" => [".aif", ".cda", ".mid", ".midi", ".mp3", ".mpa", ".ogg", ".wav", ".wma", ".wpl"],
		"video" => [".3g2", ".3gp", ".avi", ".flv", ".h264", ".m4v", ".mkv", ".mov", ".mp4", ".mpg", ".mpeg", ".rm", ".swf", ".vob", ".wmv"],
		"text" => [".doc", ".docx", ".odt", ".pdf", ".rtf", ".tex", ".txt", ".wpd"],
		"spreadsheet" => [".ods", ".xls", ".xlsm", ".xlsx"],
		"presentation" => [".key", ".odp", ".pps", ".ppt", ".pptx"]
	];

	private $userDefinedAllowedExtensions = [];
	private $userDefinedRestrictedExtensions = [];
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

	public function setFileType( $fileType ) {
		$this->fileType = $fileType;
	}

	public function getFileType() {
		return $this->fileType;
	}

	public function addAllowedExtension( $allowedExtension ) {
		$this->userDefinedAllowedExtensions[] = $allowedExtension;
	}

	public function removeAllowedExtension( $restrictedExtension ) {
		$this->userDefinedRestrictedExtensions[] = $restrictedExtension;
	}

	public function getAllowedExtensions() {
		$extensions = [];
		if ( isset( $this->allowedExtensions[strtolower( $this->getFileType() )] ) ) {
			$extensions = $this->allowedExtensions[strtolower( $this->getFileType() )];
		}
		$extensions = array_merge( $extensions, $this->userDefinedAllowedExtensions );
		$extensions = array_diff( $extensions, $this->userDefinedRestrictedExtensions );

		return $extensions;
	}

	public function getAllowedExtensionsString( $glue = ", " ) {
		return implode( $glue, $this->getAllowedExtensions() );
	}

	protected function render() {
		$inputString = "<input " . $this->getHtmlAttributes() . "file-type ='" . $this->getFileType() . "' allowed-extensions='" . $this->getAllowedExtensionsString() . "'>";
		if ( !$this->getLabel()->isAfterElement() ) {
			$this->getLabel()->render();
			echo $inputString;
		} else {
			echo $inputString;
			$this->getLabel()->render();
		}
	}
}