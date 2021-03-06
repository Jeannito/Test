<?php
/**
 * Created by PhpStorm.
 * User: jeanb2r
 * Date: 26/04/2017
 * Time: 17:09
 */
?>

<!DOCTYPE html>
<html>

<?php  include 'includes/header.php';  ?>

<body>

<?php  include 'includes/navbar.php';  ?>

	</br>

    <div>
      <form action="../controller/controller_recherche_vin.php" name="search" class="navbar-form" role="search" method="post" accept-charset="utf-8">
        <div class="form-group">
          <input type="text" name="motclef" id="Userlogin" class="form-control" placeholder="Tapez le mot clé">
        </div>
        <button type="submit" class="btn btn-default light-blue"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
        </form>
    </div>

    </br>


      <div class="box">
      <div class='container'>           
            <table class='responsive-table'>
              <thead>
              <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Sub Domain</th>
                <th>Is Treated</th>
              </tr>
              </thead>
              <tbody>
    <?php

    require_once '../model/model_request.php';
    $request = ModelRequest::GetAllRequest();
    foreach ($request as $onerequest) {
      $subDomain = $onerequest -> subDomain;
      $idUser = $onerequest -> idUser;
      $isTreated = $onerequest -> isTreated;
      $id_request = $onerequest -> id;

      require_once '../model/model_user.php';
      $user = ModelUser::GetUser($idUser);
    ?>
          <tr>
           <td><?php echo $user['firstname'];?></td>
           <td><?php echo $user['lastname'];?></td>
           <td><?php echo $subDomain;?></td>
           <td><?php
           if($isTreated == 1){
           	echo 'Yes';
           }else{
           	echo 'No';
           	}?>
           	</td>
           <td>
            <form action="../controller/controller_request.php"  name="profil" role="form" class="form-horizontal" method="post" accept-charset="utf-8">
            <input type="hidden" name="id_request" value="<?php echo $id_request;?>">
            <input   class="btn btn-primary btn btn-primary light-blue" type="submit" value="Request Details"/>
            </form>
           </td>
          </tr>
      <?php }?>
      </tbody>
      </table>
      </div>

</br>
</br>
</br>

</body>

<?php  include 'includes/footer.php';  ?>

</html>