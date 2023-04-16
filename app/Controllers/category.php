<?php
class category extends DController {
    public function __construct() {
        parent::__construct();
        $data = array();
    }

    public function index() {
        $this->load->view('header');
        $catemodel = $this->load->model('catemodel');
        $tablename = 'category';
        $data['cate'] = $catemodel->selectAllCate($tablename);
        $this->load->view('listcate', $data);
        $this->load->view('footer');
    }

    public function addcate() {
        $this->load->view('addcate');
    }

    public function insertCate() {
        $catemodel = $this->load->model('catemodel');
        $table = 'category';
        $name = $_POST['name'];
        $data = array('name' => $name);
        $result = $catemodel->insertCate($table, $data);
        if ($result == 1) {
            $noti['msg'] = "done";
        } else {
            $noti['msg'] = "fail";
        }
        header('Location: ' . BASE_URL . 'category');
        exit;
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $catemodel = $this->load->model('catemodel');
            $table = 'category';
            $cond = "category.id = '$id'";
            $name = $_POST['name'];
            $data = array('name' => $name);
            $catemodel->updateCate($table, $data, $cond);
        }
        header('Location: ' . BASE_URL . 'category');
        exit;
    }

    public function delete($id) {
        $catemodel = $this->load->model('catemodel');
        $table = 'category';
        $cond = "category.id = '$id'";
        $result = $catemodel->deleteCate($table, $cond);
        if ($result == 1) {
            $noti['msg'] = "done";
        } else {
            $noti['msg'] = "fail";
        }
        header('Location: ' . BASE_URL . 'category');
        exit;
    }
    
    public function search() {
        $catemodel = $this->load->model('catemodel');
        $table = 'category';
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $category = $catemodel->search($table, $name);
        $data = array('categories' => $category, 'name' => $name);
        $this->load->view('searchCategory', $data);
    }
}
?>
