<?php
	
    include "header.php";
    
    $clients = array();
    $goods = array();
    
    $query1 = $connection->query("SELECT * FROM clients ORDER BY phone");
    
    while( $row = $query1->fetch_array() ){
        
        array_push( $clients, $row );
        
    }
    
    $query2 = $connection->query("SELECT * FROM goods ORDER BY type ");
    
    while($row1 = $query2->fetch_array()){
        array_push($goods, $row1);
    }
    
?>
<div class="container" width='80'>
<h1 style="font-family: 'Times New Roman'; color:#777777; font-weight: normal; margin-left:22%;">new client  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp old client</h1>	
<hr>
<div class="add-client" style="float:left; width:50%;">
  	<form class="form-horizontal" action="?act=sales-department-add-client" method="post" style="">
      	<div class="form-group">
    		<label  class="col-lg-5 control-label">Phone</label>
    		<div class="col-lg-6">
      		<input type="text" class="form-control" id="inputEmail" name="phone_number">
    		</div>
  		</div>
	  	<div class="form-group">
	    	<label class="col-lg-5 control-label">Name</label>
	    	<div class="col-lg-6">
	      		<input type="text" class="form-control" id="inputPassword" name="name">
	    	</div>
	  	</div>
	  	<div class="form-group">
	    	<label class="col-lg-5 control-label">Surname</label>
	    	<div class="col-lg-6">
	      		<input type="text" class="form-control" id="inputPassword" name="surname">
	    	</div>
	  	</div>
  		<div class="form-group">
  			<label class="col-lg-5 control-label" for="manager">Goods</label>
  			<div class="col-lg-6">
  	    		<select class="form-control" id="select" name="goods">
  	    			<option value=""></option>
  	    		<?php
      		        for($i=0; $i<count($goods); $i++){
      		            echo "<option value=\"".$goods[$i]['id']."\">".$goods[$i]['type']." | ". $goods[$i]['name'] ."</option>";
      		        }
      		    ?>
  				</select>
	  		</div>
		</div>
		<div class="form-group">
    		<label class="col-lg-5 control-label">Result</label>
    		<div class="col-lg-6">
      			<input type="text" class="form-control" id="inputPassword" name="result">
    		</div>
  		</div>
  		<div class="form-group">
    		<div class="col-lg-10 col-lg-offset-5">
      			<button type="reset" class="btn btn-default">Clear</button>
    			<button type="submit" class="btn btn-primary">Proceed</button>
    		</div>
  		</div>
  	</form>
</div>
	<!-------------------------OLD-CLIENT------------------------------------->

<div class="old-client" style="float:right; width:50%;">
    <form class="form-horizontal" action="?act=sales-department-old-client" method="post">
        <div class="form-group">
  			<label class="control-label col-lg-3" for="manager">Clients</label>
  			<div class="col-lg-6">
  	    		<select class="form-control" id="select" name="client_id" >
  	    			<option value=""></option>
  	    		<?php
  	    			for( $i=0; $i<count($clients); $i++ ){
  	    			    echo "<option value=\"".$clients[$i]['id']."\" > ".$clients[$i]['phone']." | ".$clients[$i]['name']." ".$clients[$i]['surname']." </option>";
  	    			}
  	    		?>
  				</select>
	  		</div>
		</div>
		<div class="form-group">
  			<label class="control-label col-lg-3" for="manager">Goods</label>
  			<div class="col-lg-6">
  	    		<select class="form-control" id="select" name="goods_id">
  	    			<option value=""></option>
  	    		    <?php
  	    		        for($i=0; $i<count($goods); $i++){
  	    		            echo "<option value=\"".$goods[$i]['id']."\">".$goods[$i]['type']." | ". $goods[$i]['name'] ."</option>";
  	    		        }
  	    		    ?>
  				</select>
	  		</div>
		</div>
		<div class="form-group">
	    	<label  class="col-lg-3 control-label">Result</label>
	    	<div class="col-lg-6">
	      		<input type="text" class="form-control" id="inputEmail" name="result">
	    	</div>
	  	</div>
	  	<div class="form-group">
    		<div class="col-lg-10 col-lg-offset-3">
    			<button type="reset" class="btn btn-default">Clear</button>
    			<button type="submit" class="btn btn-primary">Proceed</button>
    		</div>
  		</div>
    </form>
</div>
</div>
