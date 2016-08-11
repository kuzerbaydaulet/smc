<?php

    include "header.php";
    $goods = array();
    
    $query2 = $connection->query("SELECT distinct type FROM goods");
    
    while($row1 = $query2->fetch_array()){
        array_push($goods, $row1);
    }
    
?>

<div class="container" width='80'>
    <h1 style="font-family: 'Times New Roman'; color:#777777; font-weight: normal; margin-left:22%;">list products  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp insert product</h1>
    <hr>
    <div style="float:left; width:50%; ">
        <form class="form-horizontal" action="?act=fill_goods_table" method="post">
            <div class="form-group">
      			<label class="control-label col-lg-5" for="manager">Type of product</label>
      			<div class="col-lg-6">
      	    		<select class="form-control" id="select" name="goods_type">
      	    			<option value=""></option>
      	    		    <?php
      	    		        for($i=0; $i<count($goods); $i++){
      	    		            echo "<option value=\"".$goods[$i]['type']."\">".$goods[$i]['type']."</option>";
      	    		        }
      	    		    ?>
      				</select>
    	  		</div>
    		</div>
    		<div class="form-group">
    		    <div class="col-lg-10 col-lg-offset-5">
    		        <button type="submit" class="btn btn-primary">Show</button>
    		    </div>
    		</div>
        </form>    
    
        <div class="col-lg-10 col-lg-offset-2">
            <table class="table table-striped table-hover ">
                
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Name</td>
                        <td>Price</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        
                        for( $i=0; $i<count($_POST['table_info']); $i++ ){
                            
                            ?>
                                <tr>
                                    <td><?php echo $i+1 ?></td>
                                    <td><?php echo $_POST['table_info'][$i]['name'] ?></td>
                                    <td><?php echo $_POST['table_info'][$i]['price'] ?></td>
                                </tr>
                            
                            <?php
                        }
                        
                    ?>
                </tbody>
            </table> 
        </div>
    </div>
    
    <div class="insert-goods" style="float:right; width:50%;">
 
        <form class="form-horizontal" action="?act=admin-insert-goods" method="post">
            <div class="form-group">
                <label for="inputLogin" class="col-lg-3 control-label">Name of product</label>
                <div class="col-lg-6">
                  <input type="text" class="form-control" name="name_of_product" >
            </div>
    	    </div>
    	    <div class="form-group">
                <label for="inputLogin" class="col-lg-3 control-label">Type of product</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="type_of_product">
                </div>
            </div>
            <div class="form-group">
    		    <label for="inputLogin" class="col-lg-3 control-label">Price of product</label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="inputLogin" name="price_of_product" >
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-3">
                    <button type="submit" class="btn btn-primary">Insert</button>
                </div>
            </div>
        </form>
    </div>
</div>