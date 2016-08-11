<?php 

	include "header.php";
	    try {
	        $result1 = $connection->query(' SELECT h.*, g.name 
	                                        FROM history_of_sales h 
	                                        LEFT OUTER JOIN goods g ON h.goods_id = g.id');
	        $result2 = $connection->query(' SELECT h.*, g.name 
	                                        FROM history_quality_control h 
	                                        LEFT OUTER JOIN goods g ON h.goods_id = g.id');
	        $result3 = $connection->query(' SELECT h.*, g.name 
	                                        FROM history_tech_support h 
	                                        LEFT OUTER JOIN goods g ON h.goods_id = g.id');
	        
	    } catch (Exception $e) {
	    }

 ?>
<script type="text/javascript">
   $().ready(function(){
       $('select').change(function(){
           if($(this).val() === 'period'){
               $('input.date-input').removeAttr('disabled');
           }else{
                $('input.date-input').attr({
                    'disabled':'disabled'
                });
           }
       });
   });
</script>

<div class='container' width="80%">
    <h1 style="font-family: 'Times New Roman'; color:#777777; font-weight: normal; margin-left:5%;">admin log</h1>
    <hr>
    
<ul class='nav nav-tabs'>
    <li class='active'><a href="#product" data-toggle='tab' aria-expanded="true">Product</a></li>
    <li class=''><a href='#manager' data-toggle='tab' aria-expanded="false">Manager</a></li>
    <li class=''><a href='#client' data-toggle='tab' aria-expanded="false">Client</a></li>
    <li class=''><a href='#department' data-toggle='tab' aria-expanded="false">Department</a></li>
    
</ul>

<div id='myTabContent' class='tab-content'>
    <div class='tab-pane fade active in' id='product'>
        <br>
        <form action='?act=show-log' method='post' align='center'>
            <select name="date" id='click-period'>
                <option value="day">Day</option>
                <option value="week">Week</option>
                <option value="month">Month</option>
                <option value="period" >Period</option>
            </select>
            <input class='date-input' type="date" name="from-date" disabled/>
            <input class='date-input' type="date" name="to-date" disabled/>
            <button type="submit" class="btn btn-primary">Show</button>
        </form>
        <br>
        <table class='table table-striped table-hover'>
            <tr>
                <td align='center' colspan='6'>[History of sales]</td>
            </tr>
                <tr>
                <td>No</td>
                <td>Product name</td>
                <td>Client id</td>
                <td>Manager id</td>
                <td>Date</td>
                <td>Result</td>
            </tr>
            
        <?php
            $i=1;
            while($row = $result1->fetch_array()){
                $product1 = (array) $row;
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><a href="?page=get-product-info&amp;id=<?php echo $product1['goods_id'];?>"><?php echo $product1['name'];?></a></td>
                    <td><?php echo $product1['client_id'];?></td>
                    <td><?php echo $product1['manager_id'];?></td>
                    <td><?php echo $product1['date'];?></td>
                    <td><?php echo $product1['result'];?></td>
                </tr>
                <?php
                $i++;
            }
        ?>
        </table>
        <table class='table table-striped table-hover'>
            <tr>
                <td align='center' colspan='6'>[History of quality control]</td>
            </tr>
            <tr>
                <td>No</td>
                <td>Product name</td>
                <td>Client id</td>
                <td>Manager id</td>
                <td>Complaints and suggestions</td>
                <td>Date</td>
            </tr>
            <?php
            $i=1;
            while($row = $result2->fetch_array()){
                $product2 = $row;
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><a href="?page=get-product-info&amp;id=<?php echo $product2['goods_id'];?>"><?php echo $product2['name'];?></a></td>
                    <td><?php echo $product2['client_id'];?></td>
                    <td><?php echo $product2['manager_id'];?></td>
                    <td><?php echo $product2['complaints_and_suggestions'];?></td>
                    <td><?php echo $product2['date'];?></td>
                    
                </tr>
                <?php
                $i++;
            }
            ?>
        </table>
        <table class='table table-striped table-hover'>
            <tr>
                <td align='center' colspan='6'>[History of tech support]</td>
            </tr>
            <tr>
                <td>No</td>
                <td>Product name</td>
                <td>Client id</td>
                <td>Manager id</td>
                <td>Cause</td>
                <td>Result</td>
                <td>Date</td>
            </tr>
            <?php
            $i = 1;
            while($row = $result3->fetch_array()){
                $product3 = (array) $row;
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td>
                        <a href="?page=get-product-info&amp;id=<?php echo $product3['goods_id'];?>">
                            <?php echo $product3['name'];?>
                        </a>
                    </td>
                    <td><?php echo $product3['client_id'];?></td>
                    <td><?php echo $product3['manager_id'];?></td>
                    <td><?php echo $product3['cause'];?></td>
                    <td><?php echo $product3['result'];?></td>
                    <td><?php echo $product3['date'];?></td>
                </tr>
                
                <?php
                $i++;
            }
            ?>
        </table>
    </div>
    <div class='tab-pane fade' id='manager'>
        <p>Hello</p>
    </div>
    <div class='tab-pane fade' id='client'>
        <p>Go ahead</p>
    </div>
    <div class='tab-pane fade' id='department'>
        <p>Thank you</p>
    </div>
</div>

<div>
    
</div>

</div>