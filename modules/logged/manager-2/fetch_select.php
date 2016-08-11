<?php
    
    if(isset($_POST['get_option'])){
        
        $client_id = $_POST['get_option'];
        $find=$connection->query("SELECT goods_id FROM history_of_sales WHERE client_id=$client_id");
        while($row=$find->fetch_array() ){
            echo "<option>".$row['goods_id']."</option>";
        }
        exit;  
    }
    echo "Hello!";
    
?>