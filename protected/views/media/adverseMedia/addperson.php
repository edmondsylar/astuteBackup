<?php
/* @var $this PersonController */

//$pcode = new Encryption;
$this->breadcrumbs = array(
    'Organisations',
);
?>
<?php
$adversemedia = $model[0]; //getting adverse incident
$adversemedia_id = $adversemedia->id;
$title = $adversemedia->title;
$newuserperson = $model[1]; //getting new created person
//functions
$code = new Encryption;
$join = new JoinTable;

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
                                        <span class="black-text">Media</span> &sol;
                                        <?php // echo CHtml::link('Panel', array('organisation/panel'));  ?> 
                                        <?php echo CHtml::link('Media', array('media/adverseMedia')); ?> &sol;
                                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=media/adverseMedia/view&id=<?php echo $code->encode($adversemedia_id); ?>"><?php echo $title; ?></a> &sol;
                                        <span>add Person</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12 16">                                
                                <ul class="tabs">
                                    <li class="tab col s12" style="text-align: left">
                                        <span class="grey-text text-darken-4"> 
                                            <small class="grey-text">Author</small> - <?php echo $adversemedia->authors; ?> 
                                            <small class="grey-text">Title</small> - <?php echo $adversemedia->title; ?> 
                                            <small class="grey-text">Page</small> - <?php echo 'Page_' . $adversemedia->page; ?> 
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
                                            <th>Person</th>
                                            <th>Date Created</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    <tbody> 
                                        <?php
                                        if (!empty($newuserperson)) {
                                            $t = 1;
                                            foreach ($newuserperson as $record) {
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
                                                $person_idd = $record->id;
                                                $person_unique_id = $record->person_id;
                                                $personname = $record->name; //getting position
                                                $createdon = $record->createdon; //getting date created
                                                $time = date("H:i:s", strtotime("$createdon"));
                                                ?>
                                                <tr class="modal-trigger" href="#addperson<?php echo $person_idd; ?>">
                                                    <td><?php echo $t . '. ' ?></td>
                                                    <td><?php echo $personname; ?></td>
                                                    <td><?php echo date_format(date_create($createdon), "d / F / Y") . ' at ' . $time . 'hrs' . '.'; ?> </td>
                                                    <td class="<?php echo $color; ?>"><?php echo $status; ?></td>
                                                </tr>
                                                <?php
                                                $t++;
                                                include 'modals/addperson.php';
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
