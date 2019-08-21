<table id="example" class="display responsive-table datatable-example attachment-info">
    <thead>
        <tr>
            <th style="width: 30px; text-align: center;">#</th>
            <th style="width: 150px; text-align: center;">Description</th>
            <th style="width: 150px; text-align: center;">Status</th>
            <th style="width: 150px; text-align: center;">Role Name</th>
<!--            <th style="width: 150px; text-align: center;">Actions</th>-->
        </tr>
    </thead>
    <tfoot><tr></br></tr></tfoot>
    <tbody>
        <?php if (!empty($model)) { ?>
            <?php
            $t = 1;
            foreach ($model as $record) {
                $permission_id = $record->roleUuid;
                //$count_users = TUsers::model()->count("role = '$record->roleVariable'");

                switch ($record->status) {
                    case 'A': $status = 'Active';
                        $btn = 'Active';
                        $color = 'green';
                        break;
                    case 'S': $status = 'System Admin';
                        $btn = 'System Admin';
                        $color = 'purple';
                        break;
                    case 'D': $status = 'Business Creator';
                        $btn = 'Business Creator';
                        $color = 'grey';
                        break;
                    case 'BA': $status = 'Business System Admin';
                        $btn = 'Business System Admin';
                        $color = 'purple';
                        break;

                }
                ?>
                <tr>
                    <td><?php echo $t . '. ' ?></td>
                    <td style="width: 150px; text-align: center;"><?php echo $record->Description; ?></td>
                    <td style="width: 150px; text-align: center;"> <code class="white-text <?php echo $color; ?>"><?php echo $status; ?></code> </td>
                    <td style="width: 150px; text-align: center;"> <?php echo $record->roleName; ?> </td>

<!--                    <td style="width: 150px; text-align: center;">-->
<!--                        <a href="#editrole--><?php ////echo $record->id; ?><!--" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><i class="material-icons tiny">edit</i></a>-->
<!--                        <a href="#deleterole--><?php ////echo $record->id; ?><!--" class="modal-trigger" onmouseover="this.style.color = 'orange';"  onmouseout="this.style.color = '';"><i class="material-icons tiny">delete</i></a>-->
<!--                    </td>-->
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