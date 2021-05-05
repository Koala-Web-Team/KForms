<?php

include "includes/forms/KForm.php";

// form
$form = new Form([
	"meTHod" => "post",
	"action" => "result.php",
	"cssClass" => "classTest"
]);
$form->addCssClass("class1 class2");
$form->addCssClass("class3 class4");

$name = new text();
$name->setName('mido');
$form->addInput($name);


$name1 = new text();
$name1->setName('mizo');
$form->addInput($name1);
$name1->renderErrors();


$name3 = new text();
$name3->setName('linda');
$form->addInput($name3);

$name4 = new text();
$name4->setName('migo');
$form->addInput($name4);

$s= new submit();
$form->addInput($s);


$form2 = new Form([
	"meTHod" => "post",
	"action" => "result.php",
	"cssClass" => "classTest"
]);
$form2->addCssClass("class1 class2");
$form2->addCssClass("class3 class4");

$name5 = new text();
$name5->setName('fgdg');
$form2->addInput($name5);

$name6 = new text();
$name6->setName('gfdgdf');
$form2->addInput($name6);


$name7 = new text();
$name7->setName('fgdgf');
$form2->addInput($name7);

$name8 = new text();
$name8->setName('fgfh');
$form2->addInput($name8);

$s1= new submit();
$form2->addInput($s1);


//	// time
//	$firstTime = new time();
//	$firstTime->setMax(7);
//	$firstTime->setName("toty");
//
//	$secondTime = new time(["min"=>"7","value"=>"mkmk"]);
//
//	$form->addInput( $firstTime );
//	$form->addInput( $secondTime );
//
//	// hidden input
//	$hiddenInput = new hidden();
//	$hiddenInput->setName("myname");
//	$hiddenInput->setId("myname_id");
//	$form->addInput($hiddenInput);
//
//	// file
//	$file = new File([
//			"fileTypes" => [ "image", "video" ] // or video
//	]);
//	$file->addFileType("programming");
//	// $file->addAccept("video/mp4");
//
//	$form->addInput($file);
//
//	// color input
//	$colorInput = new color();
//	$colorInput->setName("mycolor");
//	$colorInput->setRgbColor('rgb(123,125,132)');
//	//$colorInput->setHexaColor('#fffffff');
//	$form->addInput($colorInput);
//
//
//	// comboBox
//	// select 1
//	$select1 = new select(["name"=>"martina"]);
//	$select1->setId("99");
//	// option 1
//	$option1 = new option(["name"=>"martina", "value"=>"martina"]);
//	$option1->setId("99");
//	$option1->setText("martina");
//	// option 2
//	$option2 = new option();
//	$option2->setId("100");
//	$option2->setText("Ayman");
//	// add options to select
//	$select1->addOption($option2);
//	$select1->addOption($option1);
//	$form->addInput($select1);
//
//	// anther select
//	$select12 = new select(["name"=>"martina"]);
//	$select12->setId("997");
//	// option 1
//	$option12 = new option(["name"=>"martina", "value"=>"martina"]);
//	$option12->setId("99");
//	$option12->setText("martina2");
//	// option 2
//	$option22 = new option();
//	$option22->setId("100");
//	$option22->setText("Ayman2");
//	// add option to select as array
//	$select12->addOptions([$option22,$option12]);
//	$form->addInput($select12);
//
//	// Button
//	$s= new submit();
//	$s->setFormaction('index.php');
//	$s->setFormmethod('POST');
//	$r= new reset();
//	$r->setName('my-reset');
//	$b = new button();
//	$b->setName("mybtn");
//	$b->setValue('hello');
//	$b->setOnClick("msg('m')");
//	//$b->setOnClick("msg("+"'m'"+")");
//	// $b->setOnClick("msg()");
//	$form->addInput($b);
//	$form->addInput($r);
//	$form->addInput($s);
//
//	// image
//	$image = new Image(["src"=>"3.jpg", "name" => "absy"]);
//	$image->setName("amr_elabsy");
//	$image->setAlt(" Ayman Photo ");
//	$image->setTitle('Habd');
//	$form->addInput($image);
//
//
//	//compobox
//	$compo = new CompoBox();
//	$compo->setList("mmm");
//	$compo->addOption(new Option(["value" => "toty", "text" => "martina"]));
//	$form->addInput($compo);
//
//	$compo2 = new CompoBox(["name" => "girgis"]);
//	$compo2->addOptions([new Option(["value" => "martina@gmail.com"]),new Option(["value" => "marina@gmail.com"]),new Option(["value" => "mary@gmail.com"])]);
//	$compo2->setMultiple("multiple");
//	$form->addInput($compo2);


?>

<body>

<?php

$form->renderForm();



$form2->renderForm();

?>


<script>

	class KValidation extends HTMLElement{
		constructor() {
			super();
		}
	}

	customElements.define('kvalidation',KValidation);

	var validate = new KValidation();

	validate.innerHTML = "koala validation";
	validate.id = "combbox";
	document.body.appendChild(validate);
</script>

<redapple>this color red</redapple>

<script>


	document.addEventListener("DOMContentLoaded", function () {
		const separator = ',';
		for (const input of document.getElementsByClassName("multiple")) {
			if (!input.multiple) {
				continue;
			}
			if (input.list instanceof HTMLDataListElement) {
				const optionsValues = Array.from(input.list.options).map(opt => opt.value);
				let valueCount = input.value.split(separator).length;
				input.addEventListener("input", () => {
					const currentValueCount = input.value.split(separator).length;
					// Do not update list if the user doesn't add/remove a separator
					// Current value: "a, b, c"; New value: "a, b, cd" => Do not change the list
					// Current value: "a, b, c"; New value: "a, b, c," => Update the list
					// Current value: "a, b, c"; New value: "a, b" => Update the list
					if (valueCount !== currentValueCount) {
						const lsIndex = input.value.lastIndexOf(separator);
						const str = lsIndex !== -1 ? input.value.substr(0, lsIndex) + separator : "";
						filldatalist(input, optionsValues, str);
						valueCount = currentValueCount;
					}
				});
			}
		}
		function filldatalist(input, optionValues, optionPrefix) {
			const list = input.list;
			if (list && optionValues.length > 0) {
				list.innerHTML = "";
				const usedOptions = optionPrefix.split(separator).map(value => value.trim());
				for (const optionsValue of optionValues) {
					if (usedOptions.indexOf(optionsValue) < 0) {
						const option = document.createElement("option");
						option.value = optionPrefix + optionsValue;
						list.append(option);
					}
				}
			}
		}
	});
</script>
</body>
