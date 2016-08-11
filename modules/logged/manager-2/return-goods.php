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
    
           
   if(isset($_POST['get_option'])){
        
        $client_id = $_POST['get_option'];
        $find=$connection->query("SELECT goods_id FROM history_of_sales WHERE client_id='$client_id'");
        while($row=mysql_fetch_array($find)){
            echo "<option>".$row['goods_id']."</option>";
        }
   
        exit;  
   }


?>
<!--<script>
	function fetch_select(val){
       $.ajax({
        type: 'post',
        url: 'fetch_data.php',
        data: {
          get_option:val
        },
        success: function (response) {
          document.getElementById("select_goods").innerHTML=response; 
        }
       });
    }
</script>
-->
<div class="container" width='80'>
    <h1 style="font-family: 'Times New Roman'; color:#777777; font-weight: normal; margin-left:5%;">return product</h1>
    <hr>
    <form class="form-horizontal col-lg-offset-2" action="?act=return_goods" method="post">
        <div class="form-group">
  			<label class="control-label col-lg-2" for="manager">Clients</label>
  			<div class="col-lg-6">
  	    		<select class="form-control" id="select" name="client_id" >
  	    			<option></option>
  	    		<?php
  	    			for( $i=0; $i<count($clients); $i++ ){
  	    			    echo "<option value=\"".$clients[$i]['id']."\" > ".$clients[$i]['phone']." | ".$clients[$i]['name']." ".$clients[$i]['surname']." </option>";
  	    			}
  	    		?>
  				</select>
	  		</div>
		</div>
		<div class="form-group">
  			<label class="control-label col-lg-2" for="goods">Goods</label>
  			<div class="col-lg-6">
  	    		<select class="form-control" id="select_goods" name="good_id">
  	    			<option></option>
  	    			<?php
  	    			for( $i=0; $i<count($goods); $i++ ){
  	    			    echo "<option value=\"".$goods[$i]['id']."\" > ".$goods[$i]['name']."</option>";
  	    			}
  	    		    ?>
  				</select>
	  		</div>
		</div> 
		<div class="form-group">
	    	<label  class="col-lg-2 control-label">Cause</label>
	    	<div class="col-lg-6">
	      		<input type="text" class="form-control" placeholder="Enter cause here" id="inputEmail" name="cause">
	    	</div>
	  	</div>
	  	<div class="form-group">
    		<div class="col-lg-10 col-lg-offset-2">
      			<a href="?page=manager-2-first-page" class="btn btn-default" >Back</a>
      			<button type="reset" class="btn btn-default">Clear</button>
    			<button type="submit" class="btn btn-primary">Save</button>
    		</div>
  		</div>
    </form>
</div>