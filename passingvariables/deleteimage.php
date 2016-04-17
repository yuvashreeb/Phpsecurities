<?php
$files=scandir('images');
unset($files[0],$files[1]);

if(isset($_GET['image']) && in_array($_GET['image'],$files)){
    unlink("images/{$_GET['image']}");
}
?>