<?php
require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
//use mPDF;
class IntelligenceController extends Controller
{

  public $conUid;
  public $referenceCheck = "NotSet";
  public $per;
  public $please;
  public $really;

    public function actionIndex($Uid){


        $code = new Encryption();
        $uid = uniqid(true);

    if (isset($_POST['search-bar'])){
            $search = $_POST['search-bar'];
            $this->please = $search;
            $this->really = $uid;
            $person = new TProfileSearch();
            $person->searchUuid = $uid;
            $person->searchText = $search;
            $person->status = 'D';
            $person->searchedBy = 'astute';
            if ($person->save(false)){

            }else{

            }
            $this->redirect(array('searchresults', 'Uid'=>$Uid,'info'=>$search, 'Suid'=>$uid));
        }

        $this->render('search');

    }

    public function actionSearchResults($Uid){
        $userid = Yii::app()->user->userUuid;
        $code = new Encryption();
        $classLog = new Logs();
        $classMail = new Mail();
        $print = NULL;

        //find the business system admin
        $busy = AUserRoles::model()->findByAttributes(array('RoleUuid'=>$Uid));
        $admin = $busy->assignedBy;

        //use him/her to find the business creator who assigned him
        $find = AUserRolesInvitations::model()->findByAttributes(array('userUuid'=>$admin));
        $found = $find->updatedBy;

        // find the business that the business creator created
        $use = TBusiness::model()->findByAttributes(array('updatedBy'=>$found));
        $business = $use->businessUuid;


        // create profile
        $date = date("Y-m-d");

        $uid = uniqid(true);
        if (isset($_POST['names'])){
            $model = new TProfiles();
            $type = $_POST['types'];
            $model->profileUuid = $uid;
            $model->source = 'Astute';
            $model->sourceid = $uid;
            $model->prifileType = $type;
            $model->businessUuid = $business;
            $model->name = $_POST['names'];
            $model->createdBy = $userid;
            $model->status = 'D';
            $model->updatedOn = $date;

            if ($model->save(false)){

            } else{

            }

            $this->redirect(array('drafts', 'type'=>$type, 'user'=>$userid,'Uid'=>$Uid));

        }

        if(isset($_POST['profileUuid'])){
            if (isset($_GET['info'])){
                $searched = $_GET['info'];
                $SearchUid = $_GET['Suid'];

                $profile = $_POST['profileUuid'];
                $m = uniqid('',true);
                $match = new TProfileSearchMatches();
                $match->ProfilesearchMatchUuid = $m;
                $match->ProfilesearchUuid = $SearchUid;
                $match->ProfileUuid = $profile;
                $match->UpdatedBy = $userid;
                if ($match->save(false)){

                    $res = TProfileSearchResults::model()->findByAttributes(array('profileUuid'=>$profile));
                    $res->status = 'Matched';
                    $res->update(false);
                }else{

                }

//    echo $SearchUid;
                $this->redirect(array('searchresults', 'Uid'=>$Uid,'info'=>$searched, 'Suid'=>$SearchUid));

            }

        }

        if (isset($_POST['save'])) {
            $results =TProfiles::model()->findAll("name like '%$this->please%'");
            foreach ($results as $record){
            $mpdf = new mPDF();
            $mpdf->WriteHTML($this->renderPartial('modals/report', array('user'=>$userid,'profileUuid'=>$record->profileUuid,'name'=>$record->name,), true));

            $mpdf->Output('uploads/Report.pdf', 'F');


                $checkReadStatus = TUsers::model()->findByAttributes(array('userUuid'=>$userid));
                $business_admin = $checkReadStatus->username;

                $subject = "Search Report ";
                $userEmail = $business_admin;

                $message = $classMail->Report($userEmail);
                $sendEmail = $classMail->mailSend1($business_admin, $subject, $message);

                if ($sendEmail == TRUE) {

                    if (isset($_GET['info'])){
                        $searched = $_GET['info'];
                        $SearchUid = $_GET['Suid'];


                            $matched = 'S';

                            $profile = $_POST['prof'];

                            $clear = TProfileSearchMatches::model()->findByAttributes(array("status"=>'A'));
                            $clear->status = $matched;
                            $clear->update(false);



                        $this->redirect(array('searchresults', 'Uid'=>$Uid,'info'=>$searched, 'Suid'=>$SearchUid));

                    }


                } else{

                }
            }
        }

        $this->render('searchresults');

    }

    public function actionDrafts($Uid){

    if (isset($_GET['names'])){
        $searched = $_GET['names'];

        $date = date("Y-m-d");

        $id = uniqid(true);
        $model = new TProfiles();
        $model->profileUuid = $id;
        $model->source = "Astute";
        $model->prifileType = $_GET['type'];
        $model->sourceid = $id;
        $model->status = 'D';
        $model->name = $_GET['names'];
        $model->updatedOn = $date;
        if ($model->save(false)){
            //log success
        } else {
            //log error
        }
        $this->redirect(array('drafts', 'info'=>$searched, 'uid'=>$id, 'Uid'=>$Uid));
//            return($id);

    }
    $this->render('drafts');
}

    public function actionSubmits($Uid){

        if (isset($_GET['names'])){
            $searched = $_GET['names'];


            $date = date("Y-m-d");

            $id = uniqid(true);
            $model = new TProfiles();
            $model->profileUuid = $id;
            $model->source = "Astute";
            $model->prifileType = $_GET['type'];
            $model->sourceid = $id;
            $model->status = 'D';
            $model->name = $_GET['names'];
            $model->updatedOn = $date;
            if ($model->save(false)){

            } else {

            }

            $this->redirect(array('drafts', 'info'=>$searched, 'uid'=>$id, 'Uid'=>$Uid));
//            return($id);


        }
        $this->render('submits');
    }

    public function actionDraftReview($Uid)
    {
        $userid = Yii::app()->user->userUuid;


        if(isset($_POST['profileUid'])){
          $uid = uniqid(true);

          $profileUuid = $_POST['profileUid'];
          $contentDesc = $_POST['contentDesc'];
          $title = $_POST['contentHead'];

          $modelContent = new AProfileContent();
          $modelContent->profileContentUuid = $uid;
          $modelContent->profileUuid = $profileUuid;
          $modelContent->title = $title;
          $modelContent->content = $contentDesc;
          $modelContent->updatedBy = $userid;
          $modelContent->save(false);
          $this;

        }

        if(isset($_POST['ContentUid'])){

            $contentUuid = $_POST['ContentUid'];
            $contentDesc = $_POST['contentDesc'];
            $title = $_POST['contentHead'];

            $modelContent = AProfileContent::model()->findByPk($contentUuid);
            $modelContent->title = $title;
            $modelContent->content = $contentDesc;
            $modelContent->update();
            $this;

        }


        if(isset($_POST['sexchange'])){
          $uidc = $_POST['uidchange'];
          $newchange = $_POST['sexchange'];
          $newOne = AProfilesGender::model()->findByAttributes(array("profileUuid"=>$uidc));
          $newOne->genderUuid = $newchange;
          $newOne->update(false);
          $this;
        }

        if(isset($_POST['editProfilename'])){

          $profileUuid = $_POST['editProfilename'];
          $editCountry = $_POST['newCountryCode'];
          $countryType = $_POST['newCountryType'];

          $Model = AProfileCountry::model()->findByAttributes(array("profileUuid"=>$profileUuid));
          $Model->countryUuid = $editCountry;
          $Model->countryTypeUuid = $countryType;
          $Model->update(false);

          $this;
        }

        if(isset($_POST['deletingCountry'])){
          $profileUuid = $_POST['deletingCountry'];
          $countryUuid = $_POST['deletingCountryPro'];
          $typeUuidCountry = $_POST['deletingCountryType'];

          $countryChange = AProfileCountry::model()->findAll("profileUuid = '$profileUuid' AND countryUuid = '$countryUuid' AND countryTypeUuid = '$typeUuidCountry'");
          foreach ($countryChange as $value) {
          $value->status = 'X';
          $value->update(false);
        }

          $this;
        }

        if(isset($_POST['deletingRecord'])){
          $delete = 'X';
          $pro = $_POST['deletingRecord'];
          $date = $_POST['deletingDate'];

          $profile = AProfileDates::model()->findByAttributes(array("profileUuid"=>$pro, "date"=>$date));
          $profile->status = $delete;
          $profile->update(false);


          $this;
        }

        if(isset($_POST['changedate'])){

          $profile = $_POST['profile'];
          $newdate = $_POST['changedate'];
          $newdateType = $_POST['editDateType'];


          $dateUpdate = AProfileDates::model()->findByAttributes(array("profileUuid"=>$profile));
          $dateUpdate->dateTypeUuid = $newdateType;
          $dateUpdate->date = $newdate;
          $dateUpdate->update(false);


          $this;
        }


        if (isset($_POST['title'])){
          $uid = uniqid(true);

          $user = $_POST['userID'];
          $title = $_POST['title'];
          $publisher = $_POST['publisher'];
          $referenceType = $_POST['referenceType'];
          $dateAccessed = $_POST['dateAccessed'];
          $datepublished = $_POST['datepublished'];
          $authors = $_POST['authors'];
          $url = $_POST['url'];
          $refpub = $_POST['refpub'];

          $model = new AReferences();

          $model->referenceUuid = $uid;
          $model->type = $referenceType;
          $model->title = $title;
          $model->profileUuid = $user;
          $model->publisher = $publisher;
          $model->dateAccessed = $dateAccessed;
          $model->updatedBy = $userid;
          $model->save(false);

          if(!empty($_POST['url'])){

            $urUid = uniqid(true);
            $PK = $uid;

            $url = $_POST['url'];
            $model2 = new AReferenceUrl();
            $model2->referenceUrlUuid = $urUid;
            $model2->referenceUuid = $PK;
            $model2->url = $url;
            $model2->updatedBy = $userid;
            $model2->save(false);
          }

          if(!empty($_POST['authors'])){

            $author = $_POST['authors'];
            $authUid = uniqid(true);
            $PK = $uid;

            // $authors = $_POST['authors'];
            $AuthModal = new AReferenceAuthors();
            $AuthModal->referenceAuthorUuid = $authUid;
            $AuthModal->referenceUuid = $PK;
            $AuthModal->author = $author;
            $AuthModal->updatedBy = $userid;
            $AuthModal->save(false);

          }
          if (!empty($_POST['datepublished'])){
            $pdate = $_POST['datepublished'];
            $pdateUid = uniqid(true);
            $PK = $uid;

            $DateModal = new AReferencePublishDate();
            $DateModal->referencePublishDateUuid = $pdateUid;
            $DateModal->referenceUuid = $PK;
            $DateModal->date = $pdate;
            $DateModal->updatedBy = $userid;
            $DateModal->save(false);
          }

          if(!empty($_POST['refpub'])){
            $refpub = $_POST['refpub'];
            $pubrefUid = uniqid(true);
            $PK = $uid;

            $RefPub = new AReferenceReferencedPublisher();
            $RefPub->referenceReferencedPublisherUuid = $pubrefUid;
            $RefPub->referenceUuid = $PK;
            $RefPub->referencedPublisher = $refpub;
            $RefPub->updatedBy = $userid;
            $RefPub->save(false);

          }


          $this;
        }


        if (isset($_POST['edit'])){
            $uid = $_POST['uid-type'];
            $name = $_POST['edit'];
            $types = $_POST['types'];

            $model = TProfiles::model()->findAll("profileUuid = '$uid'");
            foreach ($model as $mod){
                $mod->name = $name;
                if (!empty($types)){
                    $mod->prifileType = $types;
                }

                if($mod->update()){

                }else{

                }
            }

            $this;

        }

        if(isset($_POST['prouid'])){
          $imgUid = uniqid(true);

          $imgSrc = $_POST['img_src'];
          $imgType = $_POST['picType'];
          $profile = $_POST['prouid'];



          $url_to_image = $_POST['img_src'];
          $ch =curl_init($url_to_image);;
          $my_save_dir = 'images/';
          $filename = basename($url_to_image);
          $complete_save_loc = $my_save_dir . $filename;

          $fp = fopen($complete_save_loc, 'wb');

          curl_setopt($ch, CURLOPT_FILE, $fp);
          curl_setopt($ch, CURLOPT_HEADER, 0);
          curl_exec($ch);
          curl_close($ch);
          fclose($fp);


        $check = AImages::model()->findByAttributes(array("profileUuid"=>$profile));
        if(!empty($check)){
            $check->imageSourceUrl = $imgSrc;
            $check->imagePath = $complete_save_loc;
            $check->update(false);

        } else {

            $modelImg = new AImages();

            $modelImg->imageUuid = $imgUid;
            $modelImg->imageCategoryUuid = $imgType;
            $modelImg->profileUuid = $profile;
            $modelImg->imagePath = $complete_save_loc;
            $modelImg->imageSourceUrl = $imgSrc;
            $modelImg->updatedBy = $userid;
            $modelImg->save(false);

        }

          $this;
        }

        if (isset($_POST['activation'])){
            $uid = $_POST['activation'];
            $model = TProfiles::model()->findAll("profileUuid = '$uid'");
            foreach ($model as $record){
                if ($record->status = 'D'){
                    $record->status = 'submitted';
                    if($record->update()){

                    } else {

                    }

                }
            }

            $this;

        }

        if (isset($_POST['sex'])){
            $uid = uniqid(true);

            $gender = $_POST['sex'];
            $puid = $_POST['uid'];

            if(!empty($gender)){
                $selector = AGender::model()->findByAttributes(array("gender"=>$gender));
                $genUuid = $selector['genderUuid'];
            }

            $model = new AProfilesGender();
            $model->profileGenderUuid = $uid;
            $model->profileUuid = $puid;
            $model->genderUuid = $genUuid;
            $model->status = 'A';
            $model->updatedBy = $userid;
            if ($model->save(false)){

            }else{

            }

            $this;
        }

        if (isset($_POST['search_name'])){
          $name = $_POST['search_name'];
          $uuid = $_POST['user'];

          // $route = $this;
          $this->redirect(array('relationships', 'name'=>$name, 'uid'=>$uuid,'Uid'=>$Uid));

        }

        if (isset($_POST['profileuid'])){
          $uid = uniqid(true);

          $country = $_POST['country'];
          $countryType = $_POST['countryType'];
          $profile = $_POST['profileuid'];

          $model = new AProfileCountry();
          $model->profileCountryUuid = $uid;
          $model->countryTypeUuid = $countryType;
          $model->profileUuid = $profile;
          $model->countryUuid = $country;
          $model->updatedBy = $userid;
          $model->save(false);

          $this;
        }

        if (isset($_POST['dater'])){
          $uid = uniqid(true);

          $date = $_POST['dater'];
          $dateType = $_POST['typeOfdate'];
          $usre = $_POST['uiddt'];

          $model = new AProfileDates();
          $model->profileDateUuid = $uid;
          $model->profileUuid = $usre;
          $model->dateTypeUuid = $dateType;
          $model->date = $date;
          $model->updatedBy = $userid;
          $model->save(false);

          $this;
        }



        $this->render('draftreview');
    }





    public function actionProfileTypes(){
        $userid = Yii::app()->user->userUuid;

      if (isset($_POST['profname'])){
          $uid = uniqid(true);
          $name = $_POST['profname'];
          $description = $_POST['dec'];

          $model = new AProfileTypes();
          $model->profileTypeUuid = $uid;
          $model->profileTypeName = $name;
          $model->description = $description;
          $model->updatedBy = $userid;
          if ($model->save(false)){

          }else {

          }
          $this;


      }
      $this->render('profiletypes');
    }

    public function actionGender(){
        $userid = Yii::app()->user->userUuid;
        $uid = uniqid(true);

      if(isset($_POST['sex-gender'])){
        $sex = $_POST['sex-gender'];

        $model = new AGender();
        $model->gender = $sex;
        $model->genderUuid = $uid;
        $model->updatedBy = $userid;
        if($model->save(false)){

        }else{

        }

        $this;
      }

      $this->render('gender');
    }

    public function actionIntelligenceCategories(){
        $userid = Yii::app()->user->userUuid;
        $uid = uniqid(true);
        if (isset($_POST['intelcat'])){
            $intelname = $_POST['intelcat'];
            $description = $_POST['Intelldec'];

            $model = new AIntelligenceCategories();
            $model->intelligenceCategoryUuid = $uid;
            $model->intelligenceCategory = $intelname;
            $model->description = $description;
            $model->updatedBy = $userid;
            if ($model->save(false)){

            }else {

            }


            $this;
        }

        $this->render('intelligencecategories');
    }

    public function actionTestPage(){

      $this->render('testpage');
    }



    public function actionRelationships($Uid){
      $userid = Yii::app()->user->userUuid;
      $code = new Encryption();

        //find the business system admin
        $busy = AUserRoles::model()->findByAttributes(array('RoleUuid'=>$Uid));
        $admin = $busy->assignedBy;

//use him/her to find the business creator who assigned him
        $find = AUserRolesInvitations::model()->findByAttributes(array('userUuid'=>$admin));
        $found = $find->updatedBy;

// find the business that the business creator created
        $use = TBusiness::model()->findByAttributes(array('updatedBy'=>$found));
        $business = $use->businessUuid;

      $uid = uniqid(true);
      if (isset($_POST['names'])){
        $name = $_POST['names'];
        $uuid = $_POST['uid'];

          $model = new TProfiles();
          $type = $_POST['types'];
          $model->profileUuid = $uid;
          $model->source = 'Astute';
          $model->sourceid = $uid;
          $model->prifileType = $type;
          $model->businessUuid = $business;
          $model->name = $_POST['names'];
          $model->createdBy = $userid;
          $model->status = 'D';
          if ($model->save(false)){

          } else{

          }

          $this->createUrl('intelligence/draftreview&name='.$name.'&uid='.$uuid.'&Uid='.$Uid);

      }

      if (isset($_POST['recname'])){
        $recname = $_POST['recname'];
        $uid = $_POST['uid'];
        $search = $_POST['search'];
        $conUid= $_POST['conuid'];

        $this->redirect(array('connections', 'recname'=>$recname, 'session'=>$uid, 'search'=>$search,'connecting'=>$conUid,'Uid'=>$Uid));
      }


      $this->render('relationships');
    }

    public function actionConnections($Uid){
      $current = $_GET['session'];

      $userid = Yii::app()->user->userUuid;
      $code = new Encryption();
      $uid = uniqid(true);

      if(isset($_POST['connectionSelected'])){
      $this->conUid = $uid;

        $country = $_POST['connectionSelected'];

        if (!empty($_POST['birthdate'])){
          $bd = $_POST['birthdate'];

        }
        if (!empty($_POST['enddate'])){
          $endDate = $_POST['enddate'];
        }

         $weighter = AConnectionWeights::model()->findByAttributes(array('weight'=>$_POST['weight']));
         $wuid = $weighter['connectionWeightUuid'];
         $PCUid = uniqid(true);

        $Connector = new AProfilesConnections();
        $Connector->profileConnectionUuid = $PCUid;
        $Connector->principalProfileUuid = $_POST['principle'];
        $Connector->connectedProfileUuid = $_POST['connecting'];
        $Connector->connectionUuid = $country;
        $Connector->connectionWeightUuid = $wuid;

        $Connector->updatedBy = $userid;
        $Connector->save(false);

        if(!empty($_POST['enddate'])){
          $edate = $_POST['enddate'];
          $edUid = uniqid();

          $endDateModal = new AProfileConnectionEndDate();
          $endDateModal->profileConnectionEndDateUuid = $edUid;
          $endDateModal->profileConnectionUuid = $PCUid;
          $endDateModal->endDate = $edate;
          $endDateModal->updatedBy = $userid;
          $endDateModal->save(false);

        }
        if(isset($_POST['conGroup'])){
          $group = $_POST['conGroup'];
          $PGuid = uniqid();

          $ProfileGroups = new AProfileConnectionGroup();
          $ProfileGroups->profileConnectionGroupUuid = $PGuid;
          $ProfileGroups->profileConnectionUuid = $PCUid;
          $ProfileGroups->connectionGroupUuid = $group;
          $ProfileGroups->updatedBy = $userid;
          $ProfileGroups->save(false);

        }
        if(!empty($_POST['birthdate'])){
          $bduid = uniqid();
          $bd = $_POST['birthdate'];

          $bdModel =  new AProfileConnectionStartDate();
          $bdModel->profileConnectionStartDateUuid = $bduid;
          $bdModel->profileConnectionUuid = $PCUid;
          $bdModel->startDate = $bd;
          $bdModel->updatedBy = $userid;
          $bdModel->save(false);

        }

        $this->redirect(array('draftreview', 'uid'=>$current,'Uid'=>$Uid));
      }

      if (isset($_POST['title'])){
        $uid = uniqid(true);

        $type = $_POST['referenceType'];
        $title =$_POST['title'];
        $publisher =$_POST['publisher'];
        $accessDate = $_POST['dateAccessed'];

        $model = new AReferences();
        $this->referenceCheck = $uid;

        $model->referenceUuid = $uid;
        $model->type = $type;
        $model->title = $title;
        $model->publisher = $publisher;
        $model->dateAccessed = $accessDate;
        $model->updatedBy = $userid;




        if ($model->save(false)){


          $proUid = uniqid(true);
          $ProfileRef = new AProfileConnectionReference();
          $ProfileRef->profileConnectionReferenceUuid = $proUid;
          $ProfileRef->referenceUuid = $this->referenceCheck;
          $ProfileRef->updatedBy = $userid;
          $ProfileRef->save(false);

        }


        $this;

      }

      if(isset($_POST['newconnection'])){
        $uid = uniqid(true);
        $newConn = $_POST['newconnection'];

        $model = new AConnections();
        $model->connectionUuid = $uid;
        $model->connection = $newConn;
        if($model->save(false)){
          $this;
        }else{
          $this->render('search');
        }
      }
      if(isset($_POST['newconnectiongruop'])){
        $uid = uniqid(true);
        $newConGroup = $_POST['newconnectiongruop'];

        $mod = new AConnectionGroup();
        $mod->connectionGroupUuid = $uid;
        $mod->connectionGroup = $newConGroup;

        if($mod->save(false)){
          $this;
        }else{
          $this->render('search');
        }

      }


    $this->render('connections');
    }

    public function actionWeights(){
      $userid = Yii::app()->user->userUuid;
      $code = new Encryption();
      $uid = uniqid(true);
      if(isset($_POST['weight_name'])){
        $weightName = $_POST['weight_name'];
        $weight = $_POST['weight'];
        $weightdesc = $_POST['weightdec'];

          $model = new AConnectionWeights();
          $model->connectionWeightUuid = $uid;
          $model->weightName = $weightName;
          $model->weight = $weight;
          $model->description = $weightdesc;
          $model->updatedBy = $userid;
          if ($model->save(false)){

          } else {

          }
          $this;

      }

    $this->render('weights');
    }

    public function actionImageCategory($Uid){
      $userid = Yii::app()->user->userUuid;
      $code = new Encryption();
      $uid = uniqid(true);
      if (isset($_POST['imagecatname'])){
        $imgcatname = $_POST['imagecatname'];
        $imgcatdesc = $_POST['imagecatdesc'];

        $model = new AImageCategories();
        $model->imageCategoryUuid = $uid;
        $model->imageCategory = $imgcatname;
        $model->description = $imgcatdesc;
        $model->updatedBy = $userid;
        if ($model->save(false)){

        }else{

        }

        $this->redirect(array('imagecategory', 'user'=>$userid,'Uid'=>$Uid));
      }

      $this->render('imagecategory');
    }

    public function actionRefrences(){
      $userid = Yii::app()->user->userUuid;
      $uid = uniqid(true);

      if (isset($_POST['refname'])){
        $name = $_POST['refname'];
        $description = $_POST['refdesc'];

        $model = new AReferenceTypes();
        $model->ReferenceTypeUuid = $uid;
        $model->referenceType = $name;
        $model->description = $description;
        $model->CreatedBy = $userid;
        if ($model->save(false)){

        }else{

        }
        $this;

      }

      $this->render('refrences');
    }

    public function actionIntelligence(){
        $userid = Yii::app()->user->userUuid;
        $uid = uniqid(true);

        if(isset($_POST['intelname'])){
          $desc = $_POST['intelcatdesc'];
          $name = $_POST['intelname'];
          $type = $_POST['intelcat'];

          $fetch = AIntelligenceCategories::model()->findByAttributes(array('intelligenceCategory'=>$type));
          $Fuid = $fetch['intelligenceCategoryUuid'];

          $model = new  AIntelligence();
          $model->intelligenceUuid = $uid;
          $model->intelligenceCategoryUuid = $Fuid;
          $model->intelligenceName = $name;
          $model->description = $desc;
          $model->updateBy = $userid;
          $model->save(false);


          $this;
        }

      $this->render('intelligence');
    }

    public function actionCountry(){
      $userid = Yii::app()->user->userUuid;
      $uid = uniqid(true);

      if (isset($_POST['ctryname'])){
        $name = $_POST['ctryname'];
        $description = $_POST['ctrydesc'];

        $model = new ACountryTypes();
        $model->countryTypeUuid = $uid;
        $model->countryTypeName = $name;
        $model->description = $description;
        $model->updatedBy = $userid;
        $model->save(false);

        $this;

      }


      $this->render('country');
    }

    public function actionDatetypes(){
      $userid = Yii::app()->user->userUuid;
      $uid = uniqid(true);

      if(isset($_POST['datetypename'])){
        $name = $_POST['datetypename'];
        $desc = $_POST['datedesc'];

        $model = new ADateTypes();

        $model->dateTypeUuid = $uid;
        $model->dateTypeName = $name;
        $model->description = $desc;
        $model->updatedBy = $userid;
        $model->save(false);
        $this;

      }


      $this->render('datetypes');
    }

    public function actionReference(){
      $userid = Yii::app()->user->userUuid;

      if(isset($_POST['gender'])){
        $uid = uniqid(true);
        $sex = $_POST['gender'];
        $ref = $_POST['reference'];

        $modSex = new AProfileEntryReferences();
        $modSex->profileEntryReferenceUuid = $uid;
        $modSex->referenceUuid = $ref;
        $modSex->entryUuid = $sex;
        $modSex->updatedBy = $userid;
        $modSex->save(false);
        $this;

      }

      if(!empty($_POST['check_list'])){
        $ref = $_POST['reference'];
        foreach ($_POST['check_list'] as $selected) {
          $uid = uniqid(true);

          $modSex = new AProfileEntryReferences();
          $modSex->profileEntryReferenceUuid = $uid;
          $modSex->referenceUuid = $ref;
          $modSex->entryUuid = $selected;
          $modSex->updatedBy = $userid;
          $modSex->save(false);

        }
        $this;
      }

      if (!empty($_POST['list_connections'])){
        $refer = $_POST['reference'];
        foreach ($_POST['list_connections'] as $connection) {
          $uid = uniqid(true);

          $modConnection = new AProfileEntryReferences();
          $modConnection->profileEntryReferenceUuid = $uid;
          $modConnection->referenceUuid = $refer;
          $modConnection->entryUuid = $connection;
          $modConnection->updatedBy = $userid;
          $modConnection->save(false);
        }

        $this;
      }

      if (!empty($_POST['coutry_list'])){
        $refere = $_POST['refere'];
        foreach ($_POST['coutry_list'] as $date) {
          $uid = uniqid(true);

          $modConnection = new AProfileEntryReferences();
          $modConnection->profileEntryReferenceUuid = $uid;
          $modConnection->referenceUuid = $refere;
          $modConnection->entryUuid = $date;
          $modConnection->updatedBy = $userid;
          $modConnection->save(false);
        }

        $this;
      }

      if (isset($_POST['sessionTitle'])){
        $newtitle = $_POST['title'];
        $session = $_POST['sessionTitle'];

        $title = AReferences::model()->findByAttributes(array("referenceUuid"=>$session));
        $title->title = $newtitle;
        $title->update();

        $NewArp = $_POST['arp'];
        $arp = AReferenceReferencedPublisher::model()->findByAttributes(array("referenceUuid"=>$session));
        $arp->referencedPublisher = $NewArp;
        $arp->update();


        $Newurl = $_POST['url'];
        $url = AReferenceUrl::model()->findByAttributes(array("referenceUuid"=>$session));
        $url->url = $Newurl;
        $url->update();

        $Newauthor = $_POST['author'];
        $author = AReferenceAuthors::model()->findByAttributes(array("referenceUuid"=>$session));
        $author->author = $Newauthor;
        $author->update();

        $newAdate = $_POST['accessdate'];
        $dateAccess = AReferences::model()->findByAttributes(array("referenceUuid"=>$session));
        $dateAccess->dateAccessed = $newAdate;
        $dateAccess->update();


        $newrefType = $_POST['refType'];
        $refT = AReferences::model()->findByAttributes(array("referenceUuid"=>$session));
        $refT->type = $newrefType;
        $refT->update();

        $newPdate = $_POST['pubDate'];
        $datePublish = AReferencePublishDate::model()->findByAttributes(array("referenceUuid"=>$session));
        $datePublish->date = $newPdate;
        $datePublish->update();

        $this;
      }

      $this->render('reference');
    }

    public function actionConnectionEdit($Uid){
      $userid = Yii::app()->user->userUuid;
      if(isset($_POST['group'])){
        $user = $_POST['userprofile'];
        $conn = $_POST['connection'];

        $update = AProfilesConnections::model()->findByAttributes(array("principalProfileUuid"=>$user, "connectionUuid"=>$conn));
        $num = $update['profileConnectionUuid'];


        $connection = $_POST['connection'];
        if(!empty(isset($_POST['group']))){
          $group = $_POST['group'];

          $modgroup = AProfileConnectionGroup::model()->findByAttributes(array("profileConnectionUuid"=>$conn));
          if(!empty($modgroup)){
            $modgroup->connectionGroupUuid = $group;
            $modgroup->update(false);


          }else{
            $uid = uniqid(true);
            $fst = new AConnectionGroup();
            $fst->connectionGroupUuid = $uid;
            $fst->connectionGroup = $group;
            $fst->updatedBy = $userid;
            if($fst->save(false)){
                $addNew = new AProfileConnectionGroup();
                $addNew->profileConnectionGroupUuid = uniqid(true);
                $addNew->profileConnectionUuid = $conn;
                $addNew->connectionGroupUuid = $uid;
                $addNew->updatedBy = $userid;
                $addNew->save(false);


              }
          }

        }
        if(!empty($_POST['weight'])){
          $weightNew = $_POST['weight'];
          $check = AProfilesConnections::model()->findByAttributes(array("principalProfileUuid"=>$user, "connectionUuid"=>$conn));
          $check->connectionWeightUuid = $weightNew;
          $check->update(false);

        }

        if (isset($_POST['birthdate'])){
          $start_date_update = $_POST['birthdate'];
        }

        if(isset($_POST['enddate'])){
          $end_date_update = $_POST['enddate'];
        }

        if(!empty($start_date_update)){
          $mod = AProfileConnectionStartDate::model()->findByAttributes(array("profileConnectionUuid"=>$num));
          if(!empty($mod)){
            $mod->startDate = $start_date_update;
            $mod->update(false);
          }else{
            $Creator =  new AProfileConnectionStartDate();
            $Creator->profileConnectionStartDateUuid = $conn;
            $Creator->profileConnectionUuid = $conn;
            $Creator->startDate = $start_date_update;
            $Creator->updatedBy = $userid;
            $Creator->save(false);
          }

        }

        if(isset($_POST['title'])){

          $this->render('search');
        }

        if(!empty($end_date_update)){
          $model = AProfileConnectionEndDate::model()->findByAttributes(array("profileConnectionUuid"=>$num));
          if(!empty($model)){
            $model->endDate = $end_date_update;
            $model->update(false);
          }else{
            $NewModel =  new AProfileConnectionEndDate();
            $NewModel->profileConnectionUuid = $conn;
            $NewModel->endDate = $end_date_update;
            $NewModel->updatedBy = $userid;
            $NewModel->save(false);
          }

        }

        $this->redirect(array('draftreview', 'uid'=>$user,'Uid'=>$Uid));
      }

      if(isset($_POST['delete_connection_name'])){
        $PPC = $_POST['delete_user_connection'];
        $CON = $_POST['delete_connection_name'];

        $model = AProfilesConnections::model()->findByAttributes(array("connectionUuid"=>$CON));
        if(!empty($model)){
          $model->status = 'X';
          $model->update(false);

          $this->redirect(array('draftreview', 'uid'=>$PPC,'Uid'=>$Uid));

        }else{

        }

      }


      $this->render('connectionEdit');
    }

    public function actionTest($uid,$Uid){

        $code = new Encryption;
        $profileUuid = $code->decode($uid);

        $userid = Yii::app()->user->userUuid;

        if(isset($_POST['changedate'])){
          $date = $_POST['changedate'];


        }


        if(isset($_POST['profileUid'])){
            $id = uniqid(true);


            $contentDesc = $_POST['contentDesc'];
            $title = $_POST['contentHead'];

            $modelContent = new AProfileContent();
            $modelContent->profileContentUuid = $id;
            $modelContent->profileUuid = $profileUuid;
            $modelContent->title = $title;
            $modelContent->content = $contentDesc;
            $modelContent->updatedBy = $userid;
            $modelContent->save(false);

            $this;


        }

        if(isset($_POST['button1'])){
            $delete = 'X';
            $cont = $_POST['deletingCont'];

            $profile = AProfileContent::model()->findByAttributes(array("profileUuid"=>$profileUuid, "profileContentUuid"=>$cont));
            $profile->status = $delete;
            $profile->update(false);

            $this->redirect(array('test', 'uid' => $uid,'Uid'=>$Uid));

        }


        if(isset($_POST['principle'])){
          $uiid = uniqid(true);

          $con_group = $_POST['con_group'];
          if (!empty($con_group)){
            $conGrop = $_POST['con_group'];

            $group = new AProfileConnectionGroup();
            $group->profileConnectionGroupUuid = uniqid(true);
            $group->profileConnectionUuid = $uiid;
            $group->connectionGroupUuid = $conGrop;
            $group->updatedBy = $userid;
            $group->save(false);

          }

          $principle = $_POST['principle'];
          $connecting = $_POST['connecting'];
          $act_con = $_POST['act_con'];
          $con_weight = $_POST['con_weight'];



          $modelConnections = new AProfilesConnections();
          $modelConnections->profileConnectionUuid = $uiid;
          $modelConnections->connectionUuid = $act_con;
          $modelConnections->principalProfileUuid = $principle;
          $modelConnections->connectedProfileUuid = $connecting;

          $modelConnections->updatedBy = $userid;

          $modelConnections->connectionWeightUuid = $con_weight;


          $modelConnections->save(false);

          if(isset($_POST['birthdate'])){
            $start = $_POST['birthdate'];
            $startDate = new AProfileConnectionStartDate();
            $startDate->profileConnectionStartDateUuid = uniqid(true);
            $startDate->profileConnectionUuid = $uiid;
            $startDate->startDate = $start;
            $startDate->updatedBy = $userid;
            $startDate->save(false);
          }

          if(isset($_POST['enddate'])){
            $end = $_POST['enddate'];
            $endDate = new AProfileConnectionEndDate();
            $endDate->profileConnectionEndDateUuid = uniqid(true);
            $endDate->profileConnectionUuid = $uiid;
            $endDate->endDate = $end;
            $endDate->updatedBy = $userid;
            $endDate->save(false);
          }

          $this;

        }

        if(isset($_POST['ContentUid'])){

            $contentUuid = $_POST['ContentUid'];
            $contentDesc = $_POST['contentDesc'];
            $title = $_POST['contentHead'];

            $modelContent = AProfileContent::model()->findByPk($contentUuid);
            $modelContent->title = $title;
            $modelContent->content = $contentDesc;
            $modelContent->update();


            $this->redirect(array('test', 'uid' => $uid,'Uid'=>$Uid));


        }

        // edit gender
        if(isset($_POST['sexchange'])){

            $newchange = $_POST['sexchange'];
            $newOne = AProfilesGender::model()->findByAttributes(array("profileUuid"=>$profileUuid));
            $newOne->genderUuid = $newchange;
            $newOne->update(false);

            $this->redirect(array('test', 'uid' => $uid));
        }

        // edit country
        if(isset($_POST['editProfilename'])){


            $editCountry = $_POST['newCountryCode'];
            $countryType = $_POST['newCountryType'];

            $Model = AProfileCountry::model()->findByAttributes(array("profileUuid"=>$profileUuid));
            $Model->countryUuid = $editCountry;
            $Model->countryTypeUuid = $countryType;
            $Model->update(false);

            $this->redirect(array('test', 'uid' => $uid,'Uid'=>$Uid));
        }

        // delete country
        if(isset($_POST['deletingCountry'])){
            $profileUuid = $_POST['deletingCountry'];
            $countryUuid = $_POST['deletingCountryPro'];
            $typeUuidCountry = $_POST['deletingCountryType'];

            $countryChange = AProfileCountry::model()->findAll("profileUuid = '$profileUuid' AND countryUuid = '$countryUuid' AND countryTypeUuid = '$typeUuidCountry'");
            foreach ($countryChange as $value) {
                $value->status = 'X';
                $value->update(false);
            }

            $this->redirect(array('test', 'uid' => $uid,'Uid'=>$Uid));
        }

        // delete profile
        if(isset($_POST['deletingRecord'])){
            $delete = 'X';

            $date = $_POST['deletingDate'];

            $profile = AProfileDates::model()->findByAttributes(array("profileUuid"=>$profileUuid, "date"=>$date));
            $profile->status = $delete;
            $profile->update(false);


            $this->redirect(array('test', 'uid' =>$uid,'Uid'=>$Uid));
        }

        // edit date
        if(isset($_POST['changedate'])){


            $newdate = $_POST['changedate'];
            $newdateType = $_POST['editDateType'];

            $dateUpdate = AProfileDates::model()->findByAttributes(array("profileUuid"=>$profileUuid));
            $dateUpdate->dateTypeUuid = $newdateType;
            $dateUpdate->date = $newdate;
            $dateUpdate->update(false);

            $this->redirect(array('test', 'uid' => $uid,'Uid'=>$Uid));
        }


        if (isset($_POST['title'])){
            $uid = uniqid(true);


            $title = $_POST['title'];
            $publisher = $_POST['publisher'];
            $referenceType = $_POST['referenceType'];
            $dateAccessed = $_POST['dateAccessed'];
            $Date =  date("Y-m-d", strtotime($dateAccessed));
           // $datepublished = $_POST['datepublished'];
            $authors = $_POST['authors'];
            $url = $_POST['url'];
            $refpub = $_POST['refpub'];

            $model = new AReferences();

            $model->referenceUuid = $uid;
            $model->type = $referenceType;
            $model->title = $title;
            $model->profileUuid = $profileUuid;
            $model->publisher = $publisher;
            $model->dateAccessed = $Date;
            $model->updatedBy = $userid;
            $model->save(false);



            if(!empty($_POST['url'])){

                $urUid = uniqid(true);
                $PK = $uid;

                $url = $_POST['url'];
                $model2 = new AReferenceUrl();
                $model2->referenceUrlUuid = $urUid;
                $model2->referenceUuid = $PK;
                $model2->url = $url;
                $model2->updatedBy = $userid;
                $model2->save(false);


            }

            if(!empty($_POST['authors'])){

                $author = $_POST['authors'];
                $authUid = uniqid(true);
                $PK = $uid;


                $AuthModal = new AReferenceAuthors();
                $AuthModal->referenceAuthorUuid = $authUid;
                $AuthModal->referenceUuid = $PK;
                $AuthModal->author = $author;
                $AuthModal->updatedBy = $userid;
                $AuthModal->save(false);



            }
            if (!empty($_POST['datepublished'])){
                $pdate = $_POST['datepublished'];
                $date2 =  date("Y-m-d", strtotime($pdate));
                $pdateUid = uniqid(true);
                $PK = $uid;

                $DateModal = new AReferencePublishDate();
                $DateModal->referencePublishDateUuid = $pdateUid;
                $DateModal->referenceUuid = $PK;
                $DateModal->date = $date2;
                $DateModal->updatedBy = $userid;
                $DateModal->save(false);


            }

            if(!empty($_POST['refpub'])){
                $refpub = $_POST['refpub'];
                $pubrefUid = uniqid(true);
                $PK = $uid;

                $RefPub = new AReferenceReferencedPublisher();
                $RefPub->referenceReferencedPublisherUuid = $pubrefUid;
                $RefPub->referenceUuid = $PK;
                $RefPub->referencedPublisher = $refpub;
                $RefPub->updatedBy = $userid;
                $RefPub->save(false);



            }


        }

        if (isset($_POST['edit-title'])){


            $edit_title = $_POST['edit-title'];
            $edit_publisher = $_POST['edit-publisher'];
            $edit_referenceType = $_POST['edit-reference-type'];
            $edit_dateAccessed = $_POST['edit-date-accessed'];
            $edit_pdate = $_POST['edit-date-published'];
            $edit_author = $_POST['edit-author'];
            $edit_url = $_POST['edit-url'];
            $edit_refpub = $_POST['edit-ref-pub'];
            $reference = $_POST['deletingReference'];

            $date1 =  date("Y-m-d", strtotime($edit_dateAccessed));

            $model = AReferences::model()->findByAttributes(array('profileUuid'=>$profileUuid, 'referenceUuid'=>$reference));
            $model->type = $edit_referenceType;
            $model->title = $edit_title;
            $model->publisher = $edit_publisher;
            $model->dateAccessed = $date1;
            $model->updatedBy = $userid;
            $model->update(false);



            if(!empty($_POST['edit-url'])){


                $edit_url = $_POST['edit-url'];
                $model2 = AReferenceUrl::model()->findByAttributes(array('referenceUuid'=>$reference));
                $model2->url = $edit_url;
                $model2->updatedBy = $userid;
                $model2->update(false);


            }

            if(!empty($_POST['edit-author'])){

                $edit_author = $_POST['edit-author'];


                $AuthModal = AReferenceAuthors::model()->findByAttributes(array('referenceUuid'=>$reference));
                $AuthModal->author = $edit_author;
                $AuthModal->updatedBy = $userid;
                $AuthModal->update(false);



            }
            if (!empty($_POST['edit-date-published'])){
                $edit_pdate = $_POST['edit-date-published'];
                $date3 =  date("Y-m-d", strtotime($edit_pdate));

                $DateModal =  AReferencePublishDate::model()->findByAttributes(array('referenceUuid'=>$reference));
                $DateModal->date = $date3;
                $DateModal->updatedBy = $userid;
                $DateModal->update(false);


            }

            if(!empty($_POST['edit-ref-pub'])){
                $edit_refpub = $_POST['edit-ref-pub'];

                $RefPub = AReferenceReferencedPublisher::model()->findByAttributes(array('referenceUuid'=>$reference));
                $RefPub->referencedPublisher = $edit_refpub;
                $RefPub->updatedBy = $userid;
                $RefPub->update(false);



            }



        }



        if(isset($_POST['deletingRec'])){
            $delete = 'X';
            $ref = $_POST['deletingReference'];

            $profile = AReferences::model()->findByAttributes(array("profileUuid"=>$profileUuid, "referenceUuid"=>$ref));
            $profile->status = $delete;
            $profile->update(false);

            $reference = AReferenceUrl::model()->findByAttributes(array('referenceUuid'=>$ref));
            $reference->status = $delete;
            $reference->update(false);

            $author = AReferenceAuthors::model()->findByAttributes(array('referenceUuid'=>$ref));
            $author->status = $delete;
            $author->update(false);

            $publisher = AReferenceReferencedPublisher::model()->findByAttributes(array('referenceUuid'=>$ref));
            $publisher->status = $delete;
            $publisher->update(false);

            $date = AReferencePublishDate::model()->findByAttributes(array('referenceUuid'=>$ref));
            $date->status = $delete;
            $date->update(false);

            $this->redirect(array('test', 'uid' => $uid,'Uid'=>$Uid));
        }


        // edit profile name
        if (isset($_POST['edit-profile-name'])){
            $name = $_POST['edit-profile-name'];
            $model = TProfiles::model()->findAll("profileUuid = '$profileUuid'");
            foreach ($model as $mod){
                $mod->name = $name;

                if($mod->update(false)){
                    //log success.
                }else{
                    // log error.
                }
            }

            $this->redirect(array('test', 'uid' => $uid,'Uid'=>$Uid));

        }

        // edit profile type
        if (isset($_POST['edit-profile-type'])){
            $types = $_POST['edit-profile-type'];
            $model = TProfiles::model()->findAll("profileUuid = '$profileUuid'");
            foreach ($model as $mod){
                if (!empty($types)){
                    $mod->prifileType = $types;
                }
                if($mod->update(false)){

                }else{

                }
            }


            $this->redirect(array('test', 'uid' => $uid,'Uid'=>$Uid));

        }

        // add image
        if(isset($_POST['picType'])){
            $imgUid = uniqid(true);

            $imgSrc = $_POST['img_src'];
            $imgType = $_POST['picType'];
            $url_to_image = $_POST['img_src'];
            $ch =curl_init($url_to_image);;
            $my_save_dir = 'images/';
            $filename = basename($url_to_image);
            $complete_save_loc = $my_save_dir . $filename;

            $fp = fopen($complete_save_loc, 'wb');

            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);


            $check = AImages::model()->findByAttributes(array("profileUuid"=>$profileUuid));
            if(!empty($check)){
                $check->imageSourceUrl = $imgSrc;
                $check->imagePath = $complete_save_loc;
                $check->update(false);

            } else {

                $modelImg = new AImages();

                $modelImg->imageUuid = $imgUid;
                $modelImg->imageCategoryUuid = $imgType;
                $modelImg->profileUuid = $profileUuid;
                $modelImg->imagePath = $complete_save_loc;
                $modelImg->imageSourceUrl = $imgSrc;
                $modelImg->updatedBy = $userid;
                $modelImg->save(false);

            }

            $this->redirect(array('test', 'uid' => $uid,'Uid'=>$Uid));
        }

        // activate profile
        if (isset($_POST['activation'])){
            $uid = $_POST['activation'];
            $model = TProfiles::model()->findAll("profileUuid = '$uid'");
            foreach ($model as $record){
                if ($record->status = 'D'){
                    $record->status = 'submited';
                    if($record->update()){

                    } else {

                    }

                }
            }

            $this->redirect(array('test', 'uid' => $code->encode($uid),'Uid'=>$Uid));

        }
        // add gender
        if (isset($_POST['sex'])){
            $uid = uniqid(true);

            $gender = $_POST['sex'];


            if(!empty($gender)){
                $selector = AGender::model()->findByAttributes(array("gender"=>$gender));
                $genUuid = $selector['genderUuid'];
            }

            $model = new AProfilesGender();
            $model->profileGenderUuid = $uid;
            $model->profileUuid = $profileUuid;
            $model->genderUuid = $genUuid;
            $model->status = 'A';
            $model->updatedBy = $userid;
            if ($model->save(false)){

            }else{

            }

            $this->redirect(array('test', 'uid' => $code->encode($uid),'Uid'=>$Uid));
        }
         // search connection
        if (isset($_POST['search_name'])){
            $name = $_POST['search_name'];
            $uuid = $_POST['user'];


            $this->redirect(array('relationships', 'name'=>$name, 'uid'=>$uuid,));
        }
        // add country
        if (isset($_POST['country'])){
            $uid = uniqid(true);

            $country = $_POST['country'];
            $countryType = $_POST['countryType'];
            $model = new AProfileCountry();
            $model->profileCountryUuid = $uid;
            $model->countryTypeUuid = $countryType;
            $model->profileUuid = $profileUuid;
            $model->countryUuid = $country;
            $model->updatedBy = $userid;
            $model->save(false);

            $this->redirect(array('test', 'uid' => $code->encode($uid),'Uid'=>$Uid));
        }
            /// add date
        if (isset($_POST['dater'])){
            $uid = uniqid(true);

            $date = $_POST['dater'];
            $dateType = $_POST['typeOfdate'];
            $model = new AProfileDates();
            $model->profileDateUuid = $uid;
            $model->profileUuid = $profileUuid;
            $model->dateTypeUuid = $dateType;
            $model->date = $date;
            $model->updatedBy = $userid;
            $model->save(false);

            $this->redirect(array('test', 'uid' => $code->encode($uid),'Uid'=>$Uid));
        }
        $draftInfo = TProfiles::model()->findByAttributes(array('profileUuid'=>$profileUuid));
        $drafts = AProfileContent::model()->findAllByAttributes(array('profileUuid'=>$profileUuid, 'status'=>'D'));
        $country = AProfileCountry::model()->findAllByAttributes(array('profileUuid'=>$profileUuid));
        $refs = AReferences::model()->findAllByAttributes(array('profileUuid'=>$profileUuid, 'status'=>'D'));




        $this->render('test',array('draftInfo'=>$draftInfo,'drafts'=>$drafts,'country'=>$country,'refs'=>$refs,));
    }

    public function actionInq($Uid){

      $this->render('inq');
    }

}
