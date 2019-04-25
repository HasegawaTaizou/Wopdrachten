<?php if( !isset( $_SESSION ) ) {
    session_start();
} ?>
<?php include("database/config.inc.php") ?>
<?php include("includes/configtitle.php") ?>
<div class="toppage">
  <img src="Images/banner.png" alt="Banner" usemap="#banner">
  <map name="banner">
  <area shape="circle" coords="150,120,120" href="Home.php">
  <area shape="rect" coords="1000,20,1500,60" href="herhaalrecept.php">
  <area shape="rect" coords="1025,80,1450,120" href="nieuw.php">
  <area shape="rect" coords="1100,130,1550,170" href="bestel.php"
  </map>
</div>
    <div class="Navigatie">
    	<ul class="nav nav-pills">
    	  <li class="nav-item">
    	    <a class="nav-link <?php if ($CURRENT_PAGE == "Home") {?>active<?php }?>" href="Home.php">Home</a>
    	  </li>
    	  <li class="nav-item">
    	    <a class="nav-link <?php if ($CURRENT_PAGE == "Info") {?>active<?php }?>" href="info.php">info</a>
    	  </li>
    	  <li class="nav-item">
    	    <a class="nav-link <?php if ($CURRENT_PAGE == "Service") {?>active<?php }?>" href="Service.php">Service</a>
    	  </li>
       <li class="nav-item">
        <a class="nav-link <?php if ($CURRENT_PAGE == "herhaalrecept") {?>active<?php }?>" href="herhaalrecept.php">herhaalrecept</a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if ($CURRENT_PAGE == "bestel") {?>active<?php }?>" href="bestel.php?id=0">bestel</a>
     </li>
        <li class="nav-item">
<?php if ($_SESSION["id"]>0):
  $id=$_SESSION["id"];
  $link = mysqli_connect($db['server'], $db['user'], $db['password'], $db['database']);
  $sql = "SELECT gebruikersnaam FROM gebruikers WHERE id=$id";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_row($result);
      $username = $row[0];
  }
  echo '<a class="nav-link" href="profilepage.php">welcome:'.$username.'</a>';
  ?>
<?php else:  if ($CURRENT_PAGE == "Login"||$CURRENT_PAGE == "register")
  {
    echo '<a class="nav-link active" href="Login.php">login/register</a>';
  }
  else {
    echo '<a class="nav-link" href="Login.php">login/register</a>';
  }  ?>

<?php endif; ?>
    	  </li>
    	</ul>
    </div>
