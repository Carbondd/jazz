<form action="testMail.php">
    <div class="col-md-3">
    	<label for="number">Carrier: </label>
		<select name="carrier" class="form-control">
        	<option value="vtext.com">Verizon</option>
            <option value="txt.att.net">ATT</option>
            <option>T-Mobile</option>
        </select>
    </div>	
    <div class="col-md-3">
    	<label for="number">Number: </label>
		<input placeholder="xxxxxxxxxx" class="form-control" type="text" name="number"/>
    </div>
    <div class="col-md-8">
    	<label for="number">Message: </label>
		<textarea class="form-control" name="txt"></textarea>
    </div>
    <div class="col-md-8">
		<input value="Send Text" class="form-control btn btn-primary" type="submit" />
		<br />
		<br />
		<br />
		<br />
		<br /> 
    </div> 
	
</form>
