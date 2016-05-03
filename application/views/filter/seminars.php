<form id="filter_seminars" class="form-horizontal filter-form" method="post" action="<?php echo base_url('/filter/seminar');?>" role="form">
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
			<?php if(isset($filter['isAssociateProf']) && $filter['isAssociateProf'] != '') echo "checked"?>>Associate Professor</label>
			<label class="checkbox-inline"><input type="checkbox" name="assistant_professor" value="Assistant Professor"
			<?php if(isset($filter['isAssistantProf']) && $filter['isAssistantProf'] != '') echo "checked"?>>Assistant Professor</label>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Title</label>
	    <div class="col-sm-10 col-md-8">
	      <input type="text" class="form-control" name="title" value="<?php if(isset($filter['title'])) echo $filter['title']?>"/>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Place</label>
	    <div class="col-sm-10 col-md-8">
	      <input type="text" class="form-control" name="place" value="<?php if(isset($filter['place'])) echo $filter['place']?>"/>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Organiser</label>
	    <div class="col-sm-10 col-md-8">
	      <input type="text" class="form-control" name="organiser" value="<?php if(isset($filter['organiser'])) echo $filter['organiser']?>"/>
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
	      	<label class="checkbox-inline"><input type="checkbox" name="national" value="National"
	      	<?php if(isset($filter['isNational']) && $filter['isNational'] != '') echo "checked"?>>National</label>
			<label class="checkbox-inline"><input type="checkbox" name="international" value="International"
			<?php if(isset($filter['isInternational']) && $filter['isInternational'] != '') echo "checked"?>>International</label>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Type</label>
	    <div class="col-sm-10 col-md-8">
	      	<label class="checkbox-inline"><input type="checkbox" name="seminar" value="Seminar"
	      	<?php if(isset($filter['isSeminar']) && $filter['isSeminar'] != '') echo "checked"?>>Seminar</label>
			<label class="checkbox-inline"><input type="checkbox" name="workshop" value="Workshop"
			<?php if(isset($filter['isWorkshop']) && $filter['isWorkshop'] != '') echo "checked"?>>Workshop</label>
			<label class="checkbox-inline"><input type="checkbox" name="training_program" value="Training Programme"
			<?php if(isset($filter['isTraining']) && $filter['isTraining'] != '') echo "checked"?>>Training Program</label>
			<label class="checkbox-inline"><input type="checkbox" name="fdp" value="Faculty Development Programme"
			<?php if(isset($filter['isFDP']) && $filter['isFDP'] != '') echo "checked"?>>Faculty Development Program</label>
			<label class="checkbox-inline"><input type="checkbox" name="symposium" value="Symposium"
			<?php if(isset($filter['isSymposium']) && $filter['isSymposium'] != '') echo "checked"?>>Symposium</label>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Status</label>
	    <div class="col-sm-10 col-md-8">
	      	<label class="checkbox-inline"><input type="checkbox" name="attended" value="Attended"
	      	<?php if(isset($filter['isAttended']) && $filter['isAttended'] != '') echo "checked"?>>Attended</label>
			<label class="checkbox-inline"><input type="checkbox" name="organised" value="Organised"
			<?php if(isset($filter['isOrganised']) && $filter['isOrganised'] != '') echo "checked"?>>Organised</label>
	    </div>
  	</div>
  	<div class="form-group">
	    <label class="col-sm-2 col-md-2 control-label">Number of Paricipants</label>
	    <div class="col-sm-10 col-md-8">
	      <input type="text" class="form-control" name="no_of_participants" value="<?php if(isset($filter['noOfParticipants'])) echo $filter['noOfParticipants']?>"/>
	    </div>
  	</div>
  	<div class="form-group form-actions">
    	<div class="col-sm-offset-2 col-sm-10">
      		<button type="submit" name="results" value="view" class="btn btn-success">View Results</button>
      		<button type="submit" name="results" value="export" class="btn btn-danger">Export</button>
		</div>
  	</div>
</form>