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
	      	<label class="checkbox-inline"><input type="checkbox" name="first" value="1">First</label>
			<label class="checkbox-inline"><input type="checkbox" name="second" value="2">Second</label>
			<label class="checkbox-inline"><input type="checkbox" name="third" value="3">Third</label>
			<label class="checkbox-inline"><input type="checkbox" name="fourth" value="4">Fourth</label>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Year of Achievement</label>
	    <div class="col-sm-10 col-md-4">
	      <input type="text" class="form-control achievement_year" name="start_year" placeholder="Start Year" />
	    </div>
	    <div class="col-sm-10 col-md-4">
	      <input type="text" class="form-control achievement_year" name="end_year" placeholder="End Year"/>
	    </div>
  	</div>
  	<div class="form-group form-actions">
    	<div class="col-sm-offset-2 col-sm-10">
      		<button type="submit" name="results" value="view" class="btn btn-success">View Results</button>
      		<button type="submit" name="results" value="export" class="btn btn-danger">Export</button>
		</div>
  	</div>
</form>