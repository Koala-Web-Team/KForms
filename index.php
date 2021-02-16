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

	// file
	$file = new File([
			"fileTypes" => [ "image", "video" ] // or video
	]);
	$file->addFileType("programming");
	// $file->addAccept("video/mp4");

	$form->addInput($file);

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

	//compobox
	$compo = new CompoBox();
	$compo->setList("mmm");
	$compo->addOption(new Option(["value" => "toty", "text" => "martina"]));
	$form->addInput($compo);

	$compo2 = new CompoBox(["name" => "girgis",'cssClass'=>'multi']);
	$compo2->setMultiple();

	$compo2->addOptions([new Option(["value" => "martina"]),new Option(["value" => "marina"]),new Option(["value" => "mary"])]);
	$form->addInput($compo2);
?>

<body>
<?php $form->renderForm(); ?>
<script src="test.js"></script>
</body>
