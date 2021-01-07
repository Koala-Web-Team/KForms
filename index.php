<?php

include "includes/forms/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	echo "request is post";
}
$form = new Form([
	"meTHod" => "post",
	"action" => "index.php",
    "cssClass" => "classTest"
]);


$form->addCssClass("class1 class2");
$form->addCssClass("class3 class4");

// $firstTime = new KTimes(["type"=>"time"]);

// $form->addInput( $firstTime );

$firstTime = new time();
//$firstTime->setType("time");
$firstTime->setMax(7);
$firstTime->setName("toty");

$secondTime = new time(["min"=>"7","value"=>"mkmk"]);
$form->addInput( $firstTime );
$form->addInput( $secondTime );
// $form->addInputs( [ new text(), new text() ] );
// $form->addInput( new submit() );
	// hidden input
	$hiddenInput = new hiddenInput();
	$hiddenInput->setName("myname");
	$hiddenInput->setId("myname_id");
	//color input
	$colorInput = new colorInput();
	$colorInput->setName("mycolor");
	//	$colorInput->setValue($colorInput->rgb_to_hex('#ffffff'));
	$colorInput->setValue($colorInput->rgb_to_hex('rgb(123,125,132)')); // convert rgb to hex;
	$form->addInput($hiddenInput);
	$form->addInput($colorInput);
?>

<body>
<?php $form->renderForm(); ?>

</body>
