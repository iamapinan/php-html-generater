## how to use.
$frm = new lib\form;
$frm->form_object = array(
  1=>array(
    "type"=>"text",
    "label"=>"List name",
    "name"=>"qlname",
    "class"=>"form-control",
    "value"=>"test data",
    "placeholder"=>"ชื่อของรายการคำถาม"
  ),
  2=>array(
    "type"=>"select",
    "label"=>"จำนวนคำถาม",
    "name"=>"qlsize",
    "class"=>"form-control",
    "attribute"=>"disabled",
    "data"=>array(
      "50"=>"50",
      "100"=>"100"
    )
  ),
  3=>array(
    "type"=>"checkbox",
    "label"=>"Agree",
    "name"=>"agree",
    "attribute"=>"checked",
    "class"=>"checkbox"
  ),
  4=>array(
    "type"=>"submit",
    "class"=>"btn btn-primary",
    "value"=>" Create "
  ),
);

$alert = $frm->alert_dialog('success','Test Message');
$frm->add_custom_object($alert);
$frm->form_start();
$frm->set_form_object();
$frm->form_finish();

echo $frm->form_render();

## form input type supported.
"text"
"password"
"email"
"file"
"date"
"datetime"
"month"
"color"
"number"
"range"
"search"
"tel"
"time"
"url"
"week"
"radio"
"checkbox"
"button"
"submit"
"select"
"textarea"
