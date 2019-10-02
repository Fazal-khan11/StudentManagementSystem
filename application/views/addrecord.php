<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Add Student Data</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/fontawesome/css/fontawesome.min.css">
</head>
<body>

<div class="container">
	<br><br>
	<?php if(isset($_SESSION['success'])){?>
		<div class="text-success alert alert-success"><?php echo $_SESSION['success']?></div>
		<?php
	}?>
	<?php if(isset($_SESSION['error'])){?>
		<div class="text-danger alert alert-danger"><?php echo $_SESSION['error']?></div>
		<?php
	}?>

		<h1 class="text-center">Add Student</h1>
	<br><br>
	<form action="<?php echo site_url('Auth/submit_student')?>" enctype="multipart/form-data" method="post">

		<div class="form-row">
			<?php if(form_error('name') == '') {?>
			<div class="form-group col-md-6">
				<label for="name">Name</label>
				<input type="text" class="form-control" name="name" id="name" value="<?php echo set_value('name'); ?>" placeholder="Student Name">
			</div>
			<?php }
			else { ?>
				<div class="form-group col-md-6 has-danger">
					<label for="name">Name</label>
					<input type="text" class="form-control is-invalid state-invalid" name="name" id="name" value="<?php echo set_value('name'); ?>" placeholder="Student Name">
					<?php echo form_error('name', '<div class="invalid-feedback"> ', '</div>'); ?>
				</div>
			<?php	}?>
			<?php if(form_error('dob') == '') {?>
			<div class="form-group col-md-6">
				<label for="dob">Date Of Birth</label>
				<input type="date" class="form-control datepicker" value="<?php echo set_value('dob'); ?>"  name="dob" id="dob">
			</div>
			<?php }
			else { ?>
			<div class="form-group col-md-6 has-danger">
				<label for="dob">Date Of Birth</label>
				<input type="date" class="form-control  is-invalid state-invalid" value="<?php echo set_value('dob'); ?>"  name="dob" id="dob">
				<?php echo form_error('dob', '<div class="invalid-feedback"> ', '</div>'); ?>
			</div>
			<?php	}?>
		</div>
		<div class="form-row">
			<?php if(form_error('email') == '') {?>
			<div class="form-group col-md-6">
				<label for="email">Email</label>
				<input type="email" class="form-control" name = "email" value="<?php echo set_value('email'); ?>" id="email" placeholder="Email">
			</div>
			<?php }
			else { ?>
			<div class="form-group col-md-6 has-danger">
				<label for="email">Email</label>
				<input type="email" class="form-control is-invalid state-invalid" name = "email" value="<?php echo set_value('email'); ?>" id="email" placeholder="Email">
				<?php echo form_error('email', '<div class="invalid-feedback"> ', '</div>'); ?>
			</div>
			<?php	}?>
			<?php if(form_error('phone') == '') {?>
			<div class="form-group col-md-6">
				<label for="mobilenumber">Mobile Number</label>
				<input type="text" class="form-control" name="phone" value="<?php echo set_value('phone'); ?>"  id="mobilenumber" placeholder="Mobile Number">
			</div>
			<?php }
			else { ?>
			<div class="form-group col-md-6 has-danger">
				<label for="mobilenumber">Mobile Number</label>
				<input type="text" class="form-control is-invalid state-invalid" name="phone" value="<?php echo set_value('phone'); ?>"  id="mobilenumber" placeholder="Mobile Number">
				<?php echo form_error('phone', '<div class="invalid-feedback"> ', '</div>'); ?>
			</div>
			<?php	}?>
		</div>
		<div class="form-row">
			<?php if(form_error('gender') == '') {?>
			<div class="form-group col-md-6">
				<?php echo form_label('Gender', 'gender',$attributes=array());?>
				
				<?php 
				$options = array(
					""=>"Gender",
					"male" =>"Male",
					"female" => "Female"
				);
				?>
				<?php echo form_dropdown('gender', $options,set_value('gender'),array("class"=>"custom-select mb-3","id"=>"gender"));?>
				
			<?php }
			else { ?>
			<div class="form-group col-md-6 has-danger">
				<label for="gender">Gender</label>
				<select name="gender" id="gender" class="custom-select mb-3 is-invalid state-invalid"  value="<?php echo set_value('gender'); ?>">
					<option selected disabled>Gender</option>
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select>
				<?php echo form_error('gender', '<div class="invalid-feedback "> ', '</div>'); ?>
			</div>
			<?php	}?>
			</div>
			<?php if(form_error('image') == '') {?>
			<div class="form-group col-md-6 custom-file mt-auto mb-auto">
				<input type="file" class="form-control custom-file-input"  id="image" name="image">
				<label class="custom-file-label" for="image"></label>
			</div>
			<?php }
			else { ?>
				<div class="form-group col-md-6 custom-file mt-auto mb-auto has-danger">
					<input type="file" class="form-control custom-file-input is-invalid state-invalid"  id="image" name="image">
					<label class="custom-file-label" for="image"></label>
					<div class="invalid-feedback"><?php if(isset($errors)) echo $errors ?></div>
				</div>
			<?php	}?>
		</div>
		<?php $this->load->view('fetch_data') ?>
		<button type="submit" class="btn btn-primary">Submit</button>
		<br>
		<br>
	</form>

</div>

<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url();?>assets/fontawesome/js/fontawesome.min.js"></script>
</body>
</html>
<script>
	$(document).ready(function () {
		$('#country').change(function() {
		    var country_id = $('#country').val();
		    if(country_id != '')
			{
			    $.ajax({
					url:"<?php echo base_url();?>auth/fetch_province",
					method:"POST",
					data:{country_id:country_id},
					success:function (data)
					{
						$('#province').html(data);
                    }
				})
			}
		    else
			{
			    $('#province').html('<option value="">Select Province</option>');
			    $('#city').html('<option value="">Select City</option>');
			}
        });

		$('#province').change(function() {
			var province_id = $('#province').val();
			if(province_id != '')
			{
			    $.ajax({
					url: "<?php echo base_url();?>auth/fetch_city",
					method: "POST",
					data: {province_id:province_id},
					success:function (data)
					{
					    $('#city').html(data);
                    }
				})
			}
        });
    });
</script>
