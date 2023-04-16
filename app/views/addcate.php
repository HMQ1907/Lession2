<?php
include_once('header.php');
?>
<div class="container">
    <h3 class="text-warning">Add Category</h3>
    <form autocomplete="off" method="post" action="<?=BASE_URL?>category/insertCate">
        <div class="form-group">
            <label>Name</label>
            <input name="name" type="name" class="form-control" placeholder="Category name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php
include_once('footer.php');
?> 
