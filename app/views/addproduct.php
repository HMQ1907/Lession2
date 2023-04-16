<?php 
include_once 'header.php';
?>
<div class="container">
    <h3 class="text-center text-success">Add your Product</h3>
    <form autocomplete="off" action="<?= BASE_URL ?>product/insertProduct" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select name="category_id" id="category" class="form-control">
                <option value="">Choose Category</option>
                <?php foreach ($cate as $item): ?>
                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" type="file" name="image" id="image">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
<?php 
include_once 'footer.php';
?>
