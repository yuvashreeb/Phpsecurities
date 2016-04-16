
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
        $pages = scandir('pages');//scandir-returns an array of files and directories of the specified directory.
        unset($pages[0], $pages[1]);//remove first 2 elements from array

        if (isset($_GET['page']) && in_array($_GET['page'], $pages)) {
            include ("pages/{$_GET['page']}");
        } else {
            echo 'That page could not be found';
        }
         ?>
    </body>
</html>
