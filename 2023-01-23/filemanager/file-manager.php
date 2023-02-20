<?php

// ATPRINTINA VISA ESAMA DUOMENU BAZE
// echo '<pre>' ;
// print_r($_SERVER);

 $dir = './';
 if(isset($_GET['fold'])){
    $dir = $_GET['fold'];
 };

// if(isset($_GET['dir'])) {
//     $dir = $_GET['dir'];
// }
if(isset($_POST['file_name']) and $_POST['file_name'] != '') {
    file_put_contents($dir .'/'. $_POST['file_name'], $_POST['file_contents']);
    header('Location: '. $_SERVER['REQUEST_URI']);
}

// if(isset($_POST['file_name']) AND $_POST['file_name'] != '') {
//     file_put_contents($dir . '/' . $_POST['file_name'], $_POST['file_name']);
//     header('Location: ' . $_SERVER['REQUEST_URI']);
// }
print_r(scandir($dir));
$data = scandir($dir);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="2">Name</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $item) { ?>
                    <tr>
                        <td><?= (is_dir($item)) ? '<a href="?fold='.$item.'">' . $item . '</a>' : $item ?>  </td>
                    </tr>
                <?php } ?>

                <!-- <?php foreach($data as $item) { ?>
                    <tr>
                        <td><?= (is_dir($item)) ? '<a href="?dir=' . $item . '">' . $item . '</a>' : $item ?></td>
                    </tr>
                <?php } ?> -->
            </tbody>
        </table>
        <h2>Create New File</h2>
        <form method="POST">
            <div class="mb-3">
                <label>File name</label>
                <input type="text" name="file_name" class="form-control" />
            </div>
            <div class="mb-3">
                <label>File contents</label>
                <textarea name="file_contents" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</body>
</html>