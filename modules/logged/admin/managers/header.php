<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a style="margin-left:50px; margin-right: 50px; font-size: 30px; " class="navbar-brand" href="#"><?php
        echo $_SESSION['user']['name'];
      ?></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li><a href="?page=manager-main">Managers</a></li>
        <li><a href="?page=goods-main">Goods</a></li>
        <li><a href="?page=admin-log">Log</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li style="margin-right:30px;"><a href="?page=add-manager" style="margin-left:5%;">+ADD</a></li>
        <li style="margin-right:50px;" ><a href="?act=logout" >Logout</a></li>
      </ul>
    </div>
  </div>
</nav>