<?php 

	include "header.php";

 ?>


<div class='container' width='80%'>
    <h1 style="font-family: 'Times New Roman'; color:#777777; font-weight: normal; margin-left:5%;">adding new manager</h1>
    <hr>
    <form action="?act=adding-manager" method="post" class='form-horizontal col-lg-offset-2'>
    <div class='form-group'>
        <label class='col-lg-2 control-label' for="login">Username</label>
        <div class='col-lg-6'>
            <input class='form-control' type="text" name="login"/>
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
        <label class='col-lg-2 control-label' for="name">Name</label>
        <div class='col-lg-6'>
            <input type="text" name="name" class='form-control'/>
        </div>
    </div>
    <div class='form-group'>
        <label class='col-lg-2 control-label' for="surname">Surname</label>
        <div class='col-lg-6'>
            <input type="text" name="surname" class='form-control'/>
        </div>
    </div>
    <div class='form-group'>
        <label class='col-lg-2 control-label' for="department">Department</label>
        <div class='col-lg-6'>
            <select name="department" class="form-control">
                <option value="1">Call Manager</option>
                <option value="2">Sales Manager</option>
                <option value="3">Support Manager</option>
                <option value="4">Quality Control Manager</option>
            </select>
        </div>
    </div>
    <div class='form-group'>
        <div class='col-lg-6 col-lg-offset-2'>
            <input class='btn btn-primary' type="submit" value="ADD"/>
        </div>
    </div>
</form>
</div>