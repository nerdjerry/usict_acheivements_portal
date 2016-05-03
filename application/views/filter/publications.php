<form id="filter_publications" class="form-horizontal filter-form" method="post" action="<?php echo base_url('/filter/publication');?>" role="form">
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Name</label>
	    <div class="col-sm-10 col-md-8">
	      <input type="text" class="form-control" name="name" value="<?php if(isset($filter['name'])) echo $filter['name']?>" />
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
	    <label class="col-sm-2 col-md-2 control-label">Date</label>
	    <div class="col-sm-5 col-md-4">
	    	<input type="text" class ="form-control publications_start_date" name="start_date" id="publications_start_date" placeholder="Start Date" autocomplete="off"/>
	    </div>
	    <div class="col-sm-5 col-md-4">
	    	<input type="text" class ="form-control publications_end_date" name="end_date" id="publications_end_date" placeholder="End date" autocomplete="off" />
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Journal Name</label>
	    <div class="col-sm-10 col-md-8">
	      <input type="text" class="form-control" name="journal_name" value="<?php if(isset($filter['journalName'])) echo $filter['journalName']?>"/>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Presented in</label>
	    <div class="col-sm-10 col-md-8">
	      	<label class="checkbox-inline"><input type="checkbox" name="journal" value="Journal"
	      	<?php if(isset($filter['isJournal']) && $filter['isJournal'] != '') echo "checked"?>>Journal</label>
			<label class="checkbox-inline"><input type="checkbox" name="conference" value="Conference"
			<?php if(isset($filter['isConference']) && $filter['isConference'] != '') echo "checked"?>>Conference</label>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Presented at</label>
	    <div class="col-sm-10 col-md-8">
	      	<label class="checkbox-inline"><input type="checkbox" name="national" value="National"
	      	<?php if(isset($filter['isNational']) && $filter['isNational'] != '') echo "checked"?>>National</label>
			<label class="checkbox-inline"><input type="checkbox" name="international" value="International"
			<?php if(isset($filter['isInternational']) && $filter['isInternational'] != '') echo "checked"?>>International</label>
	    </div>
  	</div>
  	<div class="form-group form-actions">
    	<div class="col-sm-offset-2 col-sm-10">
      		<button type="submit" name="results" value="view" class="btn btn-success">View Results</button>
      		<button type="submit" name="results" value="export" class="btn btn-danger">Export</button>
		</div>
  	</div>
</form>