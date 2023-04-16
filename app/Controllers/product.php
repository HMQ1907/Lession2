<?php
class product extends DController{
    public function __construct()
    {   
        parent::__construct();
        $data = array();
    }
    public function index(){
        $this->load->view('header');
        $productmodel = $this->load->model('productmodel');
        $tablename = 'product';
        $data['cate'] = $productmodel->selectAllProduct($tablename);
        $this->load->view('listproduct', $data);
        $this->load->view('footer');
    }
    public function addproduct(){
        $catemodel = $this->load->model('catemodel');
        $tablename = 'category';
        $data['product'] = $catemodel->selectAllCate($tablename);
        $this->load->view('addproduct',$data);
    }
    public function insertProduct()
    {
    $table = 'product';

    if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $category = $_POST['category_id'];
    if (isset($_FILES['image']) && $_FILES['image']['name']) {
        $image = $_FILES['image'];
        $filename = $image['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        $filename = uniqid() . '.' . $extension;
        $imagePath = "img/" . $filename;
        move_uploaded_file($image['tmp_name'], $imagePath);
    } else {
        echo "Please return and choose an image";
        exit;
    }

    $data = array(
        'name' => $name,
        'cate_id' => $category,
        'thumbnail' => $filename
    );

        try{
        $productmodel = $this->load->model('productmodel');
        $result = $productmodel->insertProduct($table, $data);
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        } 
        if ($result == 1) {
            $notifi['msg'] = "Add Product successfully";        
        } else {
            $notifi['msg'] = "Add Product fail";    
        }
         header('Location: ' . BASE_URL . 'product');
            exit;
        }
    }
    public function delete($id) {
        $productmodel = $this->load->model('productmodel');
        $table = 'product';
        $cond = "product.id = '$id'";
        try{
        $result = $productmodel->deleteProduct($table, $cond);
        if ($result == 1) {
            $noti['msg'] = "done";
        } else {
            $noti['msg'] = "fail";
        }
        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        } 
        header('Location: ' . BASE_URL . 'product');
        exit;
    }
    public function edit($id) {
        $productModel = $this->load->model('productmodel');
        $product = $productModel->getProductById($id);   
        $cateModel = $this->load->model('catemodel');    
        $categorys = $cateModel->selectAllCate('category');

        $data = array(
        'product' => $product,
        'categorys' => $categorys
        );

        $this->load->view('editproduct', $data);
    }

    public function update($id) {
        $productModel = $this->load->model('productmodel');
        $product = $productModel->getProductById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $cate_id = $_POST['category_id'];
        if (isset($_FILES['image']) && $_FILES['image']['name']) {
            $image = $_FILES['image'];
            $filename = $image['name'];
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $filename = uniqid() . '.' . $extension;
            $imagePath = "img/" . $filename;
            move_uploaded_file($image['tmp_name'], $imagePath);
        } else {
            $filename = $product['thumbnail'];
        }           
        $data = array(
            'name' => $name,
            'thumbnail' => $filename,
            'cate_id' => $cate_id
        );
        $result = $productModel->updateProduct('product', $data, "id = $id");
        if ($result) {
            echo "Product updated successfully!";
        } else {
            echo "Failed to update product";
        }
    }
    header('Location: ' . BASE_URL . 'product');
    exit;
    }
    public function search() {
        $productmodel = $this->load->model('productmodel');
        $table = 'product';
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $product = $productmodel->search($table, $name);
        $data = array('product' => $product, 'name' => $name);
        $this->load->view('searchproduct', $data);
    }

}
?>