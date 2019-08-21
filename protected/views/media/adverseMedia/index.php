<?php
/* @var $this IncidentReportController */

$this->breadcrumbs = array(
    'Adverse Media',
);
$adverseMedia = $model[0];
$code = new Encryption;
$userperm =Yii::app()->user->userperm;
$allowpeopleaccess1 = array("KD003", "WA002", "MY004");
$allowpeopleview = array("3","4","5","6","7","8","9","10");
$allowpeopleadd = array("4","5","6","7","8","9","10");
$allowpeopleviewinside = array("5","6","7","8","9","10");
?>
<?php if (in_array("$userperm", $allowpeopleview)) { ?>
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
                                        <?php // echo CHtml::link('Media', array('incident/adverseMedia')); ?>
                                        <span>Adverse Media</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 16 search-stats">                                
                                <ul class="tabs">
                                    <li class="tab col s12" style="text-align: left">
                                        <span class="grey-text" style="font-size: 14px;">Adverse Media</span>&nbsp;&nbsp;<span class="red circle white-text">&nbsp;&nbsp;<?php echo count($adverseMedia); ?>&nbsp;&nbsp;</span>  
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
                <?php if (in_array("$userperm", $allowpeopleadd)) { ?>
                <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                    <a class="btn-floating btn-large waves-effect tooltipped "  href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=media/adverseMedia/search" data-position="left" data-delay="50" data-tooltip="Create New Adverse Media" >
                        <i class="large material-icons">add</i>
                    </a>
                </div>
                <?php } else {
                }
                ?>

                <div class="card z-depth-0">
                    <div class="card-content ">
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Publisher</th>
                                    <th>Page</th>
                                </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <tbody>
                                <?php
                                if (!empty($adverseMedia)) {
                                    $r = 1;
                                    foreach ($adverseMedia as $record) {
                                        $media_id = $record->id;
                                        $title = $record->title;
                                        $page = $record->page;
                                        $authors = $record->authors;
                                        $publisher = $record->publisher;
                                        ?>
                                        <?php if (in_array("$userperm", $allowpeopleviewinside)) { ?>
                                        <tr onclick="location.href = '<?php echo Yii::app()->baseUrl; ?>/index.php?r=media/adverseMedia/view&id=<?php echo $code->encode($media_id); ?>'">
                                        <?php } else { ?>
                                            <tr>
                                        <?php } ?>
                                            <td><?php echo $r; ?>.</td>
                                            <td><?php echo $title; ?></td>
                                            <td><?php echo $authors; ?></td>
                                            <td><?php echo $publisher; ?></td>
                                            <td><?php echo 'Page_'.$page; ?></td>
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
<?php } else {
}
?>