<?php
  $uid = $_GET['s_uid'];
  $users = AcUsers::model()->findAll("status IN ('A')");
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
    /* background-color: white; */

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

<div class="z-depth-1 search-tabs">
 <div class="search-tabs-container">
    <div class="col s12 m12 l12">
        <div class="row search-tabs-row search-tabs-header">
          <div class="col s12 m6 16 search-stats">
              <ul class="tabs">
                  <li class="tab col s10" style="text-align: left">
                      <span class="grey-text" style="font-size: 14px; text-transform: none;"> <b>Users</b>

                  </li>
              </ul>
          </div>
          <div class="col s10 m6 l6 right-align" style="margin-top: 5px;">

              <!-- The breadcrumps bord start from here -->
                <span class="blue-text" style="text-transform: capitalize; margin-top: 5px; font-weight: 300; padding-top:5px;">
                  <a href="javascript:void(1)" data-activates="dropdown" class="dropdown-button dropdown-left">
                <i class="material-icons waves-effect tooltipped " data-delay="50" data-tooltip="Settings" style="color: #6C6C6C; margin-top: 10px;"> settings </i></a>
              </span>&nbsp;&nbsp;
                    <ul id='dropdown' class='dropdown-content2'>
                      <li class="droped">
                        <a style="color: black; font-weight: 400;" href="<?php echo $this->createUrl('user/permisions&s_uid='.$uid) ?>">Permissions</a>
                      </li>

                      <li class="droped">
                        <a style="color: black; font-weight: 400;" href="<?php// echo $this->createUrl('intelligence/country&Uid=' .$roleUuid) ?>">More</a>
                      </li>
                    </ul>
          </div>
        </div>
    </div>
  </div>
</div>
    <div class="card-content invoice-relative-content search-results-container">
        <div class="col s12 m12 l12">
            <div class="search-page-results">
                <div class="card z-depth-1">
                    <div class="card-content ">
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                            <tr>
                                <th style="width: 45px;">No.</th>
                                <th style="width: 250px;">Business Name</th>
                                <th style="width: 190px;">Business Type</th>
                                <th style="width: 250px;">Coutry</th>
                                <th style="width: 250px;">Updated On</th>
                                <th style="width: 250px;">Updated By</th>
                            </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <tbody>
                              <?php

                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
      </div>
