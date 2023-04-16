<?php
class index extends DController{
    public $data =array();
    public $load;
    function __construct()
    {
        parent::__construct();
    }
    public function homepage(){
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }
}
?>