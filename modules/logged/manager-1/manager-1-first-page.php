<?php

	include "header.php";
	
	$managers = array();
	$query = $connection->query(" SELECT * FROM managers WHERE status=1 ORDER BY department ");
	
	while( $row = $query->fetch_array() ){
		
		if( $row['department']==1 ){
			$row['department'] = "Call centre";
		}else if( $row['department']==2 ){
			$row['department'] = "Sales department";
		}else if( $row['department']==3 ){
			$row['department'] = "Technical support";
		}else if( $row['department']==4 ){
			$row['department'] = "Quality control";
		}
		
		array_push( $managers,$row );
		
	}
	
	$clients = array();
	$query = $connection->query(" SELECT * FROM clients ORDER BY phone ");
	
	while( $row = $query->fetch_array() ){
		
		array_push( $clients, $row );
		
	}
	

?>

<div class="container" width="80">

<h1 style="font-family: 'Times New Roman'; color:#777777; font-weight: normal; margin-left:22%;">new client  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp old client</h1>
<hr>
	<div style="float:left; width:50%;" >
		<form action="?act=call-centre-new-client" method="post" class="form-horizontal">
		<div class="form-group">
			<label class="col-lg-5 control-label" for="phone">Phone</label>
			<div class="col-lg-6">
				<input class="form-control" type="text" name='phone'>
			</div>
			
		</div>
		<div class="form-group">
			<label class="control-label col-lg-5" for="name">Name</label>
			<div class="col-lg-6">
				<input class="form-control" type="text" name="name">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-5" for="surname">Surname</label>
			<div class="col-lg-6">
				<input class="form-control" type="text" name="surname">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-5" for="manager">Manager</label>
			<div class="col-lg-6">
				<select class="form-control" id="select" name="manager-id" >
					<option value=""></option>
				<?php
					
					for($i=0; $i<count($managers); $i++){
						
						echo "<option value= \"".$managers[$i]['id']."\" >".$managers[$i]['department']." | ".$managers[$i]['name']." ".$managers[$i]['surname']." </option>";
						
					}
					
				?>
				</select>
				<div class="checkbox">
					<label>
						<input type="checkbox" name="reject-check" > Reject
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-5">Reject cause</label>
			<div class="col-lg-6">
				<input class="form-control" type="text" name="cause" >
			</div>
		</div>
		<div class="form-group">
		<div class="col-lg-6 col-lg-offset-5">
				<button type="reset" class="btn btn-default">Clear</button>
				<button type="submit" class="btn btn-primary">Proceed</button>
			</div>
		</div>
	</form>
	</div>
	
	<div style="float:right; width:50%;" >
		<form action="?act=call-centre-old-client" method="post" class="form-horizontal"  >

		<div class="form-group">
			<label class="control-label col-lg-3" >Clients</label>
			<div class="col-lg-6">
				<select class="form-control" id="select" name="client-id" >
					<option value=""></option>
				<?php
					
					for($i=0; $i<count($clients); $i++){
						
						echo "<option value= \"".$clients[$i]['id']."\" >".$clients[$i]['phone']." | ".$clients[$i]['name']." ".$clients[$i]['surname']." </option>";
						
					}
					
				?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3" >Manager</label>
			<div class="col-lg-6">
				<select class="form-control" id="select" name="manager-id" >
					<option value=""></option>
				<?php
					
					for($i=0; $i<count($managers); $i++){
						
						echo "<option value= \"".$managers[$i]['id']."\" >".$managers[$i]['department']." | ".$managers[$i]['name']." ".$managers[$i]['surname']." </option>";
						
					}
					
				?>
				</select>
				<div class="checkbox">
					<label>
						<input type="checkbox" name="reject-check" > Reject
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3" >Reject cause</label>
			<div class="col-lg-6">
				<input class="form-control" type="text" name="cause" >
			</div>
		</div>
		<div class="form-group">
		<div class="col-lg-6 col-lg-offset-3">
				<button type="reset" class="btn btn-default">Clear</button>
				<button type="submit" class="btn btn-primary">Proceed</button>
			</div>
		</div>
	</form>
	</div>
	
</div>