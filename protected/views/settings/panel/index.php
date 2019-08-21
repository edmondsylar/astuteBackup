<?php
$relationships = TRelationships::model()->findAll("status IN ('A','C')"); //getting person relationships
$adverseprograms = TAdversemediaprograms::model()->findAll("status IN ('A','C')");
$intelligencecategories = TIntelligencecategories::model()->findAll("status IN ('A','C')");
$intelligencesources = TIntelligencesources::model()->findAll("status IN ('A','C')");
$registrationtypes = TRegistrationtypes::model()->findAll("status IN ('A','C')");
$intelligence = TIntelligence::model()->findAll("intelligence_category_status IN ('A','C')");

$businesstypes = TBusinessTypes::model()->findAll("status IN ('A','C')");


?>
<div class="search-header">
    <div class="card card-transparent no-m">
        <div class="card-content no-s">
            <div class="z-depth-1 search-tabs">
                <div class="search-tabs-container">
                    <div class="col s12 m12 l12">
                        <div class="row search-tabs-row search-tabs-header">
                            <div class="col s12 m12 l10 left">
                                <h5 class="" style="font-size: 14px">
                                    <div class="breadcrumbs">
                                        <span class="black-text">Settings</span> &sol;
                                        <span>Panel</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 16">
                                <ul class="tabs">
                                    <li class="tab col s10" style="text-align: left">
                                        <span class="grey-text" style="font-size: 12px;">Settings Menu</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
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

                <!--$##############################3-->
                <div class="row s12" style="margin-left: 5px;">
                    <div class="col s12 m3">
                        <span class="card-title " style="font-size: 16px;">Media</span>
                        <div class="grey-text" style="margin-left: 10px;">
                            <li><a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="<?php echo Yii::app()->baseUrl . '/index.php?r=settings/panel/adversemediaprogram'; ?>"> Adverse Media Programs <span class="right blue-text">(<?php echo count($adverseprograms);?>)</span></a></li>
                            <li><a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="<?php echo Yii::app()->baseUrl . '/index.php?r=settings/panel/relationshipdefinition'; ?>"> Relationship Definitions <span class="right blue-text">(<?php echo count($relationships);?>)</span></a></li>
                            <!--                            <li><a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#"> Users </a></li>
                                                        <li><a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#"> User Rights </a></li>
                                                        <li><a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="#"> Reset Password </a></li>-->
                        </div>
                    </div>
                       <div class="col s12 m3">
                            <span class="card-title " style="font-size: 16px;">Intelligence </span>
                            <div class="grey-text" style="margin-left: 10px;">
                                <li><a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="<?php echo Yii::app()->baseUrl.'/index.php?r=settings/panel/intelligencecategories'; ?>"> Intelligence Categories <span class="right blue-text">(<?php echo count($intelligencecategories);?>)</span></a></li>
                                <li><a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="<?php echo Yii::app()->baseUrl.'/index.php?r=settings/panel/intelligencesources'; ?>">Automated Intelligence Sources <span class="right blue-text">(<?php echo count($intelligencesources);?>)</span> </a></li>
                                <li><a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="<?php  echo Yii::app()->baseUrl.'/index.php?r=settings/panel/intelligence'; ?>"> Intelligence <span class="right blue-text">(<?php echo count($intelligence);?>)</span> </a></li>
<!--                                <li><a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="--><?php //// echo Yii::app()->baseUrl.'/index.php?r=settings/panel/organizationAttributes'; ?><!--"> Organisation Attributes </a></li>-->
<!--                                <li><a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="--><?php //// echo Yii::app()->baseUrl.'/index.php?r=settings/panel/rejectioncategory'; ?><!--"> Rejection Categories </a></li>-->
                            </div>
                        </div>
                        <div class="col s12 m3">
                            <span class="card-title " style="font-size: 16px;">General</span>
                            <div class="grey-text" style="margin-left: 10px;">
                                <li><a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="<?php  echo Yii::app()->baseUrl.'/index.php?r=settings/panel/registrationtypes'; ?>">Registration Types<span class="right blue-text">(<?php echo count($registrationtypes);?>)</span></a></li>
                                <li><a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="<?php  echo Yii::app()->baseUrl.'/index.php?r=settings/panel/businesstypes'; ?>">Business Types<span class="right blue-text">(<?php echo count($businesstypes);?>)</span></a></li>
                            </div>
                        </div>

                </div>



            </div>
        </div>
    </div>
</div>
