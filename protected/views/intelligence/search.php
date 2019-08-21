<?php
$userperm =Yii::app()->user->userperm;
$userid = Yii::app()->user->userUuid;
//$role = Yii::app()->user->role;
$allowpeopleview = array("2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
$allowpeoplesearch = array("2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
$allowintelligenceview = array("2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
//$privilege = array("9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
$allowpeopleset = array("9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","55","56","57","58","59","60","61","62","63","64","65","66","67","68","69","70","71","72","73","74","75","76","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
//$userValue = AUserRoles::model()->findByAttributes(array('assignedTo'=>$userid));
//$role = $userValue->RoleUuid;
$roleUuid = $_GET['Uid'];
$find_my_perm = ARolePermissions::model()->findByAttributes(array('RoleUuid'=>$roleUuid));
$perm = $find_my_perm->PermissionUuid;
$found = IPermissions::model()->findByAttributes(array('permissionUuid'=>$perm));
$access = $found->permissionVariable;
?>
<style media="screen">
  .search-bar-form{
    position: absolute;
    background-color: white;
    width: 68%;
    margin-top: 12%;
    margin-left: 8.5%;
    height: 55%;
    border-radius: 5px;
  }
  body{
    background-color: white;

  }

  .search-bar{
    width: 90%;
  }

  input[type=search-space]{
    background-color: white;
    border: none;
    width: 85%;
    border-radius: 55px;
    padding: 25px 35px;
    margin-top: 3%;
    /* border: 1px solid black; */

  }


  input[type=search-space]:focus{
    outline: none;
  }

  .design{
    padding: 12px 45px 12px;
    /* background-color: gray; */
    border-radius: 3px;
    margin: 10px;
    cursor: no-drop;
  }

  .mid-search{
    margin-top: 25px;
    margin-left: 16%;
  }
  .dropdown-content2 {
      display: none;
      position: absolute;
      margin-top: 38px;
      background-color: white;
      min-width: 200px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      /* padding: 12px 16px; */
      z-index: 1;
      text-align: left;
      color: black;
      border-radius: 5px;
}

.droped{
  display: block;
  padding:10px 20px;
  color: black;
  text-decoration: none;
  /* display: none; */
}
.droped:hover{
  background-color: whitesmoke;
  border-radius: inherit;
}

.designs {
  margin-top: 10px;
  font-weight: 500;
}

.astute-menu{
    margin-top: 2%;
    font-size: 65px;
}

</style>

<?php if (in_array("$access", $allowpeopleview)) { ?>
<div class="z-depth-1 search-tabs">
 <div class="search-tabs-container">
    <div class="col s12 m12 l12">
        <div class="row search-tabs-row search-tabs-header">
          <div class="col s12 m6 16 search-stats">
              <ul class="tabs">
                  <li class="tab col s10" style="text-align: left">
                      <span class="grey-text" style="font-size: 14px; text-transform: none;"> <b>Search</b>

                  </li>
              </ul>
          </div>
          <div class="col s10 m6 l6 right-align" style="margin-top: 5px;">
              <?php if (in_array("$access", $allowpeopleset)) { ?>
            <span class="blue-text" style="margin-top: 5px; font-weight: 300; padding-top:5px;">

              <a href="javascript:void(1)" onclick="draft()" class="dropdown-button dropdown-right">
                <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="Search History" style="color: #6C6C6C; margin-top: 10px;"> history </i></a>
            </span>&nbsp;&nbsp;
              <?php } else {
              }
              ?>
              <?php if (in_array("$access", $allowintelligenceview)) { ?>
            <span class="blue-text" style="margin-top: 5px; font-weight: 300; padding-top:5px;">

              <a href="javascript:void(1)" onclick="draft()" class="dropdown-button dropdown-right">
                <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="Draft Profiles" style="color: #6C6C6C; margin-top: 10px;"> assignment </i></a>
            </span>&nbsp;&nbsp;
                  <?php } else {
                  }
                  ?>
              <?php if (in_array("$access", $allowpeopleset)) { ?>
                <span class="blue-text" style="margin-top: 5px; font-weight: 300; padding-top:5px;">
                  <a href="javascript:void(1)" onclick="draft()" class="dropdown-button dropdown-right">
                    <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="Draft Searches" style="color: #6C6C6C; margin-top: 10px;"> pageview </i></a>
                </span>&nbsp;&nbsp;
              <?php } else {
              }
              ?>
              <?php if (in_array("$access", $allowintelligenceview)) { ?>
                <span class="blue-text" style="margin-top: 5px; font-weight: 300; padding-top:5px;">
                  <a href="javascript:void(1)" onclick="draft()" class="dropdown-button dropdown-right">
                    <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="Intelligence Alerts" style="color: #6C6C6C; margin-top: 10px;"> add_alert </i></a>
                </span>&nbsp;&nbsp;
              <?php if (in_array("$access", $allowpeopleset)) { ?>
                <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
                  <a href="javascript:void(1)" data-activates="dropdown" class="dropdown-button dropdown-left">

                <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="Settings" style="color: #6C6C6C; margin-top: 10px;"> settings </i></a>
              </span>&nbsp;&nbsp;
                    <ul id='dropdown' class='dropdown-content2'>
                      <li class="droped"><a style="color: black; font-weight: 400;" href="<?php echo $this->createUrl('intelligence/weights&Uid=' .$roleUuid) ?>">Connection Weights</a></li>
                      <li class="droped"><a style="color: black; font-weight: 400;" href="<?php echo $this->createUrl('intelligence/country&Uid=' .$roleUuid) ?>">Country Types</a></li>
                      <li class="droped"><a style="color: black; font-weight: 400;" href="<?php echo $this->createUrl('intelligence/datetypes&Uid=' .$roleUuid) ?>">Date Types</a></li>
                      <li class="droped"><a style="color: black; font-weight: 400;" href="<?php echo $this->createUrl('intelligence/gender&Uid=' .$roleUuid) ?>">Gender</a></li>
                      <li class="droped"><a style="color: black; font-weight: 400;" href="<?php echo $this->createUrl('intelligence/imagecategory&Uid=' .$roleUuid) ?>">Image Category</a></li>
                      <li class="droped"><a style="color: black; font-weight: 400;" href="<?php echo $this->createUrl('intelligence/intelligence&Uid=' .$roleUuid) ?>">Intelligence</a></li>
                      <li class="droped"><a style="color: black; font-weight: 400;" href="<?php echo $this->createUrl('intelligence/intelligencecategories&Uid=' .$roleUuid) ?>">Intelligence Categories</a></li>
                        <li class="droped"><a style="color: black; font-weight: 400;" href="<?php echo $this->createUrl('intelligence/profiletypes&Uid=' .$roleUuid) ?>">Profile Types</a></li>
                        <li class="droped"><a style="color: black; font-weight: 400;" href="<?php echo $this->createUrl('intelligence/refrences&Uid=' .$roleUuid) ?>">Reference Types</a></li>
                    </ul>
                  <?php } else {
                  }
                  ?>
              <?php } else {
              }
              ?>
          </div>
        </div>
    </div>
</div>
</div>


    <form class="search-bar-form center" action="" method="POST" style="margin-right: 50px;">
      <input type="search-space" name="search-bar" style="" placeholder="Search intelligence" class="search-bar z-depth-2" autofocus autocomplete="off" required><br>
    </form>


<script type="text/javascript">
    function back(){
      window.location.href="<?php echo $this->createUrl('intelligence/index&Uid=' .$roleUuid); ?>";
    }
  function draft(){

    window.location.href=" <?php echo $this->createUrl('intelligence/drafts&Uid=' .$roleUuid) ?> ";
  }
</script>
<?php } else {
}
?>