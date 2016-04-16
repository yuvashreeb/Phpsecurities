<?php
if (isset($_FILES['upload'])) {
    $allowed_exts = array('jpg', 'jpeg', 'gif');
    $ext = strtolower(substr($_FILES['upload']['name'], strrpos($_FILES['upload']['name'], '.') + 1));
    $errors = array();

    if (in_array($ext, $allowed_exts) === false) {
        $errors[] = 'You can only upload images';
    }

    if ($_FILES['upload']['size'] > 100000) {
        $errors[] = 'The file was too big';
    }

    if (empty($errors)) {
        move_uploaded_file($_FILES['upload']['tmp_name'], "files/{$_FILES['upload']['name']}");
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Upload</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div>
            <?php
            if (isset($errors)) {
                if (empty($errors)) {
                    echo '<a href="files/' . $_FILES['upload']['name'] . '">View Image';
                } else {
                    foreach ($errors as $error) {
                        echo $error;
                    }
                }
            }
            ?>
        </div>
        <div>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="file" name="upload">
                <input type="submit" value="upload">
            </form>
        </div>
    </body>
</html>
