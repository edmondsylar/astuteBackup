<?php 
    $user_id = $_GET['uid'];
    $userid = Yii::app()->user->userUuid;
    $us = AcUsers::model()->findByAttributes(array('userUuid'=>$userid));
    if(!empty($us)){
      $user = $us['registrationUuid'];
      $userInfo = AcUserRegistration::model()->findByAttributes(array('registrationsUuid'=>$user));
      $name = $userInfo['names'];
    }else{
        $name = "System";
    }

?>

<div class="z-depth-1 search-tabs">
 <div class="search-tabs-container">
    <div class="col s12 m12 l12">
        <div class="row search-tabs-row search-tabs-header">
          <div class="col s12 m6 16 search-stats">
              <ul class="tabs">
                  <li class="tab col s10" style="text-align: left">
                      <span class="blue-text" style="font-size: 12px; text-transform: none; cursor: pointer;" onclick="back()" id="back"> <b>Users
                       </span>

                  </li>
              </ul>
          </div>
          <div class="col s10 m6 l6 right-align" style="margin-top: 5px;"> 
            <a class='dropdown-button' href='#' data-activates='dropdown'>
                <i class="material-icons waves-effect" style="color: #6C6C6C; margin-top: 10px;"> settings </i>
            </a>
            <!-- Dropdown Structure -->
            <ul id='dropdown' class='dropdown-content'>
                <li><a href="#!">one</a></li>
                <li><a href="#!">two</a></li>
                <li class="divider"></li>
                <li><a href="#!">three</a></li>
            </ul>
        </div>
    
          </div>
        </div>
    </div>
  </div>
</div>

<div class="card card-transparent no-m">
    <div class="card-content invoice-relative-content search-results-container">
        <div class="col s12 m12 l12">
            <div class="search-page-results">
                <div class="card z-depth-1">
                    <div class="card-content ">
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                            <tr>
                                <th style="width: 40px;">No.</th>
                                <th style="width: 250px;">Names</th>
                                <th style="width: 190px;">Email</th>
                                <th style="width: 190px;">Created On</th>
                                <th style="width: 190px;">Created By</th>

                            </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
							<?php 
								$invites = AcUserAddition::model()->findAll("updatedBy = '$user_id'");
								if(!empty($invites)){
									$count = 0;
									foreach($invites as $user){
										$count+=1;
										?>
											<tr>
												<td><?php echo $count; ?>.</td>
												<td><?php echo $user->names; ?></td>
												<td><?php echo $user->email; ?></td>
                                                <td><?php echo date_format(date_create($user->updatedOn), "d / F / Y"); ?></td>
                                                <td><?php echo $name; ?></td>
											</tr>
										<?php
									}
								}
							?>
							
						</table>
                    </div>
                </div>
            </div>
          </div>
      </div>
  </div>
</div>

<?php 
	include_once 'modals/createuser.php';
?>


<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
	<a class="btn-floating btn-small black waves-effect modal-trigger tooltipped" href="#createuser"  data-position="left" data-delay="50" data-tooltip="Create User">
    	<i class="material-icons">group_add</i>
    </a>
</div>
