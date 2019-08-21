<?php
$userid = Yii::app()->user->userUuid;
$userValue = TUsers::model()->findByAttributes(array('userUuid'=>$userid));
$currentUser = $userValue['username'];
$nameFetch = TUsersRegister::model()->findByAttributes(array('email'=>$currentUser));
$CurrentName = $nameFetch['names'];
//    $find_org = AUserRoles::model()->findByAttributes(array('assignedTo'=>$userid));
//    $org_creator = $find_org->assignedBy;
//    $found = TBusiness::model()->findByAttributes(array('updatedBy'=>$org_creator));
//    $org = $found->businessName;
if (isset($_GET['info'])){
    $searched = $_GET['info'];
    $SearchUid = $_GET['Suid'];
//    echo $SearchUid;
    $count = TProfiles::model()->count("name like '%$searched%'");
}
?>
<div class="col s12 m6 l6">
    <div class="card">
        <div class="card-content">
            <span class="card-title">User information</span>
            <span style="font-weight: bolder;">Organisation Name :</span>&nbsp; &nbsp; <?php echo "Organisation"; ?><br>
            <span style="font-weight: bolder;"> User Email :</span>&nbsp; &nbsp; <?php echo $currentUser; ?><br>
            <span style="font-weight: bolder;">Number Of returns :</span>&nbsp; &nbsp; <?php echo $count; ?><br>
            <span style="font-weight: bolder;">Date :</span>&nbsp; &nbsp; <?php echo date("Y/m/d"); ?><br>
        </div>
    </div>
</div>

<div class="col s12 m6 l6">
    <div class="card">
        <div class="card-content" style="text-align: right;">
            <span class="card-title">Report Head Right</span>
        </div>
    </div>
</div>

<div class="col s12">
    <div class="page-title"  style="margin-left: 40%; font-size: 25px;">Search Report.</div>
</div>

<!-- The report head go here -->


<div class="card-content ">
    <div class="page-title"  style="margin-left: 43%; text-align: center;">Matched Records</div>
    <table id="example" class="display responsive-table datatable-example">
        <thead>
        <tr>
            <th style="width: 40px;">No.</th>
            <th style="width: 250px;">Date</th>
            <th style="width: 190px;">Name</th>
            <th style="width: 250px;">Record Unique ID</th>
            <th style="width: 250px;">Searched By</th>
        </tr>
        </thead>
        <tfoot><tr></br></tr></tfoot>
        <?php
        $search_matches = TProfileSearchMatches::model()->findAllByAttributes(array('status'=>'A'));
        if (!empty($search_matches)) {
            $r = 1;
            foreach ($search_matches as $record) {
                $res = TProfiles::model()->findByAttributes(array('profileUuid'=>$record->ProfileUuid));
                $name = $res->name;
                $userValue = TUsers::model()->findByAttributes(array('userUuid'=>$record->UpdatedBy));
                $userName = $userValue->username;
                ?>
                <tr>
                    <td><?php echo $r; ?>.</td>
                    <td><?php echo date_format(date_create($record->UpdatedOn), "d / M / Y"); ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $record->ProfileUuid; ?></td>
                    <td><?php echo $userName; ?></td>
                </tr>

                <?php
                $r++;
            }
        } else {
        }
        ?>
    </table>
</div>

