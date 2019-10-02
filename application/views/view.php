<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- DataTables CSS library -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/css/dataTables.bootstrap.min.css'); ?>"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
</head>
<body>
<br><br>
<div class="container">
<table id="memListTable" class="display table table-striped text-center table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>phone</th>
            <th>Email</th>
            <th>Country</th>
            <th>Province</th>
            <th>City</th>
            <th>Courses</th>
            <th>image</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th></th>
            <th>name</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>phone</th>
            <th>Email</th>
            <th>Country</th>
            <th>Province</th>
            <th>City</th>
            <th>Courses</th>
            <th>image</th>
        </tr>
    </tfoot>
</table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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




