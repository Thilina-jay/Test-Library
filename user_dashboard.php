<?php
	session_start();
	function get_user_issue_book_count(){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"library_system");
		$user_issue_book_count = 0;
		$query = "select count(*) as user_issue_book_count from issued_books where student_id = $_SESSION[id]";
		$query_run = mysqli_query($connection,$query);
		while ($row = mysqli_fetch_assoc($query_run)){
			$user_issue_book_count = $row['user_issue_book_count'];
		}
		return($user_issue_book_count);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
      

        body {
            background-color: #f8f9fa;
        }

        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar-brand img {
            height: 30px;
        }

        #main_content {
            padding: 50px;
            background-color: whitesmoke;
        }

        .container {
            margin-top: 30px;
        }

        .box {
            cursor: pointer;
            padding: 20px;
            height: 250px;
            border-radius: 10px;
            text-align: center;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .box:hover {
            transform: scale(1.05);
        }

        .box h4 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: white;
        }

        .box button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            margin-bottom: 15px;
        }

        .box .btn-secondary, .box .btn-outline-secondary {
            width: 100%;
            margin-bottom: 5px;
            color: #ffffff;
        }

        .box .btn-outline-secondary {
            background-color: transparent;
            border: 1px solid #007bff;
        }

        .box .btn-group {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .box button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
			<div class="navbar-header">
            <a class="navbar-brand" href="signup.php">
                <img src="book.png" alt="BookByte Logo">
            </a>
			</div>
			<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['username'];?></strong></span></font>
		    <ul class="nav navbar-nav navbar-right">
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="view_profile.php">View Profile</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="change_password.php">Change Password</a>
                    <div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="alldata.php">All data</a>
	        	</div>
				
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="logout.php">Logout</a>
		      </li>
		    </ul>
		</div>
	</nav><br>

<div class="container">
    <div class="row">
        <?php
        $cards = array(
            array("Books registration", "register_book.php", "b.jpg", "book_register.php", "secondary2.php", "View", "Manage"),
            array("Category registration", "register_book.php", "b.jpg", "secondary1.php", "secondary2.php", "View", "Manage"),
            array("Member registration", "register_book.php", "b.jpg", "secondary1.php", "secondary2.php", "View", "Manage"),
            array("Borrow details", "register_book.php", "b.jpg", "secondary1.php", "secondary2.php", "View", "Manage"),
            array("Assign Fine", "register_book.php", "b.jpg", "secondary1.php", "secondary2.php", "View", "Manage"),
        );

    
        for ($i = 0; $i < 3; $i++) {
            echo '<div class="col-md-4">';
            echo '<div class="box centered-box" style="background-image: url(' . $cards[$i][2] . '); background-size: cover; background-position: center;">';
            echo '<h4>' . $cards[$i][0] . '</h4>';
            echo '<form action="' . $cards[$i][1] . '" method="post"></form>';
            echo '<button onclick="submitForm(this.form)">Go to ' . $cards[$i][0] . '</button>';
            echo '<div class="btn-group" role="group">';
            echo '<button class="btn btn-outline-secondary" onclick="window.location.href=\'' . $cards[$i][3] . '\'">' . $cards[$i][5] . '</button>';
            echo '</div>';
            echo '<div class="btn-group" role="group">';
            echo '<button class="btn btn-outline-secondary" onclick="window.location.href=\'' . $cards[$i][4] . '\'">' . $cards[$i][6] . '</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>

    <div class="row justify-content-center"> 
        <?php
        
        for ($i = 3; $i < 5; $i++) {
            echo '<div class="col-md-4">';
            echo '<div class="box centered-box" style="background-image: url(' . $cards[$i][2] . '); background-size: cover; background-position: center;">';
            echo '<h4>' . $cards[$i][0] . '</h4>';
            echo '<form action="' . $cards[$i][1] . '" method="post"></form>';
            echo '<button onclick="submitForm(this.form)">Go to ' . $cards[$i][0] . '</button>';
            echo '<div class="btn-group" role="group">';
            echo '<button class="btn btn-outline-secondary" onclick="window.location.href=\'' . $cards[$i][3] . '\'">' . $cards[$i][5] . '</button>';
            echo '</div>';
            echo '<div class="btn-group" role="group">';
            echo '<button class="btn btn-outline-secondary" onclick="window.location.href=\'' . $cards[$i][4] . '\'">' . $cards[$i][6] . '</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>





<footer>
    Developed with ♡ by team wwwDot
</footer>

</body>
</html>
