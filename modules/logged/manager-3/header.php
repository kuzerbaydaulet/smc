<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a style="margin-left:100px;" class="navbar-brand" href="?"><?php
        echo $_SESSION['user']['name']." ".$_SESSION['user']['surname'];
      ?></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="?page=manager-3-log" >Log</a></li>
        <li><a style="margin: 0 0 0 20px" href="?act=change-status"  ><?php
        
          if( $_SESSION['user']['status']==1 ){
            echo "Free";
          }else{
            echo "Busy";
          }
        
        ?></a></li>
        <li style="margin-right:50px;" ><a href="?act=logout" >Logout</a></li>
      </ul>
    </div>
  </div>
</nav>