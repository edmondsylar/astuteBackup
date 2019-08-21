<table id="example" class="display responsive-table datatable-example attachment-info">
    <thead>
        <tr>
            <th style="width: 30px; text-align: center;">#</th>
            <th style="width: 200px; text-align: center;">Email</th>
            <th style="width: 150px; text-align: center;">UserName</th>
            <th style="width: 150px; text-align: center;">Role</th>
            <th style="width: 150px; text-align: center;">Created By</th>
            <th style="width: 150px; text-align: center;">Status</th>
            <th style="width: 150px; text-align: center;">Actions</th>
        </tr>
    </thead>
    <tfoot><tr></br></tr></tfoot>
    <tbody>
        <?php if (!empty($model)) { ?>
            <?php
            $t = 1;
            foreach ($model as $record) {
                $userValue = TUsers::model()->findByAttributes(array('userUuid'=>$record->Creator));
                $userName = $userValue->username;
                $roleValue = IRoles::model()->findByAttributes(array('roleUuid'=>$record->role));
                $roleName = $roleValue->Description;

                switch ($record->status) {
                    case 'A': $status = 'Active';
                        $btn = 'Active';
                        $color = 'green';
                        break;
                    case 'D': $status = 'Draft';
                        $btn = 'Draft';
                        $color = 'red';
                        break;
                }
                ?>
                <tr>
                    <td><?php echo $t . '. ' ?></td>
                    <td style="width: 200px; text-align: center;"><?php echo $record->email; ?></td>
                    <td style="width: 150px; text-align: center;"> <?php echo $record->Names; ?> </td>
                    <td style="width: 150px; text-align: center;"> <?php echo $roleName; ?> </td>
                    <td style="width: 150px; text-align: center;"> <?php echo $userName; ?> </td>
                    <td style="width: 150px; text-align: center;"><code class="white-text <?php echo $color; ?>"><?php echo $status; ?></code></td>
                    <td style="width: 150px; text-align: center;">
                        <a href="#edituser<?php echo $record->systemUserUuid; ?>" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><i class="material-icons tiny">edit</i></a>
                        <a href="#deleteuser<?php echo $record->systemUserUuid; ?>" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><i class="material-icons tiny">delete</i></a>
                    </td>
                </tr>
            <?php
                $t++;
                //include 'modals/adversemediastatus.php';
                //include 'modals/deleteprogram.php';
                //include 'modals/editprogram.php';
            } ?>
        <?php } ?>
    </tbody>
</table>