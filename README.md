[Email to me](mailto:iamapinan@gmail.com)

### About phpclass-form-generater script
This script will auto generate HTML form output and it very easy to use.

## How to use.
Using step start with create form object.

`$frm = new form;` or call using php namespace like this `$frm = new lib\form;`

*You must change `lib\` to  `form.php` storing path and change the `namespace lib;` in this code to your path too*

Before start you must assign form object and configuration to `$frm->form_object`.
Below is example of use.
```
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
```
###Special method.

`alert_dialog` this method will return alert box like bootstrap alert.
```
$frm->alert_dialog('return type','Test Message');
```
Return type support is like bootstrap alert type.

`add_custom_object` this method use when you need to add your own form object or html code to the form.
```
$frm->add_custom_object('<p>My Example HTML Code</p>');
```

## form input type supported.

```
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
```

### Apache License
Version 2.0, January 2004
                   http://www.apache.org/licenses/LICENSE-2.0
