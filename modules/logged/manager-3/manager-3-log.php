<?php

    include "header.php";
    
    $clients = array();
    $query = $connection->query(" SELECT * FROM clients ");
    
    while( $row = $query->fetch_array() ){
        
        array_push( $clients, $row );
        
    }
    
    $managers = array();
    $query2 = $connection->query("SELECT * FROM managers");
    
    while( $row = $query2->fetch_array() ){
        
        array_push( $managers, $row );
        
    }
    
    $goods = array();
    $query3 = $connection->query("SELECT * FROM goods");
    
    while( $row = $query3->fetch_array() ){
        
        array_push( $goods, $row );
        
    }

?>
<div class="container" width='80'>
    <h1 style="font-family: 'Times New Roman'; color:#777777; font-weight: normal; margin-left:5%;">history</h1>
    <hr>
    
    <form action="?act=manager-3-log" method="post" class="form-horizontal col-lg-offset-2"  >

		<div class="form-group">
			<label class="control-label col-lg-2" >Clients</label>
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
		<div class="col-lg-6 col-lg-offset-2">
				<button type="submit" class="btn btn-primary">Show</button>
			</div>
		</div>
	</form>
	
	<?php
	
	    if( isset($_POST['tech-log']) ){
	        
	        if( count($_POST['tech-log'])>0 ){
	            
	            echo "<table class=\"table table-striped table-hover \">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Client</th>
                              <th>Manager</th>
                              <th>Goods</th>
                              <th>Cause</th>
                              <th>Result</th>
                              <th>Date</th>
                            </tr>
                          </thead>
                          <tbody>";
                          
                for( $i=0; $i<count($_POST['tech-log']); $i++ ){
                    
                    $client = "";
                    $manager = "";
                    $good = "";
                    
                    for( $j=0; $j<count($clients);$j++ ){
                        
                        if( $_POST['tech-log'][$i]['client_id']==$clients[$j]['id'] ){
                            $client = $clients[$j]['name']." ".$clients[$j]['surname'];
                        }
                        
                    }
                    
                    for( $k=0; $k<count($managers); $k++ ){
                        
                        if( $_POST['tech-log'][$i]['manager_id']==$managers[$k]['id'] ){
                            $manager = $managers[$k]['department']." | ".$managers[$k]['name']." ".$managers[$k]['surname'];
                        }
                        
                    }
                    
                    for( $f=0; $f<count($goods); $f++ ){
                        
                        if( $_POST['tech-log'][$i]['goods_id']==$goods[$f]['id'] ){
                            $good = $goods[$f]['name'];
                        }
                        
                    }
                    
                    echo "<tr>
                            <td>".($i+1)."</td>
                            <td>".$client."</td>
                            <td>".$manager."</td>
                            <td>".$good."</td>
                            <td>".$_POST['tech-log'][$i]['cause']."</td>";
                            if($_POST['tech-log'][$i]['result']=="1"){
                                echo"<td>Corrected</td>";
                            }else{
                                echo"<td>Not corrected</td>";
                            }
                            echo"<td>".$_POST['tech-log'][$i]['date']."</td>
                        </tr>";
                }
                
                echo "</tbody>
                    </table> ";
	            
	        }else{
	            
	            echo "<p style=\"margin:0% 20px 20px 31%;\" class=\"lead\">No logs</p>";
	            
	        }
	        
	    }else{
	            
	            echo "<p style=\"margin:0% 20px 20px 31%;\" class=\"lead\">No logs</p>";
	            
	        }
	
	?>
	
	</div>