<?php 
    require_once('./config/dbconfig.php'); 
    $db = new operationss();
    $db->update();
    $ISBN = $_GET['U_ID'];
    $result = $db->get_record($ISBN);
    $data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Add item</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2> Add Item </h2>
                    </div>
                        <?php $db->Store_record(); ?>
                        <div class="card-body">
                            <form method="POST">
                                ISBN:<input type="number" name="ISBN" placeholder=" ISBN" class="form-control mb-2" readonly value="<?php echo $data['ISBN']; ?>">
                                Title: <input type="text" name="title" placeholder=" Title" class="form-control mb-2" readonly value="<?php echo $data['title']; ?>">
                                Author: <input type="text" name="author" placeholder=" Author" class="form-control mb-2" readonly value="<?php echo $data['author']; ?>">
                                Edition: <input type="number" name="edition" placeholder=" Edition" class="form-control mb-2" readonly value="<?php echo $data['edition']; ?>">	
                                Price: <input type="number" name="price" placeholder=" Price" class="form-control mb-2" readonly value="<?php echo $data['price']; ?>">
				No. of copy:<br>(Count 1 up to add item) <input type="number" name="NoOfCopy" placeholder="No. of copy" class="form-control mb-2" required value="<?php echo $data['NoOfCopy']; ?>">
                        </div>
                    <div class="card-footer">
                            <button class="btn btn-success" name="btn_update"> Add Item </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>