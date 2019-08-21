<?php 
    $userid = Yii::app()->user->userUuid;
    $businesses = AcBusiness::model->findAll(array('updatedBy'=>$userid));
    
?>

    <li class="notificatoins-dropdown-container" style="overflow: hidden;" >
        <ul>
            <li>
            <li class="notification-drop-title">
                Business Menu
            </li>
            <?php
                if(!empty($businesses)){
                    ?>
                         <li>
                            <a href="<?php //echo $this->createUrl('user/switch_account'); ?>">
                                <div class="notification">
                                <div class="notification-icon circle cyan"><i class="material-icons">business</i></div>
                                    <span class="blue-text">Business <?php 
                                        $classCode = new Encryption();
                                        $bsname = $classCode->decode($businesses['businessName']);

                                         echo $bsname ?>
                                    </span>
                                </div>
                            </a>  
                        </li>
                    <?php
                }else{
                    ?>
                        <small>You have no Businesses</small>
                    <?php
                }
            ?>

            <br>
            <li class="notification-drop-title">
                <div class="notification left button-pads-left">
                    <div class="notification-icon">
                        <a href="#createbss" class="btn-floating green tooltipped modal-trigger" data-delay="50" data-tooltip="Create New Business"  data-position="right">
                            <i class="material-icons" >add</i>
                        </a>
                    </div>
                </div>

                <div class="notification right button-pads-right">
                    <div class="notification-icon">
                        <a href="#" class="btn-floating red modal-trigger tooltipped" data-delay="50" data-tooltip="More Settings"  data-position="left">
                            <i class="material-icons" >more_vert</i>
                        </a>
                    </div>
                </div>

            </li>
        </ul>
    </li>
</ul>
