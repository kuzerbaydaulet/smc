
<?php

    include "header.php";
    $clients = $connection->query("SELECT * FROM clients ORDER BY name ASC");
    $goods = $connection->query("SELECT * FROM goods ORDER BY name ASC");

	/*
<script>
	function validate(){
		if( typeof(document.getElementById('select_clients'))!==undefined &&
			typeof(document.getElementById('select_goods'))!==undefined &&	
			typeof(document.getElementById('reason'))!==undefined &&
			typeof(document.getElementById('select_result'))!==undefined) alert("ADDED TO HISTORY!");
	}
</script>*/
	
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Technical support manager</title>
</head>
<body>
	<div class='container' width='80%'>
	<h1 style="font-family: 'Times New Roman'; color:#777777; font-weight: normal; margin-left:5%;">client's reason of petition</h1>
	<hr>
	<div class="manager-3-first-page" >
		
	    <form action="?act=submit_technical_support" onSubmit="validate()" method="post" class="form-horizontal col-lg-offset-2">
			<div class="form-group">
				<label class="col-lg-2 control-label" for="client">Client</label>
				<div class="col-lg-6">
	      	    <select class="form-control" name="select_clients">
	      	           <option value=""></option>
	      	    <?php
	      	        while($row = $clients->fetch_object()){
	      	    	
	      	    	echo "<option value=\"".$row->id."\" >".$row->phone." | ".$row->name." ".$row->surname."</option>";
	      	    	
	      	        }
	      	    ?>
	      		</select>
	    	  </div>
			</div>
			
			<div class="form-group">
	      	<label class="control-label col-lg-2" for="goods">Goods</label>
	      	<div class="col-lg-6">
	      	    <select class="form-control" name="select_goods">
	      	        <option value=""></option>
	      	    <?php
	      	        while($row = $goods->fetch_object()){
	      	    ?>
	      			  <option value="<?php echo $row->id ?>" name="good"><?php echo $row->name?></option>
	      		  <?php
	      	        }
	      	    ?>
	      		</select>
	    	  </div>
	    	</div>
			
			<div class="form-group">
				<label class="col-lg-2 control-label" for="reason">Reason of petition</label>
				<div class="col-lg-6">
					<textarea rows="3" class="form-control" placeholder="Enter reason here" type="text" name='reason' ></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-2" for="result">Result</label>
				<div class="col-lg-6">
					<select class="form-control" name="select_result">
						<option></option>
						<option value="1">Corrected</option>
						<option value="0">Not corrected</option>
					</select>
				</div>
			</div>
	
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
					<button type="reset" class="btn btn-default">Clear</button>
					<button type="submit" on class="btn btn-primary">Proceed</button>
				</div>
			</div>
	
			
		</form>
	</div>
	</div>
</body>
</html>

