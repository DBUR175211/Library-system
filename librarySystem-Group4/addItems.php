<?php 
    
    require_once('./config/dbconfig.php'); 
    $db = new operationss();
    $result=$db->view_record();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Add Items</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="text-center text-dark"> Book Records</h2>
                    </div>
                    <div class="card-body">
                        <?php
                              $db->display_message(); 
                              $db->display_message();
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <td style="width: 10%"> ISBN </td>
                                <td style="width: 10%"> Title </td>
                                <td style="width: 20%"> Author </td>
                                <td style="width: 20%"> Edition</td>
                                <td style="width: 20%"> Price </td>
				<td style="width: 20%"> No. of copy </td>
                                <td style="width: 20" colspan="2">Operations</td>
                            </tr>
                            <tr>
                                <?php 
                                    while($data = mysqli_fetch_assoc($result))
                                    {
                                ?>
                                    <td><?php echo $data['ISBN'] ?></td>
                                    <td><?php echo $data['title'] ?></td>
                                    <td><?php echo $data['author'] ?></td>
                                    <td><?php echo $data['edition'] ?></td>
                                    <td><?php echo $data['price'] ?></td>
				    <td><?php echo $data['NoOfCopy'] ?></td>
				    <td><a href="addItem.php?U_ID=<?php echo $data['ISBN'] ?>" class="btn btn-success">Add Item</a></td>
                            </tr>
                            <?php
                                    }
                                ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>