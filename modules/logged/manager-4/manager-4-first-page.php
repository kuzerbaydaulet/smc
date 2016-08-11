
<?php

    include "header.php";
    $clients = $connection->query("SELECT * FROM clients ORDER BY name");
    $goods = $connection->query("SELECT * FROM goods ORDER BY name");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quality control manager</title>
</head>
<body>
	<div class="container" width='80'>
	<h1 style="font-family: 'Times New Roman'; color:#777777; font-weight: normal; margin-left:5%;">client's complaint and suggestion</h1>
	<hr>
	<div class="manager-4-first-page" >
	    <form action="?act=submit_quality_control" method="post" class="form-horizontal col-lg-offset-2">
			<div class="form-group">
				<label class="col-lg-2 control-label" for="client">Client</label>
				<div class="col-lg-6">
	      	    <select class="form-control" name="select_clients">
	      	    	<option></option>
	      	    <?php
	      	        while($row = $clients->fetch_object()){

	      	        	echo "<option value=\"".$row->id."\" >".$row->phone." | ".$row->name." ".$row->surname."</option>";

	      		     }
	      	    ?>
	      		</select>
	    	  </div>
			</div>
			
			<div class="form-group">
	      	<label class="control-label col-lg-2" for="goods">Good</label>
	      	<div class="col-lg-6">
	      	    <select class="form-control" name="select_goods">
	      	    	<option></option>
	      	    <?php
	      	        while($row = $goods->fetch_object()){
	      	    		
	      	    		echo "<option value=\"".$row->id."\">".$row->name."</option>";

	      	        }
	      	    ?>
	      		</select>
	    	  </div>
	    	</div>
			
			<div class="form-group">
				<label class="col-lg-2 control-label" for="complaints">Complaints and suggestions</label>
				<div class="col-lg-6">
					<textarea rows="3" class="form-control" placeholder="Enter complaints/suggestions here" type="text" name='complaints' ></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
					<a href="?page=manager-4-first-page" class="btn btn-default">Clear</a>
					<button type="submit" class="btn btn-primary">Proceed</button>
				</div>
			</div>
	
			
		</form>
	</div>
	</div>
</body>
</html>
