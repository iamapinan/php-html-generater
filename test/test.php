<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" >
<script src="/bootstrap/js/bootstrap.min.js" ></script>

<?php
include '../form.php';

$frm = new form;
$frm->form_object = array(
  1=>array(
    "type"=>"text",
    "label"=>"Your name",
    "name"=>"fullname",
    "class"=>"form-control",
    "value"=>"John Doe",
    "placeholder"=>"Firstname Lastname"
  ),
  2=>array(
    "type"=>"select",
    "label"=>"Age",
    "name"=>"age",
    "class"=>"form-control",
    "data"=>array(
      "1-10"=>"1-10",
      "11-20"=>"11-20",
      "21-30"=>"21-30"
    )
  ),
  3=>array(
    "type"=>"checkbox",
    "label"=>"Agree to term of services",
    "name"=>"agree",
    "attribute"=>"checked",
    "class"=>"checkbox"
  ),
  4=>array(
    "type"=>"submit",
    "class"=>"btn btn-primary btn-large",
    "value"=>"Submit"
  ),
);

$alert = $frm->alert_dialog('success','Test Alert Message');
$frm->add_custom_object($alert);
$frm->form_start();
$frm->set_form_object();
$frm->form_finish();

echo $frm->form_render();