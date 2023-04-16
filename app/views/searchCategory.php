<?php
include_once('header.php');
?>

<h2 class="text-center text-success">Search result for "<?php echo $name; ?>"</h2>

<div class="container-fluid">
    <form autocomplete="off" class="mb-4" method="get" action="<?=BASE_URL?>category/search">
        <div class="form-group">
            <label>Name:</label>
            <input name="name" type="text" class="form-control" placeholder="Enter category name">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            if ($data['categories'] != null || $data['categories'] != '') {
                foreach ($data['categories'] as $item) {
                    echo '<tr>
                        <td>'.++$i.'</td>
                        <td>'.$item['name'].'</td>
                        <td class="d-flex justify-content-start align-items-center">
                            <form class="d-flex justify-content-start mr-4 " method="POST" action="'.BASE_URL.'category/update/'.$item['id'].'">
                                <input type="text" name="name" class="form-control mr-2" placeholder="Update new name">    
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
include_once('footer.php');
?>
