<div id="assign" class="modal modal-footer" style="width:650px">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'add-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => true,
    ));
    ?>
    <!--profile fields-->



    <div class="modal-content white">
        <h4 style="text-transform: capitalize;">Assign  Permission
            <div class="divider"></div>
        </h4>
        <?php if($print != NULL){ ?>
            <div class='red lighten-3 white-text' style='width: 100%; padding: 3px; text-align: left; font-size: 12px;'>
                <?php echo $print; ?>
            </div>
        <?php } ?>
        <span>Are you sure you want to <span class="green-text">assign</span> </span>
        <span class="grey-text"><span class="black-text">
              <div class="input-field col s12">
              <input placeholder="username@example.com" id="displayname" name="user" type="text" required="required">
              <label for="displayname" class="active">User Email<span class="red-text">*</span></label>
              <span id="type-status"></span>
              <span id="type-status2"></span>
          </div>
          <script>
              $(document).ready(function(){
                  $("#displayname").change(function() {
                      var usr = $("#displayname").val();
                      //$("#email-status").html("Checking availability...");

                      $.ajax({
                          url: '<?php echo @Yii::app()->baseUrl; ?>/index.php?r=usermanager/panel/checkuser',
                          data: "user="+ usr,
                          dataType: 'text',
                          type: "POST",
                          success: function(msg){
                              if(msg === '<span style="color:red"> User Does Not Exist.</span>'){

                                  $("#displayname").removeClass('object_error'); // if necessary
                                  $("#displayname").addClass("object_ok");
                                  $("#type-status").html(msg);
                                  setTimeout(resetAll,3000);

                                  function resetAll(){

                                      $('#type-status').remove();

                                  }

                              } else {

                                  $("#displayname").removeClass('object_ok'); // if necessary
                                  $("#displayname").addClass("object_error");
                                  $("#type-status2").html(msg);
                                  setTimeout(resetAll2,3000);
                                  function resetAll2(){

                                      $('#type-status2').remove();

                                  }
                              }

                          }

                      });


                  });
              });
          </script>
                 <div class="input-field col s12">
                 <select name="role" required="required" style="position: absolute; width: 100%;">
                       <option value="" disabled selected>Choose ...</option>
                <?php
                if (!empty($roles)) {

                    foreach ($roles as $result) {
                        ?>
                        <option value="<?php echo $result->roleUuid; ?>"><?php echo $result->roleName; ?></option>
                        <?php
                    }
                }
                ?>
               </select>
             </div>
        </span>

    </div>
    <div class="modal-footer" style="background-color:">
        <button type="submit" class="btn waves-effect waves-red btn-flat">Yes</button>
        <a href="#" class="modal-action modal-close waves-effect waves-grey btn-flat">No</a>
    </div>
    <?php $this->endWidget(); ?>
</div> 