<?php

$filesOfClasses = [
	"Helper" => "helper.php",
	"Form" => "KForm.php",
	// Input Types
	"KInput" => "input_types/KInput.php",
	// Buttons
	"KButton" => "input_types/button/KButton.php",
	"Submit" => "input_types/button/Submit.php",
	"Reset" => "input_types/button/Reset.php",
	"Button" => "input_types/button/Button.php",
	"File" => "input_types/button/File.php",
	// Checkables
	"KCheckables" => "input_types/checkable/KCheckables.php",
	"Checkbox" => "input_types/checkable/Checkbox.php",
	"Checkboxes" => "input_types/checkable/Checkboxes.php",
	"RadioButton" => "input_types/checkable/RadioButton.php",
	// Color
	"Color" => "input_types/color/color.php",
	// Fields
	"KFields" => "input_types/fields/KFields.php",
	"Text" => "input_types/fields/Text.php",
	"Tel" => "input_types/fields/Tel.php",
	"Email" => "input_types/fields/Email.php",
	"Password" => "input_types/fields/Password.php",
	"Search" => "input_types/fields/Search.php",
	"Textarea" => "input_types/fields/Textarea.php",
	"Url" => "input_types/fields/Url.php",
	// Hidden
	"Hidden" => "input_types/hidden/Hidden.php",
	// Image
	"Image" => "input_types/image/Image.php",
	// Numeric
	"KNumeric" => "input_types/numeric/KNumeric.php",
	"Number" => "input_types/numeric/Number.php",
	"Range" => "input_types/numeric/Range.php",
	// Select
	"KSelect" => "input_types/select/KSelect.php",
	"Option" => "input_types/select/Option.php",
	"Select" => "input_types/select/Select.php",
	"CompoBox" => "input_types/select/CompoBox.php",
	// Times
	"KTimes" => "input_types/times/KTimes.php",
	"Date" => "input_types/times/Date.php",
	"DateTime" => "input_types/times/DateTime.php",
	"Month" => "input_types/times/Month.php",
	"Time" => "input_types/times/Time.php",
	"Week" => "input_types/times/Week.php",

	// Elements
	"Label" => "elements/Label.php",
	"Html" => "elements/Html.php",
	"KoalaSessionHandler" => "elements/KoalaSessionHandler.php",
	// Validation
	"ValidationException" => "elements/ValidationException.php",
	"KValidation" => "elements/KValidation.php",

	// Behaviours
	// Autocomplete
	"AutocompleteBehavior" => "behaviors/autocomplete/AutocompleteBehavior.php",
	"NoAutocompleteBehavior" => "behaviors/autocomplete/NoAutocompleteBehavior.php",
	// Placeholder
	"PlaceholderBehavior" => "behaviors/placeholder/PlaceholderBehavior.php",
	"NoPlaceholderBehavior" => "behaviors/placeholder/NoPlaceholderBehavior.php",
	// Label
	"LabelBehavior" => "behaviors/label/LabelBehavior.php",
	"NoLabelBehavior" => "behaviors/label/NoLabelBehavior.php",

	// Templates
	"KTemplate" => "templates/KTemplate.php",
	"LoginForm" => "templates/LoginForm.php",
	"RegistrationForm" => "templates/RegistrationForm.php",

	// Traits
	"InputEvents" => "traits/InputEvents.php",
	"HandleEvents" => "traits/HandleEvents.php"
];

spl_autoload_register(function ( $className ) {
	global $filesOfClasses;
	require_once($filesOfClasses[$className]);
});

KoalaSessionHandler::init();
