<?php

	include "includes/forms/KForm.php";

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		echo "request is post";
		echo "<pre>";
		var_dump( $_POST );
		echo "</pre>";
	}

	// form
	$form = new Form([
		"meTHod" => "post",
		"action" => "index.php",
		"cssClass" => "classTest"
	]);
	$form->addCssClass("class1 class2");
	$form->addCssClass("class3 class4");

	// time
	$firstTime = new time();
	$firstTime->setMax(7);
	$firstTime->setName("toty");

	$secondTime = new time(["min"=>"7","value"=>"mkmk"]);

	$form->addInput( $firstTime );
	$form->addInput( $secondTime );

	// hidden input
	$hiddenInput = new hidden();
	$hiddenInput->setName("myname");
	$hiddenInput->setId("myname_id");
	$form->addInput($hiddenInput);

	// color input
	$colorInput = new color();
	$colorInput->setName("mycolor");
	$colorInput->setRgbColor('rgb(123,125,132)');
	//$colorInput->setHexaColor('#fffffff');
	$form->addInput($colorInput);

	// comboBox
	// select 1
	$select1 = new select(["name"=>"martina"]);
	$select1->setId("99");
	// option 1
	$option1 = new option(["name"=>"martina", "value"=>"martina"]);
	$option1->setId("99");
	$option1->setText("martina");
	// option 2
	$option2 = new option();
	$option2->setId("100");
	$option2->setText("Ayman");
	// add options to select
	$select1->addOption($option2);
	$select1->addOption($option1);
	$form->addInput($select1);

	// anther select
	$select12 = new select(["name"=>"martina"]);
	$select12->setId("997");
	// option 1
	$option12 = new option(["name"=>"martina", "value"=>"martina"]);
	$option12->setId("99");
	$option12->setText("martina2");
	// option 2
	$option22 = new option();
	$option22->setId("100");
	$option22->setText("Ayman2");
	// add option to select as array
	$select12->addOptions([$option22,$option12]);
	$form->addInput($select12);

	// Button
	$s= new submit();
	$s->setFormaction('test.php');
	$s->setFormmethod('POST');
	$r= new reset();
	$r->setName('my-reset');
	$b = new button();
	$b->setName("mybtn");
	$b->setValue('hello');
	$b->setOnClick("msg('m')");
	//$b->setOnClick("msg("+"'m'"+")");
	// $b->setOnClick("msg()");
	$form->addInput($b);
	$form->addInput($r);
	$form->addInput($s);

	// image
	$image = new Image(["src"=>"3.jpg", "name" => "absy"]);
	$image->setName("amr_elabsy");
	$image->setAlt(" Ayman Photo ");
	$image->setTitle('Habd');
	$form->addInput($image);
?>

<body>
<?php $form->renderForm(); ?>

</body>
