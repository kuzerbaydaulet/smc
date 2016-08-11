<?php 

	session_start();
	require "init/db.php";

	$page = "login.php";
	$online = false;

	if(isset($_SESSION['user'])){
		
		$online = true;
		
		$login = $_SESSION['user']['login'];
		$password = $_SESSION['user']['password'];

		if( isset($_SESSION['user']['department']) ){
			
			$department = $_SESSION['user']['department'];
			
			$page = "manager-".$department."/manager-".$department."-first-page.php";

		}else{
			
			$query = $connection->query(" SELECT * FROM company WHERE login=\"".$login."\" AND password=\"".$password."\" ");
			
			if( $row = $query->fetch_array() ){
				
				$_SESSION['user'] = $row;
				
				$page = "admin/admin-first-page.php";
				
			}
			
		}

	}

	if( !$online ){

		if( isset($_GET['act']) ){

			if( $_GET['act']=="login" ){

				if(isset($_POST['login-field']) && isset($_POST['password-field'])){

					$login = mysql_escape_string($_POST['login-field']);
					$password = sha1(mysql_escape_string($_POST['password-field']));

					$query1 = $connection->query("SELECT * FROM company WHERE login = \"".$login."\" AND password = \"".$password."\" ");

					if($row = $query1->fetch_array()){
						$_SESSION['user'] = $row;
						
						$online = true;
						
						header("Location:?page=admin-first-page");
						
					}else{
						$query2 = $connection->query("SELECT * FROM managers WHERE login = \"".$login."\" AND password = \"" .$password."\" AND active = 1 ");

						if($row = $query2->fetch_array()){
							$_SESSION['user'] = $row;
							$online = true;
							
							$department = $_SESSION['user']['department'];
							
							header("Location:?page=manager-".$department."-first-page");
						
						}else{
						?>
							<script>
								alert("Enter correct login and password");
							</script>
						<?php
							$page = "login.php";
						}

					}

				}

			}else if( $_GET['act']=="registration-admin" ){

				if( isset( $_POST['log-field'] ) && isset( $_POST['pass-field'] ) && isset( $_POST['name-field'] ) && isset( $_POST['re-pass-field'] ) ){

					if( $_POST['log-field']!="" && $_POST['pass-field']!="" && $_POST['name-field']!="" && $_POST['re-pass-field']!="" ){

						if( $_POST['pass-field']==$_POST['re-pass-field'] ){

							$login = mysql_escape_string($_POST['log-field']);
							$pass = sha1(mysql_escape_string($_POST['pass-field']));
							$name = mysql_escape_string($_POST['name-field']);

							$query = $connection->query(" INSERT INTO company (id, login, password, name) VALUES (NULL, \"$login\", \"$pass\", \"$name\") ");
							
							$_SESSION['user']['login'] = $login;
							$_SESSION['user']['password'] = $pass;
							$_SESSION['user']['name'] = $name;
							
							$online = true;
							
							$page = "admin/admin-first-page.php";
							

						}else{
						?>
							<script>
								alert("Passwords do not match!");
							</script>
						<?php	
							$page = "login.php";
						}

					}else{
					?>
						<script>
							alert("Fill all fields!");
						</script>
					<?php
						$page = "login.php";	
					}


				}

			}
		}
		
		if( isset($_GET['page']) ){

			if( $_GET['page']=="login" ){

				$page = "login.php";

			}else{
			
				$page = "login.php";
			
			}
			
		}
		
	}else{
		
	//////////////////////////////////////////////////////////------ONLINE------////////////////////////////////////////////////////		
		if( isset($_GET['page']) ){
				
			if($_GET['page']=="admin-first-page"){

				$page = "admin/admin-first-page.php";
				
			}else if( $_GET['page']=="manager-1-first-page" ){
				
				$page = "manager-1/manager-1-first-page.php";
			
			}else if( $_GET['page']=="manager-2-first-page" ){
			
				$page = "manager-2/manager-2-first-page.php";
			
			}else if($_GET['page']=="return-goods"){
			
				$page = "manager-2/return-goods.php";
				
			}else if( $_GET['page']=="manager-3-first-page" ){
			
				$page = "manager-3/manager-3-first-page.php";
				
			}else if( $_GET['page']=="manager-4-first-page" ){
				
				$page = "manager-4/manager-4-first-page.php";
				
			}else if($_GET['page'] == 'manager-main'){
				$page = 'admin/managers/manager-main.php';
			}else if($_GET['page'] == 'goods-main'){
				$page = 'admin/goods/goods-main.php';
			}else if($_GET['page'] == 'admin-log'){
				$page = 'admin/admin-log.php';
			}else if($_GET['page'] == 'add-manager'){
				$page = 'admin/managers/add-manager.php';
			}else if($_GET['page'] == 'edit-manager'){
				$page = 'admin/managers/edit-manager.php';
			}else if( $_GET['page']=="manager-1-log" ){
				
				$page = "manager-1/manager-1-log.php";
				
			}else if( $_GET['page']=="manager-2-log" ){
				
				$page = "manager-2/manager-2-log.php";
				
			}else if( $_GET['page']=="manager-3-log" ){
				
				$page = "manager-3/manager-3-log.php";
				
			}else if( $_GET['page']=="manager-4-log" ){
				
				$page = "manager-4/manager-4-log.php";
				
			}
			
		}
		
		if( isset( $_GET['act'] ) ){

			if( $_GET['act']=="logout" ){

				unset($_SESSION['user']);
				header("Location:?page=login");
				$online = false;

			}else if($_GET['act']=="change-status"){
				
				if( $_SESSION['user']['status']==0 ){
					
					$query = $connection->query(" UPDATE managers SET status=1 WHERE id = ".$_SESSION['user']['id']);
					$_SESSION['user']['status'] = 1;
					header("Location:?page=manager-".$_SESSION['user']['department']."-first-page");
					
				}else{
					
					$query = $connection->query(" UPDATE managers SET status=0 WHERE id=".$_SESSION['user']['id']);
					$_SESSION['user']['status'] = 0;
					header("Location:?page=manager".$_SESSION['user']['department']."-first-page");
					
				}
				
			}else if($_GET['act']=='fill_goods_table'){
				
				if(isset($_POST['goods_type'])){
					
					if($_POST['goods_type']!=""){
						
						$goods_type = mysql_escape_string($_POST['goods_type']);
						
						$sql_text = "SELECT * FROM goods WHERE type = \"".$goods_type."\" ";
						$query = $connection->query($sql_text);
						
						$_POST['table_info'] = array();
						
						while($row = $query->fetch_array()){
							array_push($_POST['table_info'], $row);
						}
						
						$page = "admin/goods/goods-main.php";
						//header("Location:?page=goods-main");
					}
				}
				
			}else if($_GET['act']=='admin-insert-goods'){
				
				if(isset($_POST['name_of_product']) && isset($_POST['type_of_product']) && isset($_POST['price_of_product'])){
					
					if($_POST['name_of_product']!="" && $_POST['type_of_product']!="" && $_POST['price_of_product']!=""){
						$name_of_product = mysql_escape_string($_POST['name_of_product']);
						$type_of_product = mysql_escape_string($_POST['type_of_product']);
						$price_of_product = mysql_escape_string($_POST['price_of_product']);
						
						$sql_text = "INSERT INTO goods VALUES (NULL, \"$name_of_product\", \"$type_of_product\", \"$price_of_product\")";
						$query = $connection->query($sql_text);
						
						header("Location:?page=goods-main");
					}
				
				}
			
			}else if( $_GET['act']=="submit_technical_support"){
				
				if(isset($_POST['select_clients']) && isset($_POST['select_goods']) && isset($_POST['reason']) && isset($_POST['select_result']) ){

					if($_POST['select_clients']!="" && $_POST['select_goods']!="" && $_POST['reason']!="" && $_POST['select_result']!=""){
						$client_id = $_POST['select_clients'];
						$manager_id = $_SESSION['user']['id'];
						$good_id = $_POST['select_goods'];
						$cause = $_POST['reason'];
						$result = $_POST['select_result'];

						$query = $connection->query("INSERT INTO history_tech_support (id, client_id, manager_id, goods_id, cause, result, date) VALUES (NULL, \"$client_id\", \"$manager_id\", \" $good_id\", \"$cause \", \"$result\" , NOW() ) ");
						
						header("Location:?page=manager-3-first-page");

					}
					else{
						?>
						<script>
							alert("FILL ALL FIELDS!");
						</script>
						<?php
					}

				}

			}else if( $_GET['act']=="submit_quality_control"){
				if(isset($_POST['select_clients']) && isset($_POST['select_goods']) && isset($_POST['complaints']) ){
					if( $_POST['select_clients']!="" && $_POST['select_goods']!="" && $_POST['complaints']!=""){
						$client_id = $_POST['select_clients'];
						$manager_id = $_SESSION['user']['id'];
						$good_id = $_POST['select_goods'];
						$complaint = $_POST['complaints'];
						
						$sqlQuery = "INSERT INTO history_quality_control (id, client_id, manager_id, goods_id, 		complaints_and_suggestions, date) VALUES (NULL,\"$client_id\",\"$manager_id\",\"$good_id\", \"$complaint\", NOW() ) ";
						$query = $connection->query($sqlQuery);
						
						header("Location:?page=manager-4-first-page");
					}else{
						?>
						<script>
							alert("FILL ALL FIELDS!");
						</script>
						<?php
					}
				}

			}
			
			else if( $_GET['act']=='return_goods'){
				if(isset($_POST['client_id']) && isset($_POST['good_id']) && isset($_POST['cause']) ){
					if($_POST['client_id']!="" && $_POST['good_id']!="" && $_POST['cause']!=""){
					
						$client_id = $_POST['client_id'];
						$good_id = $_POST['good_id'];
						$cause = $_POST['cause'];
						
						$query = $connection->query("SELECT * FROM history_of_sales where client_id=$client_id AND goods_id=$good_id LIMIT 1");
						if($row = $query->fetch_object()){
							
							$sale_id = $row->id;
							
							$return_text = "INSERT INTO return_product (id, client_id, goods_id, cause, sales_id, date)
														VALUES (NULL, $client_id, $good_id, \"$cause\", $sale_id, NOW())";
							//echo $return_text;
							$return_query = $connection->query($return_text);
							
							//$check_query = $connection->query("SELECT * FROM return_product where client_id=$client_id AND goods_id=$good_id AND cause=\"$cause\"");
							/*if($row2 = $check_query->fetch_array()){
								
								echo "inserted into return_product";
							}*/
							
						}else{
							?>
							<script type="text/javascript">
								alert("NO MATCHES FOUND!");
							</script>
							<?php
							$page = "2/return-goods.php";
						}
						
					}else{
						?>
						<script>
							alert("FILL ALL FIELDS");
						</script>
						<?php
						$page = "manager-2/return-goods.php";
					}
				}
			}
			
			else if( $_GET['act']=="call-centre-new-client" ){
				
				
				if( isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['phone']) && isset($_POST['manager-id']) &&
				
					$_POST['name']!="" && $_POST['surname']!="" && $_POST['phone']!=""
				
				){
					
					$name = mysql_escape_string($_POST['name']);
					$surname = mysql_escape_string($_POST['surname']);
					$phone = mysql_escape_string($_POST['phone']);
					$manager = mysql_escape_string($_POST['manager-id']);
					
					if( isset($_POST['reject-check']) ){
						
						if( isset( $_POST['cause'] ) && $_POST['cause']!="" ){
							
							$cause = mysql_escape_string($_POST['cause']);
							
							$query = $connection->query(" INSERT INTO clients (id, phone, name, surname) VALUES (NULL, ".$phone.", \"".$name."\", \"".$surname."\" ) ");
							$id = $connection->insert_id;
							$query2 = $connection->query(" INSERT INTO history_call_center ( id, client_id, manager_to_id, rejection, rejection_cause, manager_from_id, date ) VALUES ( NULL, ".$id.", ".$manager.", 1, \"".$cause."\", ".$_SESSION['user']['id'].", NOW() ) ");
							
							header("Location:?page=manager-1-first-page");
							
						}else{
							?>
							<script>
								alert("FILL REJECT CAUSE FIELD!");
							</script>
						<?php
							$page = "manager-1/manager-1-first-page.php";
						}
						
					}else{	

						$query = $connection->query(" INSERT INTO clients (id, phone, name, surname) VALUES (NULL, ".$phone.", \"".$name."\", \"".$surname."\" ) ");
						$id = $connection->insert_id;
						$query2 = $connection->query(" INSERT INTO history_call_center ( id, client_id, manager_to_id, manager_from_id, date ) VALUES ( NULL, ".$id.", ".$manager.", ".$_SESSION['user']['id'].", NOW() ) ");
						
						header("Location:?page=manager-1-first-page");
						
					}
				
				}else{?>
					<script>
						alert("FILL ALL FIELDS!");
					</script>
				<?php
					$page = "manager-1/manager-1-first-page.php";
				}
				
				
			}else if($_GET['act']=='sales-department-old-client'){
				
				if(isset($_POST['client_id']) && isset($_POST['goods_id']) && isset($_POST['result'])){
					
					if($_POST['client_id']!="" && $_POST['goods_id']!="" && $_POST['result']!=""){
						$client_id = mysql_escape_string($_POST['client_id']);
						$manager_id = $_SESSION['user']['id'];
						$goods_id = mysql_escape_string($_POST['goods_id']);
						$result = mysql_escape_string($_POST['result']);
						
						$sql_text = "INSERT INTO history_of_sales VALUES (NULL , ".$client_id.", ".$manager_id.", ".$goods_id.", NOW(), \"".$result."\") ";
						
						$query = $connection->query($sql_text);
						
						header("Location:?page=manager-2-first-page");
						
					}else{
						
						?>
						
						<script>
							alert("FILL ALL FIELDS");
						</script>
						
						<?php
						
					}
				}
				
			}else if($_GET['act']=='sales-department-add-client'){
				
				if(isset($_POST['phone_number']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['goods']) && isset($_POST['result'])){
					
					if($_POST['phone_number']!="" && $_POST['name']!="" && $_POST['surname']!="" && $_POST['goods'] && $_POST['result']!=""){
						
						$manager_id = $_SESSION['user']['id'];
						$phone_number = mysql_escape_string($_POST['phone_number']);
						$name = mysql_escape_string($_POST['name']);
						$surname = mysql_escape_string($_POST['surname']);
						$goods_id = mysql_escape_string($_POST['goods']);
						$result = mysql_escape_string($_POST['result']);
						
						
						$sql_text = "INSERT INTO clients VALUES (NULL, \"".$phone_number."\", \"".$name."\", \"".$surname."\") ";
						echo $sql_text;
						$query = $connection->query($sql_text);
						$id = $connection->insert_id;
						
						$sql_text2 = "INSERT INTO history_of_sales VALUES (NULL, ".$id.", ".$manager_id.", ".$goods_id.", NOW(), \"".$result."\")";
						$query2 = $connection->query($sql_text2);
						
						header("Location:?page=manager-2-first-page");
					}
					
				}
					
			}else if( $_GET['act']=="call-centre-old-client" ){
				
				
				if( $_POST['client-id']!="" && $_POST['manager-id']!="" ){ 
					
					$client = mysql_escape_string($_POST['client-id']);
					$manager = mysql_escape_string($_POST['manager-id']);
					
					if( isset($_POST['reject-check']) ){
						
						if( isset( $_POST['cause'] ) && $_POST['cause']!="" ){
								
								$cause = mysql_escape_string($_POST['cause']);
								
								$query2 = $connection->query(" INSERT INTO history_call_center ( id, client_id, manager_to_id, rejection, rejection_cause, manager_from_id, date ) VALUES ( NULL, ".$client.", ".$manager.", 1, \"".$cause."\", ".$_SESSION['user']['id'].", NOW() ) ");
								
								header("Location:?page=manager-1-first-page");
								
						}else{
								?>
								<script>
									alert("FILL REJECT CAUSE FIELD!");
								</script>
							<?php
								$page = "manager-1/manager-1-first-page.php";
						}
						
					}else{
							
							$query = $connection->query(" INSERT INTO history_call_center ( id, client_id, manager_to_id, manager_from_id, date ) VALUES ( NULL, ".$client.", ".$manager.", ".$_SESSION['user']['id'].", NOW() )  ");
							
							header("Location:?page=manager-1-first-page");
							
						}
						
				}else{?>
							
					<script>
						alert("FILL ALL FIELDS");
					</script>
							
				<?php
				}
				
			}else if ($_GET['act'] == 'adding-manager') {
				$login = $_POST['login'];
				if ($_POST['password'] === $_POST['re-password']) {
					$password = sha1($POST['password']);
				}
				$name = $_POST['name'];
				$surname = $_POST['surname'];
				$department = $_POST['department'];
				try {
					$query = $connection->query("INSERT INTO managers VALUES (NULL, \"$login\", \"$password\", \"$name\", \"$surname\", \"$department\", ".$_SESSION['user']['id'].", 0, 1)");
				} catch (Exception $e) {
					$error = "ERROR OCCURED";
				}
				header('Location:?page=manager-main');
			}else if($_GET['act'] == 'editing-manager'){
				
				$sql = "";
				$login = $_POST['edit-login'];
				if (!empty($_POST['password'])) {
					if (!empty($_POST['re-password'])) {
						$password = sha1($_POST['password']);
						$sql = "password = \"$password\",";
					}
				}
				$name = $_POST['edit-name'];
				$surname = $_POST['edit-surname'];
				$department = $_POST['edit-department'];
				
				try {
					$query = $connection->query("	UPDATE managers
													SET login = \"$login\",
													$sql
													name = \"$name\",
													surname = \"$surname\",
													department = \"$department\" WHERE id=".$_POST['id']);
													
				} catch (Exception $e) {
					$error = ucfirst("error occured while updating user");
				}
				echo "	UPDATE managers
													SET login = \"$login\",
													$sql,
													name = \"$name\",
													surname = \"$surname\",
													departament = \"$department\" WHERE id=".$_POST['id'];
				header('Location:?page=manager-main');
			}else if ($_GET['act'] == 'delete-manager') {
				try {
					$query = $connection->query("UPDATE managers SET active = 0 WHERE id = ".$_POST['id']);
				} catch (Exception $e) {
				}
				header('Location:?page=manager-main');
			}else if( $_GET['act']=="manager-1-log" ){
				
				if( $_POST['client-id']!="" ){
					
					$_POST['call-centre-log'] = array();
					$query = $connection->query(" SELECT * FROM history_call_center WHERE client_id= ".$_POST['client-id']);
					
					while( $row = $query->fetch_array() ){
						
						array_push( $_POST['call-centre-log'], $row );
						
					}
					
				}
					
				$page = "manager-1/manager-1-log.php";
				
			}else if( $_GET['act']=="manager-2-log" ){
				
				if( $_POST['client-id']!="" ){
					
					$_POST['sales-log'] = array();
					$query = $connection->query(" SELECT * FROM history_of_sales WHERE client_id= ".$_POST['client-id']);
					
					while( $row = $query->fetch_array() ){
						
						array_push( $_POST['sales-log'], $row );
						
					}
					
				}
					
				$page = "manager-2/manager-2-log.php";
				
			}else if( $_GET['act']=="manager-3-log" ){
				
				if( $_POST['client-id']!="" ){
					
					$_POST['tech-log'] = array();
					$query = $connection->query(" SELECT * FROM history_tech_support WHERE client_id= ".$_POST['client-id']);
					
					while( $row = $query->fetch_array() ){
						
						array_push( $_POST['tech-log'], $row );
						
					}
					
				}
					
				$page = "manager-3/manager-3-log.php";
				
			}else if( $_GET['act']=="manager-4-log" ){
				
				if( $_POST['client-id']!="" ){
					
					$_POST['qual-log'] = array();
					$query = $connection->query(" SELECT * FROM history_quality_control WHERE client_id= ".$_POST['client-id']);
					
					while( $row = $query->fetch_array() ){
						
						array_push( $_POST['qual-log'], $row );
						
					}
					
				}
					
				$page = "manager-4/manager-4-log.php";
				
			}else if($_GET['act'] == 'show-log'){
				if (isset($_POST['date'])) {
					
					$sql1 = "";
					switch ($_POST['date']) {
						case 'day':
							$sql1 = "(CURDATE()-1) AND date < CURDATE()";
							break;
						case 'week':
							$sql1 = " DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)";
							break;
						case 'month':
							$sql1 = "DATE_SUB(CURRENT_DATE, INTERVAL 30 DAY)";
							break;
						default:
							$sql1 = "(CURDATE()-1) AND date < CURDATE()";
							break;
							
					}
					
					try {
						$result1 = $connection->query("SELECT h.*, g.name 
		                                        FROM history_of_sales h 
		                                        LEFT OUTER JOIN goods g ON h.goods_id = g.id
		                                        WHERE date >= \"$sql1\"");
					} catch (Exception $e) {
					}
					$product1[] = array();
					while($row = $result1->fetch_array()){
						$product1 = $row;
					}
					print_r($product1);
					$page = "admin/admin-log.php";
			
				}
			}

		}
		

	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>SMC</title>
	<link rel="stylesheet" type="text/css" href="dist/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script src = "js/jquery-1.11.3.min.js"></script>
</head>
<body>
	<div class="main">
		<?php
			include "modules/".($online?"logged/":"notlogged/").$page ;
		?>
	</div>
</body>
</html>