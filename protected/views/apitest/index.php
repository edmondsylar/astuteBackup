<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'People',
);
?>
<?php
$code = new Encryption;
$newpeople = TPerson::model()->findAll("status = 'N'");

$criteria = new CDbCriteria();
$criteria->addInCondition("organization", array(1,2,3,4));
$politicalpositions = TPersonpositions::model()->findAll($criteria);
$position_id='';

foreach($politicalpositions as $polpos){
$position_id .= $polpos->id . ',';     
$pers = TPersonEmploymentDetails::model()->findByAttributes(array('person_position' => $polpos->id));
//$pers = TPersonEmploymentDetails::model()->findAll("person_position = $polpos->id");
}
?>

<div class="search-header">
    <div class="card card-transparent no-m">
        <div class="card-content no-s">
            <div class="z-depth-1 search-tabs">
                <div class="search-tabs-container">
                    <div class="col s12 m12 l12">
                        <div class="row search-tabs-row search-tabs-header">
                            <div class="col s12 m12 l10 left">
                                <h5 class="" style="font-size: 16px">                                    
                                    <div class="breadcrumbs">
                                        <span class="black-text">Analytics</span> &sol;
                                        <?php echo CHtml::link('Panel', array('analytics/panel')); ?> &sol;
                                        <span>People</span>&sol;
                                        <span><?php echo rtrim($position_id, ', '); ?></span>&sol;
                                        <span><?php echo count($pers); ?></span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m3 16">                                
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#draft">Draft <span class="red white-text circle">&nbsp <?php echo count($newpeople); ?> &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#inbox">Inbox <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
                                    <li class="tab col s3"><a href="#sugestedpips">Suggested <span class="red white-text circle">&nbsp 0 &nbsp;</span></a></li>
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

                <div id="draft">
                    <?php
                    
                        ?>
                        <div class="card z-depth-0">
                            <div class="card-content">
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>Person Names</th>
                                            <th>Gender</th>
                                            <th>Nationality</th>
                                            <th>Created On</th>
                                        </tr>
                                    </thead>
                                    <tfoot><tr></br></tr></tfoot>
                                    <tbody>
                                        <?php
                                        if (!empty($newpeople)) {
                                        foreach ($newpeople as $newperson) {
//                                    $type = $join->joinOrganizationTypes($record->type);
//                                    $country = $join->joinCountry($record->country);
//                                            gender name
                                            $gidd = $newperson->gender;
                                            $genv = TPgender::model()->findByPk($gidd);
                                            $genname = $genv->name;
//                                            nationality name
                                            $nidd = $newperson->nationality;
                                            $natvalue = TCountry::model()->findByAttributes(array('code'=>$nidd));
                                            $natname = $natvalue->native;
                                            
                                            
//                                            $id = $code->encode($pid);
                                            ?>                                                                                                           
                                            <!--<tr onclick="location.href = '<?php // echo @Yii::app()->baseUrl; ?>/index.php?r=dataEntry/maker/people/view&id=<?php // echo $code->encode($newperson->id); ?>'">-->
                                            <tr>
                                                <td><?php echo $newperson->name; ?></td>
                                                <td><?php echo $genname; ?></td>
                                                <td><?php echo $natname; ?></td>
                                                <td><?php echo $newperson->createdon; ?></td>
                                                <!--<td>2017-07-17 09:54:10</td>-->
                                            </tr>
                                            <?php
                                        } }
                                        ?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 

                <!--###############################-->

                <div id="inbox">
                    <h3>Pending ...</h3>
                </div>                
                <div id="sugestedpips">
                    <h3>Suggested People ...</h3>
                </div>                
            </div>
        </div>
    </div>
</div>

