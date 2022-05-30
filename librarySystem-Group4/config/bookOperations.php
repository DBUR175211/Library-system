<?php 

    
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class operationss extends dbconfig
    {
        // Insert Record in the Database
        public function Store_Record()
        {
            global $db;
            if(isset($_POST['btn_save']))
            {
                $ISBN = $db->check($_POST['ISBN']);
                $title = $db->check($_POST['title']);
                $author = $db->check($_POST['author']);
                $edition = $db->check($_POST['edition']);
		$price = $db->check($_POST['price']);
		$NoOfCopy = $db->check($_POST['NoOfCopy']);

                if($this->insert_record($ISBN,$title,$author,$edition,$price,$NoOfCopy))
                {
                    echo '<div class="alert alert-success"> Your Record Has Been Saved :) </div>';
                }
                else
                {
                    echo '<div class="alert alert-danger"> Failed </div>';
                }
            }
        }

        // Insert Record in the Database Using Query    
        function insert_record($a,$b,$c,$d,$e,$f)
        {
            global $db;
            $query = "insert into books (ISBN,title, author,edition,price,NoOfCopy) values('$a','$b','$c','$d','$e','$f')";
            $result = mysqli_query($db->connection,$query);

            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }


        // View Database Record
        public function view_record()
        {
            global $db;
            $query = "select * from books";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }

        // Get Particular Record
        public function get_record($ISBN)
        {
            global $db;
            $sql = "select * from books where ISBN='$ISBN'";
            $data = mysqli_query($db->connection,$sql);
            return $data;

        }

        // Update Record
        public function update()
        {
            global $db;

            if(isset($_POST['btn_update']))
            {
                $ISBN = $db->check($_POST['ISBN']);
                $title = $db->check($_POST['title']);
                $author = $db->check($_POST['author']);
                $edition = $db->check($_POST['edition']);
                $price = $db->check($_POST['price']);
		$NoOfCopy = $db->check($_POST['NoOfCopy']);

                if($this->update_record($ISBN,$title,$author,$edition,$price,$NoOfCopy ))
                {
                    $this->set_messsage('<div class="alert alert-success"> Your Record Has Been Updated : )</div>');
                    header("location:viewBook.php");
                }
                else
                {   
                    $this->set_messsage('<div class="alert alert-success"> Something Went Wrong : )</div>');
                }

               
            }
        }

        // Update Function 2
        public function update_record($ISBN,$title,$author,$edition,$price,$NoOfCopy)
        {
            global $db;
            $sql = "update books set ISBN='$ISBN', title='$title', author='$author', edition='$edition', price='$price', NoOfCopy='$NoOfCopy' where ISBN='$ISBN'";
            $result = mysqli_query($db->connection,$sql);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }



        // Set Session Message
        public function set_messsage($msg)
        {
            if(!empty($msg))
            {
                $_SESSION['Message']=$msg;
            }
            else
            {
                $msg = "";
            }
        }

        // Display Session Message
        public function display_message()
        {
            if(isset($_SESSION['Message']))
            {
                echo $_SESSION['Message'];
                unset($_SESSION['Message']);
            }
        }

        // Delete Record
        public function Delete_Record($ISBN)
        {
            global $db;
            $query = "delete from books where ISBN='$ISBN'";
            $result = mysqli_query($db->connection,$query);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

      

    }




?>

