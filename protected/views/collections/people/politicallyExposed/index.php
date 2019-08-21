<?php
$code = new Encryption;
$people = $model[0];
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
                                        <?php  echo CHtml::link('Panel', array('collections/panel')); ?> &sol;
                                        <span class="black-text">People</span> &sol;
                                        <span>Politically Exposed People</span>
                                    </div>
                                </h5>
                            </div>
                        </div>
                        <div class="row search-tabs-row search-tabs-container grey lighten-4">
                            <div class="col s12 m6 16 search-stats">                                
                                <ul class="tabs">
                                    <li class="tab col s10" style="text-align: left">
                                        <span class="grey-text" style="font-size: 14px;">Politically Exposed People</span>&nbsp;&nbsp;<span class="red circle white-text">&nbsp;&nbsp;<?php echo count($people); ?>&nbsp;&nbsp;</span>
                                    </li>  
                                </ul>
                            </div>
                            <div class="col s12 m6 l6 right-align" style="margin-top: 7px;">
                                <input type="button" class=" waves-blue btn-flat" value="View Pending Positions" onclick="window.open('<?php echo @Yii::app()->baseUrl; ?>/index.php?r=collections/people/politicallyExposed/viewpendingwork', 'popup', 'height=400,width=1000,left=5,top=10,scrollbars=yes,menubar=no titlebar'); return false;"
                                       onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';">
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
                    <a class="btn-floating btn-large red waves-effect tooltipped "  href="<?php echo @Yii::app()->baseUrl; ?>/index.php?r=collections/people/politicallyExposed/search" data-position="left" data-delay="50" data-tooltip="Create New Person" >
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
                                    <th>Gender</th>
                                    <th>Nationality</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot><tr></br></tr></tfoot>
                            <tbody>
                                <?php
                                if (!empty($people)) {
                                    $r = 1;
                                    foreach ($people as $record) {
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
                                        $gender = $record->gender;
                                        $genderValue = TPgender::model()->findByPk($gender);
                                        $gendername = $genderValue->name;

                                        $nationality = $record->nationality;
                                        $nationalityvalue = TCountry::model()->findByAttributes(array('code' => $nationality));
                                        $nationalityname = $nationalityvalue->name;
                                        ?>

                                        <tr onclick="location.href = '<?php echo Yii::app()->baseUrl; ?>/index.php?r=collections/people/politicallyExposed/view&id=<?php echo $code->encode($record->person_id); ?>'">
                                            <td><?php echo $r; ?>.</td>
                                            <td><?php echo $record->name; ?></td>
                                            <td><?php echo $gendername; ?></td>
                                            <td><?php echo $nationalityname; ?></td>
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