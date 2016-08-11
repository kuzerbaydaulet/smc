<?php 

	include "header.php";

?>

<div class='container' width="80%">
    <h1 style="font-family: 'Times New Roman'; color:#777777; font-weight: normal; margin-left:5%;">manager CMS</h1>
<hr>
<table class='table table-striped table-hover'>
        
        <thead>
            <tr>
              <th>#</th>
              <th>Name and surname</th>
              <th>Editing</th>
              <th>Deleting</th>
            </tr>
        </thead>
        <tbody> 
<?php
    $managers[] = array();
    $i = 1;
    try {
        $result = $connection->query('SELECT id, name, surname FROM managers WHERE active = 1');
    } catch (Exception $e) {
        
    }
    while($row = $result->fetch_array()){
        $managers = $row;
        ?>
        <tr>
            <td class='col-lg-1'><?php echo $i;?></td>
            <td class='col-lg-6'><?php echo $managers['name'].' '.$managers['surname'];?></td>
            <td class='col-lg-1'><a href="?page=edit-manager&amp;id=<?php echo $managers['id'];?>">EDIT</a></td>
            <td class='col-lg-1'>
                <form action='?act=delete-manager' method='post'>
                    <input type="hidden" name="id" value="<?php echo $managers['id'];?>"/>
                    <input class='admin-delete' type='submit' value='DELETE'>
                </form>
            </td>
        </tr>
        

        <?php
        $i++;
    }
?>
</tbody>
    </table>
</div>
<style type="text/css">
    .admin-delete{
        background:none!important;
        border:none; 
        font: inherit;
        cursor: pointer;
    }
</style>


