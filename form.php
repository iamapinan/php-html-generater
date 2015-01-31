<?php
namespace lib;
/*
### how to use.
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

### form input type supported.
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
*/

class form {
  private $form_html = '';
  public $form_option = array("type","label","name","id","class","attribute","validate","data","placeholder");
  public $form_object = array();
  private $form_element;

  function __construct(){
    $this->form_element = json_decode(file_get_contents('../metadata/form_element.json'), true);
  }

  public function form_start($method="POST", $action=null, $attribute=null){
    $this->form_html .= "<div class=\"form-group\">";
    $this->form_html .= "<form method=\"$method\"  class=\"form-horizontal\" action=\"$action\" $attribute>";

  }

  public function form_finish(){
    $this->form_html .= '</div>';
    $this->form_html .= '</form>';
  }

  public function form_validate(){

  }

  public function set_form_object(){
    $html = '';
    $attribute = array();
    for($i=1;$i<=count($this->form_object);$i++){
      $html = $this->form_element[$this->form_object[$i]['type']];
      $attribute['data'] = '';
      if($this->form_element[$this->form_object[$i]['type']]!='')
      {
        @$attribute['name'] = ($this->form_object[$i]['name']!='') ?
        'name="'.$this->form_object[$i]['name'].'" ': '';

        @$attribute['id'] = ($this->form_object[$i]['id']!='') ?
        'id="'.$this->form_object[$i]['id'].'" ': '';

        @$attribute['class'] = ($this->form_object[$i]['class']!='') ?
        'class="'.$this->form_object[$i]['class'].'" ': '';

        @$attribute['placeholder'] = ($this->form_object[$i]['placeholder']!='') ?
        'placeholder="'.$this->form_object[$i]['placeholder'].'" ': '';

        @$attribute['attribute'] = ($this->form_object[$i]['attribute']!='') ?
        $this->form_object[$i]['attribute'] : '';

        @$attribute['value'] = ($this->form_object[$i]['value']!='') ?
        'value="'.$this->form_object[$i]['value'].'" ': '';

        $html = str_replace('{#}', implode('',array_filter($attribute)), $html);

        if($this->form_object[$i]['type']=='select'||$this->form_object[$i]['type']=='datalist'){
          foreach($this->form_object[$i]['data'] as $key => $value)
            @$attribute['data'] .= '<option value="'.$key.'">'.$value.'</option>';
        }
        @$html = str_replace('{##}', $attribute['data'], $html);
      }

      @$this->form_html .= "<div class=\"form-group\"><label for=\"".$this->form_object[$i]['id']."\" class=\"col-sm-3 control-label\">".$this->form_object[$i]['label']."</label><div class=\"col-sm-7\">".$html."</div></div>";
    }


  }
  public function add_custom_object($frm_data){
    @$this->form_html .= $frm_data;
  }

  public function alert_dialog($type,$text){
    $res = '<div class="alert alert-'.$type.' alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>'.$text.'
    </div>';

    return $res;
  }
  public function form_render(){
    return $this->form_html;
  }
}
