	<div class="form-row">
		<?php if(form_error('country') == '') {?>
			<div class="form-group col-md-4">
				<label for="country">Country</label>
				<select id="country" name="country" value="<?php echo set_value('country'); ?>" class="form-control">
					<option selected disabled>Select Country</option>
					<?php if(count($country)):?>
					<?php foreach($country as $row):?>
					<option value=<?php echo $row->country_id;?><?php echo set_select('country', $row->country_id);?>>
					<?php echo $row->country_name ?></option>
					<?php endforeach;?>
		<?php else:?>
		<?php endif;?>
				</select>
			</div>
		<?php }
		else { ?>
			<div class="form-group col-md-4 has-danger">
				<label for="country">Country</label>
				<select id="country" name="country" class="form-control is-invalid state-invalid">
					<option selected disabled>Select Country</option>
					<?php
					foreach ($country as $row)
					{
						echo '<option value="'.$row->country_id.'">'.$row->country_name.'</option>';
					}
					?>
				</select>
				<?php echo form_error('country', '<div class="invalid-feedback"> ', '</div>'); ?>
			</div>
		<?php	}?>

		<?php if(form_error('province') == '') {?>

			<div class="form-group col-md-4">
				<label for="province">Province</label>
				<select id="province" name="province" class="form-control">
					<option selected disabled value="<?php echo set_select('province_id');?>">Select Province</option>
				</select>
			</div>
		<?php }
		else { ?>
			<div class="form-group col-md-4 has-danger">
				<label for="province">Province</label>
				<select id="province" name="province" class="form-control is-invalid state-inavlid">
					<option selected disabled>Select Province</option>
				</select>
				<?php echo form_error('province', '<div class="invalid-feedback"> ', '</div>'); ?>
			</div>
		<?php	}?>
		<?php if(form_error('city') == '') {?>
			<div class="form-group col-md-4">
				<label for="city">City</label>
				<select id="city" name="city" class="form-control">
					<option selected disabled>Select City</option>
				</select>
				<?php echo form_error('city', '<div class="invalid-feedback"> ', '</div>'); ?>
			</div>
		<?php }
		else { ?>
			<div class="form-group col-md-4 has-danger">
				<label for="city">City</label>
				<select id="city" name="city" class="form-control is-invalid state-invalid">
					<option selected disabled>Select City</option>
				</select>
				<?php echo form_error('city', '<div class="invalid-feedback"> ', '</div>'); ?>
			</div>
		<?php	}?>
		</div>
		<div class="form-group">
			<label for="course">Select Courses</label>
			<select multiple  name="courses" class="form-control" id="course">
				<option disabled>Select Courses</option>
				<?php
				foreach ($courses as $row)
				{
					echo '<option value="'.$row->course_id.'">'.$row->course_name.'</option>';
					//$courses = unserialize($row->courses_name[1]);
				}
				?>
			</select>
		</div>



