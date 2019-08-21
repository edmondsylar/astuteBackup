<?php
$classCode = new Encryption;
//$name = $intelligencecategories->name;
//$id = $intelligencecategories->id;
//$intelligencesources = TIntelligencesources::model()->findAll("status IN ('A','C')");
//$intelligencecategories = TIntelligencecategories::model()->findByAttributes(array('name'=>$name));
$categorysearch = TIntelligencecategories::model()->findAll("status IN ('A','C')");
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
                                            <?php echo CHtml::link('Panel', array('settings/panel')); ?> &sol;
                                            <?php echo CHtml::link('Automated Intelligence Sources', array('settings/panel/intelligencesources')); ?> &sol;
                                            <span><?php echo $intelligencecategories->name; ?></span>
                                        </div>
                                    </h5>
                                </div>
                            </div>
                            <div class="row search-tabs-row search-tabs-container grey lighten-4">
                                <div class="col s12 m6 16">
                                    <ul class="tabs">
                                        <li class="tab col s10" style="text-align: left">
                                            <span class="grey-text" style="font-size: 12px; text-transform: capitalize;"> <?php echo $intelligencecategories->name; ?></span>
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
                    <div class="fixed-action-btn horizontal click-to-toggle" style="bottom: 45px; right: 24px;">
                        <a class="btn-floating btn-large tooltipped" data-position="top" data-delay="50" data-tooltip="Add Attribute">
                            <i class="large material-icons">add</i>
                        </a>
                        <ul>
                            <li><a class="btn-floating green modal-trigger tooltipped "  href="#addurl" data-position="top" data-delay="50" data-tooltip="Add url"><i class="material-icons">link</i></a></li>
                        </ul>
                    </div>
                    <div class="card z-depth-0">
                        <div class="card-content ">
                            <table id="example" class="display responsive-table datatable-example">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>URL</th>
<!--                                    <th>Status</th>-->
                                </tr>
                                </thead>
                                <tfoot><tr></br></tr></tfoot>
                                <tbody>
                                <?php
                                if (!empty($intelligencesources)) {
                                    $t = 1;
                                    foreach ($intelligencesources as $record)
                                    {
//                                        $intelligencesources = TIntelligencesources::model()->findAllByAttributes(array('id'=>$record->id));
//                                        $intelligencesources = TIntelligencesources::model()->findAll("id = $record->id and status IN ('A','C')");
                                        ?>
                                        <tr >
                                            <td><?php echo $t . '. ' ?></td>
                                            <td><?php echo $record->category_name ;  ?></td>
                                            <td><?php echo $record->url; ?> </td>
<!--                                            <td>--><?php //echo $record->status; ?><!-- </td>-->
                                        </tr>
                                        <?php
                                        $t++;
                                    }
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
<?php
include_once 'modals/addurl.php';
//include_once 'modal/EditOrganizationType.php';
?>