<?php
  class BillingController extends Controller{

    public function actionIndex($Uid){

      


       $this->render('index');
    }

    public function actionBilling_Scheme($Uid){



      $this->render('billing_scheme');
    }


    public function actionDetails($Uid){
      $userid = Yii::app()->user->userUuid;
        $intell = $_GET['intell'];
        $name = $_GET['name'];
        $Puid = uniqid(true);


        if(isset($_POST['newprice'])){
          
          $newPrice = $_POST['newprice'];
          $currency = $_POST['currency'];
          $desc = $_POST['priceDec'];
          
          $NewP = new AIntelligencePrices();
          $NewP->intelligence_price_uuid = $Puid;
          $NewP->intelligence_uuid = $intell;
          $NewP->currency_uuid = $currency;
          $NewP->amount = $newPrice;
          $NewP->description = $desc;
          $NewP->updated_by = $userid;

          if($NewP->save(false)){
            $this->redirect(array('details', 'Uid'=>$Uid, 'intell'=>$intell, 'name'=>$name));
          }else{
            // Log error
          }
          
        }

        $this->render('details', array('tester'=>$Puid));
    }

    public function actionView($Uid){

      $this->render('view');
    }

    public function actionInvoice($Uid){

      $this->render('invoice');
    }

    public function actionPriceDetails($Uid){
      if(isset($_POST['status'])){
        $status = $_POST['status'];
        $intel = $_POST['price'];

        $UpdateStatus = AIntelligencePrices::model()->findByAttributes(array('intelligence_uuid'=>$intel));
        $UpdateStatus->status = $status;
        if($UpdateStatus->update(false)){
          $this->redirect(array('priceDetails', 'Uid'=>$Uid));
        }else{
          // log error
        }

      }
      $this->render('priceDetails');
    }

    public function actionCurrencies($Uid){
      $userid = Yii::app()->user->userUuid;
      
      if(isset($_POST['newcurrency'])){
        $Cuid = uniqid(true);
        $name = $_POST['newcurrency'];
        $abbr = $_POST['abbrev'];
        $country = $_POST['countryUsed'];

        $currency = new ACurrencies();
        $currency->currency = $name;
        $currency->Acronym = $abbr;
        $currency->country_Id = $country;
        $currency->updatedBy = $userid;

        if($currency->save(false)){
          $this->redirect(array('currencies', 'Uid'=>$Uid));
        }else{
        // error log
        }
      }

      $this->render('currencies', array());
    }


    public function actionIntel_And_Price($Uid){
      $userid = Yii::app()->user->userUuid;
      $Puid = uniqid(true);

        if(isset($_POST['newprice'])){
          $newPrice = $_POST['newprice'];
          $currency = $_POST['currency'];
          $desc = $_POST['priceDec'];
          $intell = $_POST['intelligence'];
          
          $NewP = new AIntelligencePrices();
          $NewP->intelligence_price_uuid = $Puid;
          $NewP->intelligence_uuid = $intell;
          $NewP->currency_uuid = $currency;
          $NewP->amount = $newPrice;
          $NewP->description = $desc;
          $NewP->updated_by = $userid;

          if($NewP->save(false)){
            
            $update = AIntelligence::model()->findByAttributes(array('intelligenceUuid'=>$intell));
            $update->status = 'P';
              if($update->update(false)){
                $this->redirect(array('intel_and_price', 'Uid'=>$Uid));
              }

            $this->redirect(array('intel_and_price', 'Uid'=>$Uid));
          }else{
            // Log error
          }
          
        }

      $this->render('intel_and_price');
    }
  
    // End of controller
  }
 ?>
