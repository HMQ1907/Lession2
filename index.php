
<?php
    spl_autoload_register(function($class){
    include_once('system/libs/'.$class.'.php');
    include_once('app/config/config.php');
});
            $url = isset($_GET['url']) ? $_GET['url'] : '';
            if(isset($url[0])){
                $url = trim($url,'/');
                $url = explode('/',filter_var($url,FILTER_SANITIZE_URL));
                include_once('app/Controllers/'.$url['0'].'.php');
                $newController = new $url[0];
                if(isset($url[2])){
                    $newController -> {$url[1]}($url[2]);
                }else{
                    if(isset($url[1])){
                        $newController -> {$url[1]}();
                    }
                }             
            }
           else{
            include_once('app/Controllers/index.php');
            $index = new index();
            $index->homepage();
           }
?>
</div>