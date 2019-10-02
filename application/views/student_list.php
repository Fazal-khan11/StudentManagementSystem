<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Students List</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/css/dataTables.bootstrap.min.css'); ?>"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		body {
			color: #566787;
			background: #f5f5f5;
			font-family: 'Varela Round', sans-serif;
			font-size: 13px;
		}
		.table-wrapper {
			background: #fff;
			padding: 20px 25px;
			margin: 30px 0;
			border-radius: 3px;
			box-shadow: 0 1px 1px rgba(0,0,0,.05);
		}
		.table-title {
			padding-bottom: 15px;
			background: #435d7d;
			color: #fff;
			padding: 16px 30px;
			margin: -20px -25px 10px;
			border-radius: 3px 3px 0 0;
		}
		.table-title h2 {
			margin: 5px 0 0;
			font-size: 24px;
		}
		.table-title .btn-group {
			float: right;
		}
		.table-title .btn {
			color: #fff;
			float: right;
			font-size: 13px;
			border: none;
			min-width: 50px;
			border-radius: 2px;
			border: none;
			outline: none !important;
			margin-left: 10px;
		}
		.table-title .btn i {
			float: left;
			font-size: 21px;
			margin-right: 5px;
		}
		.table-title .btn span {
			float: left;
			margin-top: 2px;
		}
		table.table tr th, table.table tr td {
			border-color: #e9e9e9;
			padding: 12px 15px;
			vertical-align: middle;
		}
		table.table tr th:first-child {
			width: 60px;
		}
		table.table tr th:last-child {
			width: 100px;
		}
		table.table-striped tbody tr:nth-of-type(odd) {
			background-color: #fcfcfc;
		}
		table.table-striped.table-hover tbody tr:hover {
			background: #f5f5f5;
		}
		table.table th i {
			font-size: 13px;
			margin: 0 5px;
			cursor: pointer;
		}
		table.table td:last-child i {
			opacity: 0.9;
			font-size: 22px;
			margin: 0 5px;
		}
		table.table td a {
			font-weight: bold;
			color: #566787;
			display: inline-block;
			text-decoration: none;
			outline: none !important;
		}
		table.table td a:hover {
			color: #2196F3;
		}
		table.table td a.edit {
			color: #FFC107;
		}
		table.table td a.delete {
			color: #F44336;
		}
		table.table td i {
			font-size: 19px;
		}
		table.table .avatar {
			border-radius: 50%;
			vertical-align: middle;
			margin-right: 10px;
		}
		.pagination {
			float: right;
			margin: 0 0 5px;
		}
		.pagination li a {
			border: none;
			font-size: 13px;
			min-width: 30px;
			min-height: 30px;
			color: #999;
			margin: 0 2px;
			line-height: 30px;
			border-radius: 2px !important;
			text-align: center;
			padding: 0 6px;
		}
		.pagination li a:hover {
			color: #666;
		}
		.pagination li.active a, .pagination li.active a.page-link {
			background: #03A9F4;
		}
		.pagination li.active a:hover {
			background: #0397d6;
		}
		.pagination li.disabled i {
			color: #ccc;
		}
		.pagination li i {
			font-size: 16px;
			padding-top: 6px
		}
		.hint-text {
			float: left;
			margin-top: 10px;
			font-size: 13px;
		}
		</style>
		</head>
<body>

<?php if(isset($_SESSION['success'])){?>
	<div class="text-success alert alert-success"><?php echo $_SESSION['success']?></div>
	<?php
}?>
<?php if(isset($_SESSION['error'])){?>
	<div class="text-danger alert alert-danger"><?php echo $_SESSION['error']?></div>
	<?php
}?>

		<h2 class="text-center text-capitalize mt-5">List of Students</h2>
		<br>
		<div class="container-fluid">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2>Manage <b>Students</b></h2>
						</div>
						<div class="col-sm-6">
							<a href="<?php echo site_url('/auth')?>" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Student</span></a>
							<a href="<?php echo site_url('/dashboard')?>" class="btn btn-warning" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Back To Dashboard</span></a>
						</div>
					</div>
				</div>
			<table id="memListTable" class="table table-striped text-center">
				<thead class="text-center">
				<tr>
					<th class="text-center" scope="col">#</th>
					<th class="text-center" scope="col">image</th>
					<th class="text-center" scope="col">Name</th>
					<th class="text-center" scope="col">Date of Birth</th>
					<th class="text-center" scope="col">Gender</th>
					<th class="text-center" scope="col">Mobile Number</th>
					<th class="text-center" scope="col">E-Mail</th>
					<th class="text-center" scope="col">Country</th>
					<th class="text-center" scope="col">Province</th>
					<th class="text-center" scope="col">City</th>
					<th class="text-center" scope="col">Courses</th>
					<!--<th class="text-center" scope="col">Actions</th>-->
				</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			</div>
			</div>
		</div>
		<!-- Delete Modal HTML -->
		<!--<div id="deleteStudentModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="<?php echo site_url('get_data/del/'.$student->id)?>">
						<div class="modal-header">
							<h4 class="modal-title">Delete Employee</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<p>Are you sure you want to delete this Records?</p>
							<p class="text-warning"><small>This action cannot be undone.</small></p>
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
							<input type="submit" class="btn btn-danger" value="Delete">
						</div>
					</form>
				</div>
			</div>
		</div>-->
<!-- DataTables JS library -->
<script type="text/javascript" src="<?php echo base_url('assets/DataTables/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/DataTables/js/dataTables.bootstrap.min.js'); ?>"></script>
<script>
$(document).ready(function(){
    $('#memListTable').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?php echo base_url('members/getLists/'); ?>",
            "type": "POST"
        },
        "columnDefs": [{ 
            "targets": [0],
            "orderable": false
        }]
    });
});
</script>
</body>
</html>
