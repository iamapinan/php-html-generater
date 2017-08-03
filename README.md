
# About phpclass-form-generater script 
[![Build Status](https://travis-ci.org/iamapinan/phpclass-form-generater.svg?branch=master)](https://travis-ci.org/iamapinan/phpclass-form-generater)

This script will auto generate HTML form output and it very easy to use and work with bootstrap framwork.

## How to use.
Using step start with create form object.

`$frm = new form;` 

Before start you must assign form object and configuration to `$frm->form_object`.
Below is example of use.
```php
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

// Sample alert dialog.
$alert = $frm->alert_dialog('success','Test Message');
$frm->add_custom_object($alert);
$frm->form_start();
$frm->set_form_object();
$frm->form_finish();

// Render the form.
echo $frm->form_render();
```
## Special method.

`alert_dialog` this method will return alert component from bootstrap alert.
```php
$frm->alert_dialog('return type','Test Message');
```
Return type support is like bootstrap alert type.

`add_custom_object` this method use when you need to add your own form object or html code to the form.
```
$frm->add_custom_object('<p>My Example HTML Code</p>');
```

## Form input type supported.

```JSON
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

## Developer
Email [iamapinan@gmail.com](mailto:iamapinan@gmail.com)

### Apache License
Version 2.0, January 2004
http://www.apache.org/licenses/LICENSE-2.0
