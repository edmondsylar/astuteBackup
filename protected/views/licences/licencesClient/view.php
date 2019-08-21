<?php
$userid = Yii::app()->user->userid; // getting userid
$code = new Encryption;
//$clientUuid = $model[0];
//$name = $clientUuid->clientName;
//$id = $clientUuid->clientUuid;
$intelligence = TIntelligence::model()->findAll("intelligence_category_status IN ('A','C')");
//$licence =TLicence::model()->findAll("status IN ('A','C')");
//$intelligencecategories = TIntelligencecategories::model()->findAll("status IN ('A','C')");
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
                                        <span class="black-text">Licences</span> &sol;
                                        <?php echo CHtml::link('Clients', array('licences/licencesClient')); ?> &sol;
                                        <span><?php echo $clients->clientName; ?></span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m12 16">
                                <ul class="tabs">
                                    <li class="tab col s8" style="text-align: left">
                                        <span class="grey-text text-darken-4"><?php echo $clients->clientName; ?>
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
    <div class="card-content invoice-relative-content search-results-container container-fluid ">
        <div class="col s12 m12 l12">
            <div class="search-page-results">

                <div class="row">
                    <div class="fixed-action-btn horizontal click-to-toggle" style="bottom: 45px; right: 24px;">
                        <a class="btn-floating btn-large tooltipped" data-position="top" data-delay="50" data-tooltip="Add Attribute">
                            <i class="large material-icons">add</i>
                        </a>
                        <ul>
                            <li><a class="btn-floating indigo modal-trigger tooltipped "  href="#add-terms" data-position="top" data-delay="50" data-tooltip="Add Terms"><i class="material-icons">today</i></a></li>
                        </ul>
                    </div>
                    <div class="card z-depth-0">
                        <div class="card-content ">
                            <table id="example" class="display responsive-table datatable-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Licence ID</th>
                                    <th>Licence Intelligence</th>
                                    <th>Licence Start Date</th>
                                    <th>Licence End Date</th>
                                </tr>
                                </thead>
                                <tfoot><tr></br></tr></tfoot>
                                <tbody>
                                <?php
                                if (!empty($licence)) {
                                    $r = 1;
                                    foreach ($licence as $record)
                                    {
//                                        $licence = TLicence::model()->findAllByAttributes(array('id'=>$record->id));
//                                        $intelligencesources = TIntelligencesources::model()->findAll("id = $record->id and status IN ('A','C')");
                                        ?>
                                        <tr >
                                            <td><?php echo $r; ?>.</td>
                                            <td><?php echo $record->licenceUuid; ?></td>
                                            <td><?php echo $record->intelligence_name; ?></td>
                                            <td><?php echo $record->start_date; ?></td>
                                            <td><?php echo $record->end_date; ?></td>
                                        </tr>
                                        <?php
                                        $r++;
//                                        include 'modal/editlicence.php';
                                    }
                                    ?>
                                <?php } else{ } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!--##########################################################-->

                                    </div>
                                </div>
                            </div>
                        </div>
</div>

<?php
////adding terms
include_once 'modals/addTerms.php';
?>
