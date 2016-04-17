<!DOCTYPE html>
<html>
    <head>
        <title>null byte</title>
    </head>
    <body>
        <?php
        $files=scandir('pages');
        unset($files[0],$files[1]);
        if(isset($_GET['file'])&& in_array("{$_GET['file']}.txt",$files)){
            echo "<h3>contents of 'pages/{$_GET['file']}.txt'</h3>";
            include("pages/{$_GET['file']}.txt");
        }
        
        
        ?>
    </body>
</html>