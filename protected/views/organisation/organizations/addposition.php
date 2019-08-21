<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'Organisations',
);
?>
<?php
$organization = $model[0]; //getting organisation 
$newUserPosition = $model[1]; //getting search results
//functions
$code = new Encryption;
$join = new JoinTable;

$positionlevel = TPersonpositionslevel::model()->findAll("status='A'"); //getting position level
//joins
$type = $join->joinOrganizationTypes($organization->type);
$country = $join->joinCountry($organization->country);
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
                                        <span class="black-text">Organization</span> &sol;
                                        <?php // echo CHtml::link('Panel', array('organisation/panel'));  ?> 
                                        <?php echo CHtml::link('Organizations', array('organisation/organizations')); ?> &sol;
                                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=organisation/organizations/view&id=<?php echo $code->encode($organization->id); ?>"><?php echo $organization->name; ?></a> &sol;
                                        <span>add Position</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12 112">                                
                                <ul class="tabs">
                                    <li class="tab col s12" style="text-align: left"  >
                                        <span class="grey-text text-darken-4"><?php echo $organization->name; ?> 
                                            - <small class="grey-text"><?php echo $type->name; ?> </small> 
                                            - <small class="grey-text"><i class="material-icons tiny">location_on</i><?php echo $country->name; ?> </small>
                                        </span> 
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
        <div class="col s12 m12">
            <div class="search-page-results" >
                <div class="row s12">
                    <div class="col s12 m2 l2"></div>
                    <div class="col s12 m8 20">
                        <div class="card z-depth-0" >
                            <div class="card-content">
                                <table id="example2" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Position</th>
                                            <th>Date Created</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    <tbody> 
                                        <?php
                                        if (!empty($newUserPosition)) {
                                            $t = 1;
                                            foreach ($newUserPosition as $record) {
                                                switch ($record->status) {
                                                    case 'N': $status = 'New';
                                                        $btn = 'De-Activate';
                                                        $color = 'green-text';
                                                        break;
                                                    case 'C': $status = 'Closed';
                                                        $btn = 'Activate';
                                                        $color = 'red-text';
                                                        break;
                                                }
                                                $positionname = $record->name; //getting position
                                                $createdon = $record->createdon; //getting date created
                                                $time = date("H:i:s", strtotime("$createdon"));
                                                //checking if position is already added
                                                $position_exist = TOrganisationpositions::model()->findAll("organization = $organization->id and position = $record->id");
                                                ?>
                                                <tr class="modal-trigger" href="#assignposition<?php echo $record->id; ?>">
                                                    <td><?php echo $t . '. ' ?></td>
                                                    <td><?php echo $positionname; ?></td>
                                                    <td><?php echo date_format(date_create($createdon), "d / F / Y") . ' at ' . $time . 'hrs' . '.'; ?> </td>
                                                    <td class="<?php echo $color; ?>"><?php echo $status; ?></td>
                                                </tr>
                                                <?php
                                                $t++;
                                                include 'modals/assignposition.php';
                                            }
                                        } else {
                                            
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m2 l2">
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
</div>
<?php
//add Person
//search Person
//include_once 'modal/searchPerson.php';
//include_once 'modal/createPosition.php';
?>
