<?php

//Form Variables
$username = $_POST['username'];
$password = $_POST['password'];

//Display Form Variables
//echo "username entered: $username <br /> password entered: $password <br /><br />";

//DB Connection Variables
$db_host = "localhost";
$db_user = "root";
$db_pass = "mypass";
$db_name = "auth";
$db_tbl_name = "credentials";

//DB Queries
$__SELECT_ALL = "select * from $db_tbl_name";

//Connect to db
$con = mysql_connect($db_host, $db_user, $db_pass);
if(!con)
{
	die('Could not connect to database' . mysql_error());
}

//Select db
mysql_select_db($db_name, $con);

//Display database contents

/*
echo "Contents of Database Table: $db_tbl_name: <br /><br />";

$__contents = mysql_query($__SELECT_ALL, $con);
while($row = mysql_fetch_array($__contents))
{
	echo "Username: ".$row['user_name']."Password: ".$row['pass_word']."<br />";
}
*/

//Authenticate User Via Un-Hashed Password
$__auth_username = "select * from $db_tbl_name where user_name='$username'";

if ($result = mysql_query($__auth_username))
{
	if(mysql_num_rows($result) > 0)
	{
		while($row = mysql_fetch_assoc($result))
		{
			$uname = $row['user_name'];
			$pword = $row['pass_word'];
		
			if($username == $uname)
			{
				echo "UCID valid <br />";
			
				if($password == $pword)
				{
					echo "password valid <br />";
				}
				else
				{
					echo "password invalid <br />";
				}
			}
		}
	}
	else
	{
		echo "invalid UCID <br />";
	}
}
else
{
	echo mysql_error();
}

//Terminate DB Connection
mysql_close($con);

?>


<br /><br /><a href="http://127.0.0.1/login_system/login.html">Back to login</a>
