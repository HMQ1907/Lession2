<?php
include_once('header.php');
?>

<h2 class="text-center text-success">List category</h2>

<div class="container">
    <a href="<?=BASE_URL?>category/addcate"><button class="btn btn-success">Add Category</button></a>
</div>
    <div class="container">
        <h3 class="text-warning">Search Category</h3>
        <div class="row">
            <div class="col-md-6">
                <form autocomplete="off" class="mb-4" method="get" action="<?=BASE_URL?>category/search">
                    <div class="form-group">
                        <label>Name:</label>
                        <input name="name" type="text" class="form-control" placeholder="Enter category name">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
        <table class="table table-bordered table-sm table-dark">
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
            foreach ($data as $key => $items) {
                foreach ($items as $item) {
                    echo '<tr>
                                <th scope="row">'.++$i.'</th>
                                <td>'.$item['name'].'</td>
                                <td class="d-flex justify-content-start align-items-center">
                                    <form autocomplete="off" class="d-flex justify-content-start mr-4" method="POST" action="'.BASE_URL.'category/update/'.$item['id'].'">
                                        <input style="with: 100px;" type="text" name="name" class="form-control mr-2" placeholder="Update  new name">
                                        <button type="submit" class="btn btn-warning mr-1">Update</button>
                                       
                                    </form>
                                    <a href="'.BASE_URL.'category/delete/'.$item['id'].'">
                                        <button class="btn btn-danger mr-2">DELETE</button>
                                    </a>  
                                    
                                </td>
                            </tr>';
                }
            }
            ?>
        </tbody>
    </table>
    </div>
    </div>
   
<?php
include_once('footer.php')
?>
