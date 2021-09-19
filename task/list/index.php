<?php
	require_once("task_list.php");
	require_once("../../user/logout/index.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>List Task</title>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href="../public/frontend/css/main.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		.form{
			display: flex;
		}
		.form form{
			margin-right: 5px;
			
		}
		button{
			margin-right: 5px;
		}
		.table td, .table th{
			border-top: 0px;
		}
		.category{
			text-align: center;
		}
		.btn{
			margin-top: 5px;
		}
		.header button{
			margin-left: 90%;
		}
		.btn-warning {
			color: #000;
			background-color: #f0ad4e;
			border-color: #eea236;
		}
		.back{
			text-align: center;
		}
        .table{
            width: 50%;
            margin: auto;
        }
	</style>
</head> 
<body>
<div class="header">
	<div class="navigation">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse" id="navbarNav">
				<form method="POST" action="">
					<button type="submit" class='logout btn btn-warning left-margin' name="logout" value="logout">Logout</button>	
				</form>
			</div>
		</nav>
	</div>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">TASK ID</th>
            <th scope="col">TASK NAME</th>
            <th scope="col">TASK DETAIL</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
	<?php
	foreach ($data as $item) {
		echo '<tr>
		<td>'.$item['id'].'</td>
		<td>'.$item['task_name'].'</td>
		<td>'.$item['task_detail'].'</td>
		<td><a href="/task_management/task/update/?id='.$item['id'].'"><button>Edit</button></a></td>
		<td><a href="/task_management/task/delete/?id='.$item['id'].'"><button>Delete</button></a></td>
		</tr>';
	}
	?>
    </tbody>
</table>
<div class="back">
		<a href="/task_management/task/insert" class="btn btn-warning left-margin">New Task</a>
</div>

</body>
</html>