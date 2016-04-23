<form id="filter_seminars" class="form-horizontal filter-form" method="post" action="#" role="form">
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Name</label>
	    <div class="col-sm-10 col-md-8">
	      <input type="text" class="form-control" name="name" />
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Designation</label>
	    <div class="col-sm-10 col-md-8">
	      	<label class="checkbox-inline"><input type="checkbox" name="professor" value="Professor">Professor</label>
			<label class="checkbox-inline"><input type="checkbox" name="associate_professor" value="Associate Professor">Associate Professor</label>
			<label class="checkbox-inline"><input type="checkbox" name="assistant_professor" value="Assistant Professor">Assistant Professor</label>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Title</label>
	    <div class="col-sm-10 col-md-8">
	      <input type="text" class="form-control" name="title" />
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Date</label>
	    <div class="col-sm-5 col-md-4">
	    	<input type="text" class ="form-control start_date" name="start_date" id="start_date" placeholder="Start Date" autocomplete="off" />
	    </div>
	    <div class="col-sm-5 col-md-4">
	    	<input type="text" class ="form-control end_date" name="end_date" id="end_date" placeholder="End date" autocomplete="off" />
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Region</label>
	    <div class="col-sm-10 col-md-8">
	      	<label class="checkbox-inline"><input type="checkbox" name="national" value="National">National</label>
			<label class="checkbox-inline"><input type="checkbox" name="international" value="International">International</label>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Type</label>
	    <div class="col-sm-10 col-md-8">
	      	<label class="checkbox-inline"><input type="checkbox" name="seminar" value="Seminar">Seminar</label>
			<label class="checkbox-inline"><input type="checkbox" name="workshop" value="Workshop">Workshop</label>
			<label class="checkbox-inline"><input type="checkbox" name="training_program" value="Training Program">Training Program</label>
			<label class="checkbox-inline"><input type="checkbox" name="fdp" value="FDP">Faculty Development Program</label>
			<label class="checkbox-inline"><input type="checkbox" name="symposium" value="Symposium">Symposium</label>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Status</label>
	    <div class="col-sm-10 col-md-8">
	      	<label class="checkbox-inline"><input type="checkbox" name="attended" value="Attended">Attended</label>
			<label class="checkbox-inline"><input type="checkbox" name="organised" value="Organised">Organised</label>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Number of Paricipants</label>
	    <div class="col-sm-10 col-md-8">
	      <input type="text" class="form-control" name="no_of_participants" />
	    </div>
  	</div>
  	<div class="form-group form-actions">
    	<div class="col-sm-offset-2 col-sm-10">
      		<button type="submit" class="btn btn-success">View Results</button>
      		<button type="submit" class="btn btn-danger">Export</button>
		</div>
  	</div>
</form>