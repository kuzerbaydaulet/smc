<div class="container" width='80' style="margin-top:6.5%; ">
<h1 style="font-family: 'Times New Roman'; color:#777777; font-weight: normal; margin-left:22%;">authorization&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspregistration</h1>

<hr>
<div class="login" style="float:left; width:50%;" >
	
	
	<form class="form-horizontal"  action="?act=login" method="POST" >
  		<fieldset>
		    <div class="form-group">
		      <label for="inputLogin" class="col-lg-5 control-label">Login</label>
		      <div class="col-lg-6">
		        <input type="text" class="form-control" id="inputLogin" name="login-field" >
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="inputPassword" class="col-lg-5 control-label">Password</label>
		      <div class="col-lg-6">
		        <input type="password" class="form-control" id="inputPassword" name="password-field" >
		      </div>
		    </div>
		    <div class="form-group">
		      	<div class="col-lg-10 col-lg-offset-5">
		        	<button type="submit" class="btn btn-primary">Enter</button>
				</div>
		    </div>
  		</fieldset>
	</form>
</div>

<div class="register" style=" float:right; width:50%;">
	<form class="form-horizontal" action="?act=registration-admin" method="post" >
	    <fieldset>      
	      	<div class="form-group">
	        	<label for="inputEmail" class="col-lg-3 control-label">Login</label>
	      
	        	<div class="col-lg-6">
	          		<input type="text" class="form-control" id="inputEmail" name="log-field" >
	        	</div>    
	      	</div>
	  
	      	<div class="form-group">
	        	<label for="inputPassword" class="col-lg-3 control-label">Password</label>
	            
	        	<div class="col-lg-6">
	          		<input type="password" class="form-control" id="inputPassword" name="pass-field">
	       		</div>
	      	</div>
	
	      	<div class="form-group">
	        	<label for="inputPassword" class="col-lg-3 control-label">Repeat password</label>
	            
	        	<div class="col-lg-6">
	          		<input type="password" class="form-control" id="inputPassword" name="re-pass-field">
	        	</div>
	      	</div>
	
	      	<div class="form-group">
	        	<label for="inputEmail" class="col-lg-3 control-label">Name of company</label>
	               
	        	<div class="col-lg-6">
	          		<input type="text" class="form-control" id="inputEmail" name="name-field">
	        	</div>
	     	</div>
	
	      	<div class="form-group">
	        	<div class="col-lg-10 col-lg-offset-3">
	         		<button type="submit" class="btn btn-primary">Sign up</button>
	        	</div>
	      	</div>
	    </fieldset>
  	</form>
</div>
</div>