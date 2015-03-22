<form class="form-horizontal" role="form">
	<div class="col-sm-5">
		<div class="form-group">
			<label for="searchName" class="col-sm-2 control-label">Driver Id:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="driverID" name="driverID" placeholder="Driver ID" />
			</div>
		</div>
		<div class="form-group">
			<label for="searchName" class="col-sm-2 control-label">Date:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control datepicker" id="dschedule_date" name="dschedule_date" placeholder="Schedule Date" />
			</div>
		</div>
		<div class="form-group">
			<label for="searchName" class="col-sm-2 control-label">Start: </label>
			<div class="col-sm-10">
			  <input type="text" class="form-control timepicker" id="start_time" name="start_time" placeholder="Start Time" />
			</div>
		</div>
		<div class="form-group">
			<label for="searchName" class="col-sm-2 control-label">End: </label>
			<div class="col-sm-10">
			  <input type="text" class="form-control timepicker" id="end_time" name="end_time" placeholder="End Time" />
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
			  <button type='button' class="btn btn-primary" id="driverScheduleSubmit">Submit</button>
			</div>
		</div>
	</div>
</form>