<?php
include_once('header.php');
?>
<h2 class="text-center text-info">LIST PRODUCT</h2>
 <div class="container">
        <h3 class="text-warning">Search Product</h3>
        <div class="row">
            <div class="col-md-6">
                <form autocomplete="off" class="mb-4" method="get" action="<?=BASE_URL?>product/search">
                    <div class="form-group">
                        <label>Name:</label>
                        <input name="name" type="text" class="form-control" placeholder="Enter Product name">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </div>
<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Product_name</th>
        <th scope="col">Category</th>
        <th scope="col">Thumbnail</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
            $i = 0;
            foreach ($data as $key => $items) {
                foreach ($items as $item) {
                    echo '<tr>
                                <th scope="row">'.++$i.'</th>
                                <td>'.$item['name'].'</td>
                                <td>'.$item['category_name'].'</td>
                                <td><img width="100px" src="'.BASE_URL.'/img/'.$item['thumbnail'].'" alt=""></td>
                                <td class="d-flex justify-content-start align-items-center">
                                    <a href="'.BASE_URL.'product/delete/'.$item['id'].'">
                                        <button class="btn btn-danger mr-2">DELETE</button>
                                    </a>  
                                    <form method="POST" action="'.BASE_URL.'product/edit/'.$item['id'].'">
                                        <button type="submit" class="btn btn-warning">Update</button>
                                    </form>
                                </td>
                            </tr>';
                }
            }
            ?>
    </tbody>
  </table>
</div>


<?php
include_once('footer.php')
?>
