<?php
    
    include "header.php";
    
    try {
        $result = $connection->query('SELECT * FROM managers WHERE id = '.$_GET['id']);
    } catch (Exception $e) {
    }
    if ($row = $result->fetch_array()) {
        $manager = $row;
    }
    switch ($manager['id']) {
        case 1:
            $selected1 = 'selected';
            break;
        case 2:
            $selected2 = 'selected';
            break;
        case 3:
            $selected3 = 'selected';
            break;
        case 4:
            $selected4 = 'selected';
            break;
        
        default:
            $selected1 = 'selected';
            break;
    }
?>


   <div class='container' width='80%'>
       <h1 style="font-family: 'Times New Roman'; color:#777777; font-weight: normal; margin-left:5%;">editing <?php echo $manager['name'].' '.$manager['surname'];?></h1>
       <hr>
       
       <form action='?act=editing-manager' method = 'post' class='form-horizontal col-lg-offset-2'>
        <div class='form-group'>
        <label class='col-lg-2 control-label' for="edit-login">Username</label>
        <div class='col-lg-6'>
            <input class='form-control' type="text" name="edit-login" value="<?php echo $manager['login'];?>"/>
        </div>
    </div>
    <div class='form-group'>
        <label class='col-lg-2 control-label' for="password">Password</label>
        <div class='col-lg-6'>
            <input type='password' name='password' class='form-control'/>
        </div>
    </div>
    <div class='form-group'>
        <label class='col-lg-2 control-label' for="re-password">Confirm password</label>
        <div class='col-lg-6'>
            <input type="password" name="re-password" class='form-control'/>
        </div>
    </div>
    <div class='form-group'>
        <label class='col-lg-2 control-label' for="edit-name">Name</label>
        <div class='col-lg-6'>
            <input type="text" name="edit-name" class='form-control' value="<?php echo $manager['name']?>"/>
        </div>
    </div>
    <div class='form-group'>
        <label class='col-lg-2 control-label' for="edit-surname">Surname</label>
        <div class='col-lg-6'>
            <input type="text" name="edit-surname" class='form-control' value="<?php echo $manager['surname']?>"/>
        </div>
    </div>
    <div class='form-group'>
        <label class='col-lg-2 control-label' for="edit-department">Department</label>
        <div class='col-lg-6'>
            <select name="edit-department" class="form-control">
                <option value="1" <?php echo $selected1;?>>Call Manager</option>
                <option value="2" <?php echo $selected2;?>>Sales Manager</option>
                <option value="3" <?php echo $selected3;?>>Support Manager</option>
                <option value="4" <?php echo $selected4;?>>Quality Control Manager</option>
            </select>
        </div>
    </div>
    <div class='form-group'>
        <div class='col-lg-6 col-lg-offset-2'>
            <input type="hidden" name="id" value="<?php echo $_GET['id']?>"/>
            <a href="?page=admin-managers" class="btn btn-default" >Cancel</a>
            <input class='btn btn-primary' type="submit" value="SAVE CHANGES"/>
        </div>
    </div>
</form>
   </div>         