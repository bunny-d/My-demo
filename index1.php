<?php

//$id is either 1,2 or 3. It is corresponding to the tables in the Data base.
//$status is either Create, View, Edit or Delete.
<<<<<<< HEAD
=======
//No MVC.
>>>>>>> test
include 'operations.php';
	if (isset($_GET['id']))
		$id = $_GET['id'];
	
	if (isset($_GET['status']))
		$status = $_GET['status'];

	if($status == 'create'){
		session_start();
		$_SESSION['id']=$id;
		header("location:create/create$id.php");						
	}
	elseif($status == 'view' || $status == 'edit' || $status == 'delete'){
		$operationsObject = new operations($id);
		$result=$operationsObject->view();
		
		$dbArr=array();	
		$a =0;
		$numRows = mysql_num_rows($result);
		if($numRows == 0){
			echo "<h1 align = 'center'>There is no data in the database. Kindly create one "."<br>";
			echo '<a href = "main_page.html">Home Page</a></h1>';
			die;
		}
		while($row=mysql_fetch_row($result))
		{
			$dbArr[$a][0]=$row[0];			//ID	
			$dbArr[$a][1]=$row[1];			//category Id

			switch($id){
				case 1:
					$dbArr[$a][2]=$row[2];
					$dbArr[$a][3]=$row[3];
					$dbArr[$a][4]=$row[4];
					$dbArr[$a][5]=$row[5];
					$dbArr[$a][6]=$row[6];
					break;
				case 2:
					$dbArr[$a][2]=$row[2];
					$dbArr[$a][3]=$row[3];	
					$dbArr[$a][4]=$row[4];
					break;					
				case 3:
					$dbArr[$a][2]=$row[2];
			}
			$a++;
		}
		session_start();
		$_SESSION['str'] = urlencode(serialize($dbArr));
		$_SESSION['id'] = $id;
		$_SESSION['status'] = $status;
		header("Location:view/view$id.php", true, 303);	
		die;

/*
		if ($status == 'view')
		echo "<a href=\"view/view$id.php?id=$id&status=$status&str=".urlencode(serialize($dbArr)) ."\">Click here to view</a>";
		elseif($status == 'edit')
		echo "<a href=\"view/view$id.php?id=$id&status=$status&str=".urlencode(serialize($dbArr)) ."\">Click here to edit</a>";
		else
		echo "<a href=\"view/view$id.php?id=$id&status=$status&str=".urlencode(serialize($dbArr)) ."\">Click here to delete</a>";
*/
	}
	else{
	}
?>
