<table id="example" class="display responsive-table datatable-example attachment-info">
    <thead>
        <tr>
            <th style="width: 30px; text-align: center;">#</th>
            <th style="width: 150px; text-align: center;">Users</th>
            <th style="width: 150px; text-align: center;">Role</th>
            <th style="width: 150px; text-align: center;">Permission Variable</th>
            <th style="width: 150px; text-align: center;">Actions</th>
        </tr>
    </thead>
    <tfoot><tr></br></tr></tfoot>
    <tbody>
        <?php if (!empty($model)) { ?>
            <?php
            $t = 1;
            foreach ($model as $record) {
                //$user_id = $record->userid;

                ?>
                <tr>
                    <td><?php //echo $t . '. ' ?></td>
                    <td style="width: 150px; text-align: center;"> <?php //echo $record->username; ?> </td>
                    <td style="width: 150px; text-align: center;"> <?php// echo $record->role; ?> </td>
                    <td style="width: 150px; text-align: center;"> <?php //echo $record->userperm; ?></td>
                    <td style="width: 150px; text-align: center;">
                        <a onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';" class="modal-trigger" href="#assign<?php //echo $record->id; ?>">Assign</a>
                        &nbsp;&nbsp;|&nbsp;&nbsp;
                        <a href="#edituserpermission<?php// echo $record->id; ?>" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><i class="material-icons tiny">edit</i></a>
                    </td>
                </tr>
            <?php
                $t++;
                //add permissions
               // include 'assignpermission.php';

               // include 'edituserpermissions.php';
            } ?>
        <?php } ?>
    </tbody>
</table>