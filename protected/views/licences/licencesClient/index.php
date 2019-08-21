<?php
$clients = $model[0];
$code = new Encryption;
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
                                        <span class="black-text">Licences</span>
                                        <?php // echo CHtml::link('Panel', array('settings/panel')); ?> &sol;
                                        <span>Clients</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 16 search-stats">
                                <ul class="tabs">
                                    <li class="tab col s10" style="text-align: left">
                                        <span class="grey-text" style="font-size: 14px;">Clients</span>&nbsp;&nbsp;<span class="red circle white-text">&nbsp;&nbsp;<?php echo count($clients); ?>&nbsp;&nbsp;</span>
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

                <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                    <!--href="#add-organization"-->
                    <a class="btn-floating btn-large red waves-effect tooltipped "  href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=licences/licencesClient/search" data-position="left" data-delay="50" data-tooltip="Create New Client" >
                        <i class="large material-icons">add</i>
                    </a>
                </div>

                <div class="card z-depth-0">
                    <div class="card-content ">
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Registration Country</th>
                                <th>Registration Type</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <tbody>
                            <?php
                            if (!empty($clients)) {
                                $r = 1;
                                foreach ($clients as $record) {
                                    switch ($record->status) {
                                        case 'A': $status = 'Active';
                                            $btn = 'Active';
                                            $color = 'green';
                                            break;
                                        case 'D': $status = 'Draft';
                                            $btn = 'Draft';
                                            $color = 'red';
                                            break;
                                        case 'M': $status = 'Draft[Media]';
                                            $btn = 'Draft';
                                            $color = 'red';
                                            break;
                                    }

                                            $clientRegistrationType = $record->clientRegistrationType;
                                            $clientRegistrationTypeValue = TRegistrationtypes::model()->findByPk($clientRegistrationType);
                                            $clientRegistrationTypename = $clientRegistrationTypeValue->name;

                                            $clientRegistrationCountry = $record->clientRegistrationCountry;
                                            $clientRegistrationCountryvalue = TCountry::model()->findByAttributes(array('id' => $clientRegistrationCountry));
                                            $clientRegistrationCountryname = $clientRegistrationCountryvalue->name;
                                    ?>

                                    <tr onclick="location.href = '<?php echo Yii::app()->baseUrl; ?>/index.php?r=licences/licencesClient/view&id=<?php echo $code->encode($record->clientUuid); ?>'">
                                        <td><?php echo $r; ?>.</td>
                                        <td><?php echo $record->clientName; ?></td>
                                        <td><?php echo $clientRegistrationCountryname; ?></td>
                                        <td><?php echo $clientRegistrationTypename; ?></td>
                                        <td><code class="white-text <?php echo $color; ?>"><?php echo $status; ?></code></td>
                                    </tr>
                                    <?php
                                    $r++;
//                                    include 'modal/countryStatus.php';
                                }
                                ?>
                                <?php
                            } else {
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>