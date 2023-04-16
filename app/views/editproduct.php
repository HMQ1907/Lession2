<?php
include_once('header.php');
$product = reset($product);
// print_r($categorys);
?>
<h2 class="text-center text-info">UPDATE PRODUCT</h2>
<div class="container">
        <form autocomplete="off" action="<?=BASE_URL?>/product/update/<?=$product['id']?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input value="<?=$product['name']?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select name="category_id" id="category" class="form-control">
                <?php foreach ($categorys as $item): ?>
                    <option <?php if ($product['cate_id'] == $item['id']) echo 'selected' ?> value="<?=$item['id']; ?>"><?=$item['name']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" type="file" name="image" id="image">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>


<?php
include_once('footer.php')
?>