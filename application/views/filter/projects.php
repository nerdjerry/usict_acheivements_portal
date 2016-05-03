<form id="filter_projects" class="form-horizontal filter-form" method="post" action="<?php echo base_url('/filter/project');?>" role="form">
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Name</label>
	    <div class="col-sm-10 col-md-8">
	      <input type="text" class="form-control" name="name" value="<?php if(isset($filter['name'])) echo $filter['name']?>"/>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Designation</label>
	    <div class="col-sm-10 col-md-8">
	      	<label class="checkbox-inline"><input type="checkbox" name="professor" value="Professor"
	      	<?php if(isset($filter['isProfessor']) && $filter['isProfessor'] != '') echo "checked"?>>Professor</label>
			<label class="checkbox-inline"><input type="checkbox" name="associate_professor" value="Associate Professor"
			<?php if(isset($filter['isAssociateProf'])  && $filter['isAssociateProf'] != '') echo "checked"?>>Associate Professor</label>
			<label class="checkbox-inline"><input type="checkbox" name="assistant_professor" value="Assistant Professor"
			<?php if(isset($filter['isAssistantProf'])  && $filter['isAssistantProf'] != '' ) echo "checked"?>>Assistant Professor</label>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Title</label>
	    <div class="col-sm-10 col-md-8">
	      <input type="text" class="form-control" name="title" value="<?php if(isset($filter['title'])) echo $filter['title']?>"/>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Granting Agency</label>
	    <div class="col-sm-10 col-md-8">
	      <input type="text" class="form-control" name="granting_agency" value="<?php if(isset($filter['grantingAgency'])) echo $filter['grantingAgency']?>"/>
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
	    <label class="col-sm-2 col-md-2 control-label">Amount</label>
	    <div class="col-sm-5 col-md-4">
	    	<input type="text" class ="form-control amount_start" name="amount_start" id="amount_start" placeholder="Starting Amount"
	    	value="<?php if(isset($filter['amountStart'])) echo $filter['amountStart']?>"/>
		</div>
		<div class="col-sm-5 col-md-4">
	    	<input type="text" class ="form-control amount_end" name="amount_end" id="amount_end" placeholder="Ending Amount"
	    	value="<?php if(isset($filter['amountEnd'])) echo $filter['amountEnd']?>"/>
	    </div>
  	</div>
  	<div class="form-group form-actions">
    	<div class="col-sm-offset-2 col-sm-10">
      		<button type="submit" name="results" value="view" class="btn btn-success">View Results</button>
      		<button type="submit" name="results" value="export" class="btn btn-danger">Export</button>
		</div>
  	</div>
</form>