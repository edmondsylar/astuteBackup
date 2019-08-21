<?php
$uid = $draftInfo->profileUuid;
?>
<div class="row no-m-t no-m-b">
    <div class="col s12 m12 l8">
        <div class="card visitors-card">
            <div class="card-content">
                <div class="card-options">
                    <ul>
                        <li><a href="javascript:void(0)" class="card-refresh"><i class="material-icons">refresh</i></a></li>
                    </ul>
                </div>
                <span class="card-title">References<span class="secondary-title">reference details</span></span>
                <table class="responsive-table bordered">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title </th>
                        <th>Type </th>
                        <th>publisher </th>
                        <th>updated On </th>
                    </tr>
                    </thead>

                    <?php
                   
                    $counter = 0;
                    $refs = AReferences::model()->findAll("profileUuid = '$uid'");
                    foreach($refs as $ref){
                        $counter +=1;
                        ?>
                        <tr>
                            <td>
                                <?php echo $counter; ?>
                            </td>
                            <td>
                                <?php echo $ref->title; ?>
                            </td>
                            <td>
                                <?php echo $ref->type; ?>
                            </td>
                            <td>
                                <?php echo $ref->publisher; ?>
                            </td>
                            <td>
                                <?php echo date_format(date_create($ref->updatedOn), "d / F / Y"); ?>
                            </td>

                        </tr>

                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col s12 m12 l4">
        <div class="card server-card">
            <div class="card-content">
              <span class="card-title">Date Types</span>
                <table class="responsive-table bordered">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Date </th>
                        <th>Date Type </th>
                    </tr>
                    </thead>

                    <?php
                    
                    $counter = 0;
                    $datetypes = AProfileDates::model()->findAll("profileUuid = '$uid'");
                    foreach($datetypes as $date){
                        $counter +=1;
                    ?>
                    <tr>
                        <td>
                            <?php echo $counter; ?>
                        </td>
                        <td>
                            <?php echo $date->date; ?>
                        </td>
                        <td>
                            <?php
                                $datetypes = ADateTypes::model()->findByAttributes(array("dateTypeUuid"=>$date->dateTypeUuid));
                                echo $datetypes->dateTypeName;
                             ?>
                        </td>

                    </tr>

                    <?php
                    }
                    ?>
                </table>

            </div>
        </div>
    </div>
</div>
<?php
include_once "modals/addreference.php";
include_once "modals/addDate.php";
?>