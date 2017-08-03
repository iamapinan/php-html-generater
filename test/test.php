<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" >
<script src="/bootstrap/js/bootstrap.min.js" ></script>

<?php



class formTest extends PHPUnit_Framework_TestCase
{
    private $frm;
    public function setUp()
    {
        include 'form.php';
        $this->frm = new form;
        $this->frm->form_object = array(
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

        $alert = $this->frm->alert_dialog('success','Test Alert Message');
        $this->frm->add_custom_object($alert);
    }

    public function testWhat()
    {
        $this->frm->form_start();
        $this->frm->set_form_object();
        $this->frm->form_finish();

        echo $this->frm->form_render();
    }
}


