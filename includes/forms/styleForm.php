<?php
require_once "includes/ktemplate.php";

class styleForm extends Ktemplate{
    public $form;
    public $input;
    public function __construct(Ktemplate $form)
    {
        $this->form=$form;
        $class=get_class($this->form);
       switch ($class){
           case "loginForm":
            echo "<span style='color:black; margin-top:5px; font-size:20px;font-family:Apple Chancery ;'>Login Form</span>";
            break;

            case "registrationForm":
                echo "<span style='color:black; margin-top:5px; font-size:20px;font-family:Apple Chancery ;'>Registration Form</span>";
                break;
       }
    }

//   public function setLabel($input){
//       $this->input=$input;
//       $inputClass=get_class($this->input);
//       switch($inputClass){
//          case "email":
//             echo "<label>Email Address</label>";
//             break;
//       }
//   }



}