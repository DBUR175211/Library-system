<?php 

    require_once('./config/dbconfig.php');
    $db = new operationss();
    
    if(isset($_GET['D_ID']))
    {
        global $db;
        $ISBN = $_GET['D_ID'];

        if($db->Delete_Record($ISBN))
        {
            $db->set_messsage('<div class="alert alert-danger">  Your Record Has Been Deleted </div>');
            header("location:viewBook.php");
        }
        else
        {
            $db->set_messsage('<div class="alert alert-danger">  Something Went Wrong </div>'); 
        }
    }


?>