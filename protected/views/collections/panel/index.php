<?php
$relationships = TRelationships::model()->findAll("status IN ('A','C')"); //getting person relationships
$adverseprograms = TAdversemediaprograms::model()->findAll("status IN ('A','C')");
$people = TPerson::model()->findAll("status IN ('A','D','C','N','M')");
$organizations = TOrganization::model()->findAll("status = 'D'");
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
                                        <span class="black-text">Collections</span> &sol;
                                        <span>Panel</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 16">                                
                                <ul class="tabs">
                                    <li class="tab col s10" style="text-align: left">
                                        <span class="grey-text" style="font-size: 12px;">Collections Menu</span>
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
                        <div class="grey-text" style="margin-left: 10px;">
<!--                            <li><a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="--><?php //echo Yii::app()->baseUrl . '/index.php?r=collections/panel/adversemediaprogram'; ?><!--"> Adverse Media Programs <span class="right blue-text">(--><?php //echo count($adverseprograms);?><!--)</span></a></li>-->
<!--                            <li><a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="--><?php //echo Yii::app()->baseUrl . '/index.php?r=collections/panel/relationshipdefinition'; ?><!--"> Relationship Definitions <span class="right blue-text">(--><?php //echo count($relationships);?><!--)</span></a></li>-->
                            <li><a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="<?php echo Yii::app()->baseUrl . '/index.php?r=collections/people/politicallyExposed'; ?>"> People<span class="right blue-text">(<?php echo count($people);?>)</span></a></li>
                            <li><a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" href="<?php echo Yii::app()->baseUrl . '/index.php?r=collections/organisation/organizations'; ?>"> Organizations<span class="right blue-text">(<?php echo count($organizations);?>)</span></a></li>

                        </div>
                    </div>                    

                </div>



            </div>
        </div> 
    </div>
</div>