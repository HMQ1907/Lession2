<?php
include_once('header.php')
?>
<div class="container">
    <div class="row mt-5 ">
        <div class="col-md-3"><a href="<?=BASE_URL?>product"><button class="btn btn-success">Product</button></a></div>
        <div class="col-md-3"><a href="<?=BASE_URL?>/product/addproduct"><button class="btn btn-success">Add Product</button></a></div>
        <div class="col-md-3"><a href="<?=BASE_URL?>category"><button class="btn btn-warning">Category</button></a></div>
        <div class="col-md-3"><a href="<?=BASE_URL?>/category/addcate"><button class="btn btn-warning">Add Category</button></a></div>
    </div>
</div>
<div class="container mt-4"><img src="https://cdn.dribbble.com/users/3589356/screenshots/7128005/media/ba47f29bfbff3dfe7dc8cee86c7ecadb.png?compress=1&resize=1000x750&vertical=top" alt=""></div>
<?php 
include_once('footer.php');
?>
