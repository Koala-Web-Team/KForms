<?php
	require_once("helper.php");
	require_once("KForm.php");
	/**
	 * Input Types
	 */
	// Koala Input
	require_once("input_types/KInput.php");
	// Button
	require_once("input_types/button/KButton.php");
	require_once("input_types/button/submit.php");
	require_once("input_types/button/reset.php");
	require_once("input_types/button/button.php");
	require_once("input_types/button/file.php");
	require_once("input_types/button/submit.php");
	require_once("input_types/button/file.php");
	// Checkable
	require_once("input_types/checkable/KCheckables.php");
	require_once("input_types/checkable/checkbox.php");
	require_once("input_types/checkable/checkboxes.php");
	require_once("input_types/checkable/radioButton.php");
	// Color
	require_once("input_types/color/color.php");
	// Fields
	require_once("input_types/fields/KFields.php");
	require_once("input_types/fields/text.php");
	require_once("input_types/fields/tel.php");
	require_once("input_types/fields/email.php");
	require_once("input_types/fields/password.php");
	require_once("input_types/fields/search.php");
	require_once("input_types/fields/textarea.php");
	require_once("input_types/fields/url.php");
	// Hidden
	require_once("input_types/hidden/hidden.php");
	// Image
	require_once("input_types/image/image.php");
	// Numeric
	require_once("input_types/numeric/KNumeric.php");
	require_once("input_types/numeric/number.php");
	require_once("input_types/numeric/range.php");
	// Select
	require_once("input_types/select/KSelect.php");
	require_once("input_types/select/option.php");
	require_once("input_types/select/select.php");
	require_once("input_types/select/compoBox.php");
	require_once("input_types/times/KTimes.php");
	require_once("input_types/times/date.php");
	require_once("input_types/times/dateTime.php");
	require_once("input_types/times/month.php");
	require_once("input_types/times/time.php");
	require_once("input_types/times/week.php");

	/**
	 *  Elements
	 */
	// Label
	require_once("elements/label.php");
	// Html
	require_once("elements/html.php");

	/**
	 * Behaviours
	 */
	// Autocomplete
	require_once("behaviors/autocomplete/autocompleteBehavior.php");
	require_once("behaviors/autocomplete/noAutocompleteBehavior.php");
	// Placeholder
	require_once("behaviors/placeholder/placeholderBehavior.php");
	require_once("behaviors/placeholder/noPlaceholderBehavior.php");
