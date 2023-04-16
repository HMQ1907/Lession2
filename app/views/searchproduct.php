<?php
include_once('header.php');
?>
<h2 class="text-center text-success">Search result for "<?php echo $name; ?>"</h2>
<h2 class="text-center text-info">LIST PRODUCT</h2>
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
            if ($data['product'] != null || $data['product'] != '') {
                foreach ($data['product'] as $item) {
                echo '<tr>
                        <td>'.++$i.'</td>
                        <td>'.$item['name'].'</td>
                        <td>'.$item['category_name'].'</td>
                        <td><img width="100px" src="'.BASE_URL.'/img/'.$item['thumbnail'].'" alt=""></td>
                        <td class="d-flex justify-content-start align-items-center">
                                  <form class ="mr-3" method="POST" action="'.BASE_URL.'product/edit/'.$item['id'].'">
                                      <button type="submit" class="btn btn-warning">Update</button>
                                    </form>
                            <a href="'.BASE_URL.'category/delete/'.$item['id'].'"><button class="btn btn-danger mr-2">DELETE</button></a>  
                         </td>
                      </tr>';
                }
            } else {
                echo '<h3 class="text-warning">No results were found</h3>';
            }
            ?>
    </tbody>
  </table>
</div>


<?php
include_once('footer.php')
?>
