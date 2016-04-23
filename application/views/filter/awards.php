<form id="filter_awards" class="form-horizontal filter-form" method="post" action="#" role="form">
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
	    <label class="col-sm-2 col-md-2 control-label">Date</label>
	    <div class="col-sm-5 col-md-4">
	    	<input type="text" class ="form-control start_date" name="start_date" id="start_date" placeholder="Start Date" />
	    </div>
	    <div class="col-sm-5 col-md-4">
	    	<input type="text" class ="form-control end_date" name="end_date" id="end_date" placeholder="End date" />
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Amount</label>
	    <div class="col-sm-5 col-md-4">
	    	<input type="text" class ="form-control amount_start" name="amount_start" id="amount_start" placeholder="Starting Amount"/>
		</div>
		<div class="col-sm-5 col-md-4">
	    	<input type="text" class ="form-control amount_end" name="amount_end" id="amount_end" placeholder="Ending Amount"/>
	    </div>
  	</div>
  	<div class="form-group form-actions">
    	<div class="col-sm-offset-2 col-sm-10">
      		<button type="submit" class="btn btn-success">View Results</button>
      		<button type="submit" class="btn btn-danger">Export</button>
		</div>
  	</div>
</form>