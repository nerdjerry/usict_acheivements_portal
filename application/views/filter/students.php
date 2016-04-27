<form id="filter_students" class="form-horizontal filter-form" method="post" action="<?php echo base_url('/filter/achievement');?>" role="form">
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Name</label>
	    <div class="col-sm-10 col-md-8">
	      <input type="text" class="form-control" name="name" />
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Branch</label>
	    <div class="col-sm-10 col-md-8">
	      	<label class="checkbox-inline"><input type="checkbox" name="IT" value="IT">IT</label>
			<label class="checkbox-inline"><input type="checkbox" name="CSE" value="CSE">CSE</label>
			<label class="checkbox-inline"><input type="checkbox" name="ECE" value="ECE">ECE</label>
			<label class="checkbox-inline"><input type="checkbox" name="MCA" value="MCA">MCA</label>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Student year</label>
	    <div class="col-sm-10 col-md-8">
	      <input type="text" class="form-control student_year" name="student_year" />
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Year of Achievement</label>
	    <div class="col-sm-10 col-md-8">
	      <input type="text" class="form-control achievement_year" name="achievement_year" />
	    </div>
  	</div>
  	<div class="form-group form-actions">
    	<div class="col-sm-offset-2 col-sm-10">
      		<button type="submit" class="btn btn-success">View Results</button>
      		<button type="submit" class="btn btn-danger">Export</button>
		</div>
  	</div>
</form>