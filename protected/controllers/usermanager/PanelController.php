<?php

class PanelController extends Controller {

    public $old_role;
    public $role_attach;

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            //maker
            array('allow', // allow all users to perform 'index' actions
                'actions' => array('index'),
                'users' => array('@'),
            ),
            array('allow', // allow all users to perform 'index' actions
                'actions' => array('permissions', 'roles', 'assign','userroles','checkuser'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {

        $this->render('index');
    }

    ############################################################################

    public function actionPermissions($Uid)
    {
        $userid = Yii::app()->user->userUuid;

        //add permission
        if (isset($_POST['permission-description'])) {
            $uid = uniqid('', true);
            $model = new IPermissions();
            $model->permissionUuid = $uid;
            $model->Description = $_POST['permission-description'];
            $model->permissionVariable = strtoupper($_POST['permission']);
            $model->UserUuid = $userid;
            //was not saving to the db but the temporary solution would be adding false in the save brackets
            if ($model->save(false)) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('usermanager/panel/permissions&Uid=' .$Uid));
        }

        //        update permission description
        if (isset($_POST['new_description'])) {
            $id = $_POST['permission_id'];
            $model = IPermissions::model()->findByPk($id);
            $model->Description = $_POST['new_description'];
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('usermanager/panel/permissions&Uid=' .$Uid));
        }

//        delete permission
        if (isset($_POST['permission_id_delete'])) {
            $id = $_POST['permission_id_delete'];
            $model = IPermissions::model()->findByPk($id);
            $model->status = 'X';
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('usermanager/panel/permissions&Uid=' .$Uid));
        }

        //changing permission status
        if (isset($_POST['permission-status'])) {
            $status = $_POST['permission-status'];
            $permission_id = $_POST['permission-id'];

            $model = IPermissions::model()->findByPk($permission_id);
            switch ($status) {
                case 'A': $model->status = 'C';
                    break;
                case 'C': $model->status = 'A';
                    break;
                case 'X': $model->status = 'A';
                    break;
            }
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('usermanager/panel/permissions&Uid=' .$Uid));
        }


        $permissions = IPermissions::model()->findAll("status IN ('A','C')");
        $this->render('permissions', array('model' => $permissions,));
    }

    ############################################################################

    public function actionRoles($Uid)
    {
        $userid = Yii::app()->user->userUuid;

        $find = AUserRolesInvitations::model()->findByAttributes(array('userUuid'=>$userid));
        $business = $find->businessUuid;

        //add role
        if (isset($_POST['role-description'])) {
            $uid = uniqid('', true);
            $model = new IRoles();
            $model->roleUuid = $uid;
            $model->Description = $_POST['role-description'];
            $model->roleName = strtoupper($_POST['role-name']);
            $model->businessUuid = $business;
            $model->userUuid = $userid;
            //was not saving to the db but the temporary solution would be adding false in the save brackets
            if ($model->save(false)) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('usermanager/panel/roles&Uid=' .$Uid));
        }

        //        update role description
        if (isset($_POST['new_description'])) {
            $id = $_POST['role_id'];
            $model = IRoles::model()->findByPk($id);
            $model->Description = $_POST['new_description'];
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('usermanager/panel/roles&Uid=' .$Uid));
        }

//        delete role
        if (isset($_POST['role_id_delete'])) {
            $id = $_POST['role_id_delete'];
            $model = IRoles::model()->findByPk($id);
            $model->status = 'X';
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('usermanager/panel/roles&Uid=' .$Uid));
        }

        //changing role status
        if (isset($_POST['role-status'])) {
            $status = $_POST['role-status'];
            $role_id = $_POST['role-id'];

            $model = IRoles::model()->findByPk($role_id);
            switch ($status) {
                case 'A': $model->status = 'C';
                    break;
                case 'C': $model->status = 'A';
                    break;
                case 'X': $model->status = 'A';
                    break;
            }
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('usermanager/panel/roles&Uid=' .$Uid));
        }



        $roles = IRoles::model()->findAll("status IN ('A','S','BA') and userUuid = '$userid'");

        $this->render('roles', array('model' => $roles,));
    }

//    ##########################################################################

    public function actionAssign($Uid){
        $userid = Yii::app()->user->userUuid;

        //assigning permission
        if (isset($_POST['role-perm'])) {
            $role_id = $_POST['role'];
            $items_count = $_POST['perm_count']; // getting count of all permissions
            $previous_selection = $_POST['existing_role_permissions']; // getting previous selection
            $r = 1; //initiating counter
            $item_selection = "";
            while ($r <= $items_count) {
                if (!empty($_POST['permission' . $r])) {
                    $item_selection .= rtrim($_POST['permission' . $r] . ',');
                } $r++;
            }
            // $item_selection = array();
            $old_selections = explode(',', $previous_selection);
            //$item_selection =
            $new_selections = explode(',', $item_selection);

            //             adding non existing mapping
            foreach ($new_selections as $new_selection) {
                if (!in_array("$new_selection", $old_selections)) {
                    $rid = uniqid(true);
                    $model = new ARolePermissions();
                    $model->RolePermissionUuid = $rid;
                    $model->RoleUuid = $role_id;
                    $model->PermissionUuid = $new_selection;
                    $model->updatedBy = $userid;
                    $model->save(false);

                }
            }

            //              removing existing mapping
            foreach ($old_selections as $old_selection) {
                if (!in_array("$old_selection", $new_selections)) {

                    $model3 = ARolePermissions::model()->findAllByAttributes(array( 'RoleUuid' => $role_id, 'PermissionUuid' => $old_selection));
                    if (!empty($model3)) {
                        foreach ($model3 as $record) {
                            $record->status = 'X';
                            if ($record->update(false)) {
                                //log success
                            } else {
                                //log error
                            }
                        }
                    } else { }
                }
            }

            $this->redirect(array('usermanager/panel/assign&Uid=' .$Uid));
        }

        $userpermissions = ARolePermissions::model()->findAll("status IN ('A','C') and updatedBy = '$userid'");
        $this->render('assign', array('model' => $userpermissions,));
    }


//    ##########################################################################
    public function actionUserRoles($Uid)
    {
        $userid = Yii::app()->user->userUuid;
        $classCode = new Encryption();
        $classLog = new Logs();
        $classMail = new Mail();
        $print = NULL;


        //assign user roles
        if (isset($_POST['role'])) {
            $role_id = $_POST['role'];
            $user = $_POST['user'];

            //find default role
            $assign_default_role = IRoles::model()->findByAttributes(array('status'=>'D'));
            $role = $assign_default_role->roleUuid;

            // find business attached to the business owner who invited the business admin
            $business_creator = AUserRolesInvitations::model()->findByAttributes(array('userUuid'=>$userid));
            $business = $business_creator->businessUuid;

            $find_business = TBusiness::model()->findByAttributes(array('businessUuid'=>$business));
            $businessName = $find_business->businessName;

            // check if the invited user is registered already if not redirect back to page and inform user
            $record = TUsers::model()->find(" BINARY username = '$user'");
            if ($record === null) {
                //invalid
                $usernameCheck = TUsers::model()->find(" BINARY username = '$user'");
                if (empty($usernameCheck)) {

                    //send email to person informing them to register
                    $subject = "Invitation To Register to Work in Astute Under '$businessName' ";
                    $userEmail = $user;
                    $owner = $businessName;
                    $link = "http://localhost/astute-web/index.php?r=user/login";
                    $message = $classMail->userTemplate($userEmail, $owner, $link);
                    $sendEmail = $classMail->mailSend3($user, $subject, $message);

                    if ($sendEmail == TRUE) {

                        //find email of business system admin
                        $admin = TUsers::model()->findByAttributes(array('userUuid'=>$userid));
                        $BA = $admin->username;

                        //save invited users till they are registered in the system
                        $l = uniqid(true);
                        $guest =  new AInvitedSystemUsers();
                        $guest->invitedSystemUserUuid = $l;
                        $guest->invitedUser = $user;
                        $guest->businessSystemAdmin = $BA;
                        $guest->businessUuid = $business;
                        $guest->invitedBy = $userid;
                        $guest->save(false);

                        $message = "USER failed to send invitation , incorrect email($user)";
                        $print = "<i class='material-icons tiny'>error</i> The Invited user is not registered in the system please alert them to create an account first.";
                    }
                } else {
                    $message = "USER  failed to send invitation, account not active @$user";
                    $print = "<i class='material-icons tiny'>error</i> Your astute account is not active.";
                }
                $classLog->error($message);
            }
            else
            {
                //find user if exists and assign them a role
                $find_user = TUsers::model()->findByAttributes(array('username'=>$user));
                if($find_user === null)
                {

                }
                else{

                    $userUuid = $find_user->userUuid;

                    // check if role already exists for the user under that business
                    $role_existence = AUserRoles::model()->find("RoleUuid = '$role' AND assignedTo = '$userUuid' AND businessUuid = '$business'");

                    if($role_existence === null)
                    {
                        $uid = uniqid('', true);
                        $model = new AUserRoles();
                        $model->userRoleUuid = $uid;
                        $model->RoleUuid = $role_id;
                        $model->assignedTo = $userUuid;
                        $model->assignedBy = $userid;
                        $model->businessUuid = $business;

                        if ($model->save(false)) {

                            //update user to new role
                            $update_user_perm = TUsers::model()->findAllByAttributes(array('userUuid'=>$userUuid));
                            foreach ($update_user_perm as $update) {
                                $update->userperm ='2';
                                $update->update(false);
                            }

                        } else {
                            //LOG ERROR
                        }
                        $this->redirect(array('usermanager/panel/userroles&Uid=' .$Uid));
                    } else {
                        //if it exist update it with new role
                        $role_update = AUserRoles::model()->findAllByAttributes(array('RoleUuid' => $role, 'assignedTo' => $userUuid, 'businessUuid'=>$business));
                        foreach ($role_update as $update) {
                            $update->RoleUuid = $role_id;
                            $update->assignedBy = $userid;
                            if ($update->update(false)) {

                                // update user to new role
                                $update_user_perm = TUsers::model()->findAllByAttributes(array('userUuid'=>$userUuid));
                                foreach ($update_user_perm as $record) {
                                    $record->userperm ='2';
                                    $record->update(false);
                                }
                            } else {
                                //log error
                            }
                        }
                    }
                }

            }
            $this->redirect(array('usermanager/panel/userroles&Uid=' .$Uid));

        }

        //        update role description
        if (isset($_POST['new_description'])) {
            $id = $_POST['role_id'];
            $model = IRoles::model()->findByPk($id);
            $model->Description = $_POST['new_description'];
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('usermanager/panel/userroles&Uid=' .$Uid));
        }

//        delete role
        if (isset($_POST['role_id_delete'])) {
            $id = $_POST['role_id_delete'];
            $model = IRoles::model()->findByPk($id);
            $model->status = 'X';
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('usermanager/panel/userroles&Uid=' .$Uid));
        }

        //changing role status
        if (isset($_POST['role-status'])) {
            $status = $_POST['role-status'];
            $role_id = $_POST['role-id'];

            $model = IRoles::model()->findByPk($role_id);
            switch ($status) {
                case 'A': $model->status = 'C';
                    break;
                case 'C': $model->status = 'A';
                    break;
                case 'X': $model->status = 'A';
                    break;
            }
            if ($model->update()) {
                //LOG SUCCESS
            } else {
                //LOG ERROR
            }
            $this->redirect(array('usermanager/panel/userroles&Uid=' .$Uid));
        }

            $privilege = TUsers::model()->findByAttributes(array('userperm'=>'91'));
            $ref = $privilege->userperm;

            if($ref === null)
            {
                $roles = AUserRoles::model()->findAll("status IN ('A','C') and assignedBy ='$userid'");
            }
            else
            {
                $roles = AUserRoles::model()->findAll("status IN ('A','C') and assignedBy ='$userid'");
            }


        $this->render('userroles', array('model' => $roles,'print'=>$print));
    }

    // check if user exists

    public function actionCheckUser()
    {
        if(isset($_POST['user'])) {
            $email = $_POST['user'];

            $users = TUsers::model()->findAllByAttributes(array('username'=>$email));
            $users_count = count($users);

            if($users_count > 0)
            {
                echo '<span style="color:green">This User <strong>' . $email . '</strong>' .
                    ' is registered.</span>';
            }
            else
            {
                echo '<span style="color:red"> User Does Not Exist.</span>';
            }

        }
    }
}
