<link rel="stylesheet" href="includes/forms/assets/css/forms_style.css">
<?php

include "includes/forms/KForm.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	echo "request is post";
	echo "<pre>";
	var_dump( $_POST );
	echo "</pre>";
$myArr=array('ramaj','test');
	$rules = [
		"name" => "required|min:10",
		"email" => "min:3",
		"tel"=>"tel",
		"test"=>"in:ramaj",
		"url"=>"url",		
	];
	$validator = new KValidation($_POST, $rules);
	$validator->validate();
}
KoalaSessionHandler::init();
// KoalaSessionHandler::fresh();
var_dump(KoalaSessionHandler::getErrors());

////Martin
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// 	$rules = [
// 		// "email_confirmation" => "required|end_with:tina|comfirmed",
// 		// "image" => "image",
// 		"Martina" => "required",
// 	];
// 	$validator = new KValidation($_POST, $rules);
// 	$validator->validate();
// }
// KoalaSessionHandler::init();
// var_dump(KoalaSessionHandler::getErrors());

// form
//$form = new Form([
//		"meTHod" => "post",
//		"action" => "index.php",
//		"cssClass" => "classTest"
//]);
//$form->addCssClass("class1 class2");
//$form->addCssClass("class3 class4");

// 	// time
// 	$firstTime = new time();
// 	$firstTime->setMax(7);
// 	$firstTime->setName("toty");

// 	$secondTime = new time(["min"=>"7","value"=>"mkmk"]);

// 	$form->addInput( $firstTime );
// 	$form->addInput( $secondTime );

// 	// hidden input
// 	$hiddenInput = new hidden();
// 	$hiddenInput->setName("myname");
// 	$hiddenInput->setId("myname_id");
// 	$form->addInput($hiddenInput);


// $secondTime = new time(["min"=>"7","value"=>"mkmk"]);
// $form->addInput( $firstTime );
// $form->addInput( $secondTime );

// $file = new File([
// 		"fileTypes" => [ "image", "video" ] // or video
// ]);
// $file->addFileType("programming");
// // $file->addAccept("video/mp4");

// $form->addInput($file);
// // $form->addInputs( [ new text(), new text() ] );
// // $form->addInput( new submit() );

// 	// color input
// 	$colorInput = new color();
// 	$colorInput->setName("mycolor");
// 	$colorInput->setRgbColor('rgb(123,125,132)');
// 	//$colorInput->setHexaColor('#fffffff');
// 	$form->addInput($colorInput);


// 	// comboBox
// 	// select 1
// 	$select1 = new select(["name"=>"martina"]);
// 	$select1->setId("99");
// 	// option 1
// 	$option1 = new option(["name"=>"martina", "value"=>"martina"]);
// 	$option1->setId("99");
// 	$option1->setText("martina");
// 	// option 2
// 	$option2 = new option();
// 	$option2->setId("100");
// 	$option2->setText("Ayman");
// 	// add options to select
// 	$select1->addOption($option2);
// 	$select1->addOption($option1);
// 	$form->addInput($select1);

// 	// anther select
// 	$select12 = new select(["name"=>"martina"]);
// 	$select12->setId("997");
// 	// option 1
// 	$option12 = new option(["name"=>"martina", "value"=>"martina"]);
// 	$option12->setId("99");
// 	$option12->setText("martina2");
// 	// option 2
// 	$option22 = new option();
// 	$option22->setId("100");
// 	$option22->setText("Ayman2");
// 	// add option to select as array
// 	$select12->addOptions([$option22,$option12]);
// 	$form->addInput($select12);

// 	// Button


// 	$s= new submit();
// 	$s->setFormaction('index.php');
// 	$s->setFormmethod('POST');
// 	$r= new reset();
// 	$r->setName('my-reset');
// 	$b = new button();
// 	$b->setName("mybtn");
// 	$b->setValue('hello');
// 	// $b->setOnClick('msg',['ramaj','toka','mohammed']);
// 	$b->setOnClick('msg','ramaj','toka','mohammed');
// 	$pass= new password();
// 	$pass->setOnChange('msg','abdy');
// 	// $b->setOnCopy('msg','ramaj','mohammed');
// 	$form->addInput($b);
// 	$form->addInput($r);
// 	$form->addInput($s);
// 	$form->addInput($pass);


// 	// image
// 	$image = new Image(["src"=>"3.jpg", "name" => "absy"]);
// 	$image->setName("amr_elabsy");
// 	$image->setAlt(" Ayman Photo ");
// 	$image->setTitle('Habd');
// 	$form->addInput($image);

// 	$rules = [
// 		"name" => "required,string",
// 	     "email" => "required,unique"
// 		];
// 	$data =[
// 		"name" => "Ramaj",
// 		"email"=>"Roro@gmail.com"
// 	];

// 	$validation = new Kvalidation($data, $rules);
// 	var_dump($validation->getValidationErrorMessage("name","required"));
// 	var_dump($validation->getValidationErrorMessage("email","unique"));

// $registrationForm=new registrationForm($form);
// $style = new styleForm($registrationForm);
// $login = new loginForm($form);
// $style = new styleForm($login);

//	$name = new Text();
//	$name->setId( "test" );
//	$name->setPlaceholder( "Placeholder Test" );
	//var_dump($name);
//	$login = new LoginForm(
//			[
//				"method" => "GET",
//				"action" => "index.php"
//			],
//			"Tel"
//	);

	// $login->createLoginForm($name);
// $registrationForm= new registrationForm($form);



// $login->createLoginForm($form);




// $registrationForm->email->setName("myEmail");
// $registrationForm->email->setPlaceholder("Text@gmail.com");
// $registrationForm->password->setName("myPass");
// $registrationForm->password->setPlaceholder("Enter Pass");


// $form = new Form(["method" => "post"]);
// $inputName = new Text(['name' => "name"]);
// $inputName->setLabel("My Name");
// $email = new Email(["name" => "email"]);
// $email->setLabel("Enter Your Email");
// $submit = new Submit();

// $form->setInputsStyle("koala-float-label");

// $form->addInputs([$inputName, $email, $submit]);
// $phone = new Tel(["name" => "tel"]);
// $url = new Url(["name" => "url"]);
// $test = new Text(['name' => "test"]);
// // $first = new Text(['name' => "first"]);
// $submit = new Submit();
// $form->addInputs([$inputName,$email,$phone,$test,$url,$submit]);

// $form->renderForm();

$login = new LoginForm(
	[
		"method" => "post",
		"action" => "index.php"
	],
	[
		"type"=>"Tel",
		"name"=>"Martina"
	],
	[
		"name" => "toty",
	]
);
?>

<body>
<?php  $login->renderForm(); ?>
<script src="includes/forms/assets/js/forms_script.js"></script>

</body>
