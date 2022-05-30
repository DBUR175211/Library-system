



<?php 
    require_once('./config/dbconfig.php'); 
   

$host="localhost";
$user="root";
$password="";
$database="library";
$ISBN="";
$title="";
$author="";
$edition="";
$price="";
$NoOfCopy="";
$ID="";
$FirstName="";
$LastName="";
$NoOfCheckedOut="";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try{
$connect=mysqli_connect($host, $user,$password,$database);
if($connect)
echo"connected succesfully";
}
catch(mysqli_sql_exception $ex)
{
echo'error';
}
function getPosts()
{
$posts=array();
$posts[0]=$_POST['ISBN'];
$posts[1]=$_POST['title'];
$posts[2]=$_POST['author'];
$posts[3]=$_POST['edition'];

$posts[5]=$_POST['NoOfCopy'];
$posts[6]=$_POST['ID'];
$posts[7]=$_POST['FirstName'];
$posts[8]=$_POST['LastName'];
$posts[9]=$_POST['NoOfCheckedOut'];
return $posts;
}
//search
if(isset($_POST['search']))
{
$data=getPosts();
$search_Query="SELECT * FROM books WHERE ISBN=$data[0]";
$search_Result=mysqli_query($connect,$search_Query);
if($search_Result)
{
	if(mysqli_num_rows($search_Result))
		{
			while($row=mysqli_fetch_array($search_Result))
			{
			$ISBN=$row['ISBN'];
			$title=$row['title'];
			$author=$row['author'];
			$edition=$row['edition'];
			$price=$row['price'];
			$NoOfCopy=$row['NoOfCopy'];
			}
		}
	else
	{
	echo 'no data for this ISBN';
}
}
else
{
echo'result error';
}
}
//search customer
if(isset($_POST['search1']))
{
$data=getPosts();
$search_Query1="SELECT * FROM customers WHERE ID=$data[6]";
$search_Result1=mysqli_query($connect,$search_Query1);
if($search_Result1)
{
	if(mysqli_num_rows($search_Result1))
		{
			while($row=mysqli_fetch_array($search_Result1))
			{
			$ID=$row['ID'];
			$FirstName=$row['FirstName'];
			$LastName=$row['LastName'];
			
			}
		}
	else
	{
	echo 'no data for this ID';
}
}
else
{
echo'result error';
}
}
?>
