<?php $page = 'editreport'; ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Report Form</title>
        <link rel="stylesheet" href="<?php echo bloginfo('template_url').'/'; ?>css/formstyles.css">
        <link rel="stylesheet" href="<?php echo bloginfo('template_url').'/'; ?>style.css">
        <link rel="stylesheet" href="<?php echo bloginfo('template_url').'/'; ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo bloginfo('template_url').'/'; ?>css/cropper.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    </head>
    <body style="margin:0">
        <?php 

        $id = $_GET['id'];
        $rid = $_GET['rid'];
        $project = $wpdb->get_results("select * from projects where project_id = $id");
        $report = $wpdb->get_results("select * from reports where report_id = $rid");
        $report = $report[0];

        ?>

        <div id="projectform">
            <div class="general-content">

                <img src="<?php echo bloginfo('template_url').'/'; ?>img/logo.png" alt="cim logo" class="logo"><br>
                <img src="<?php echo bloginfo('template_url').'/'; ?>img/content/division-empleos.png" alt="divider" class="form-divider"><br>
                <text class="title">
                    <?php echo $project[0]->project_name ?>
                </text><br>
                <div class="inside-content">
                    <p class="content">Contractor work log: Please submit the following log at the specified frequency identified by Roof Management during the preconstruction meeting. The log should provide an accurate account of the work items completed, progress to completion, issues encountered and photo representation of various stages of work during the reporting period.</p>

                    <form method="POST" action="<?php echo home_url().'/'; ?>controller">
                        <div class="project-info">
                            <img src="<?php echo bloginfo('template_url').'/'; ?>img/content/project-img-example.png" alt="imagen proyecto" class="project-img">
                            <div class="information">
                                Project Name:&nbsp;<text class="project-name"><?php echo $project[0]->project_name ?></text><br>
                                Address:&nbsp;<text class="project-name"><?php  echo $project[0]->project_address ?></text><br>
                                Contract Amount:&nbsp;<text class="project-name">$<?php echo $project[0]->project_contract_amount ?></text><br> <!-- SOLO VISTO POR ADMIN -->
                                Project Year:&nbsp;<text class="project-name"><?php echo $project[0]->project_year ?></text><br>
                                Project Area:&nbsp;<text class="project-name"><?php echo $project[0]->project_area ?></text><br>
                            </div>
                        </div>
                        <br>
                        <img src="<?php echo bloginfo('template_url').'/'; ?>img/content/division-empleos.png" alt="divider" class="form-divider longwidth" style="height:2px"><br>
                        <div class="log-reporting-period">
                            <text style="font-weight:700;font-size:19px">LOG REPORTING PERIOD</text><br> 
                            Step 1: Identify the reporting period for this work log submission. <br>
                            <table style="margin-left:0" class="no-border">
                                <tr class="no-border">
                                    <td class="no-border">Start Date:</td> 
                                    <td class="no-border"><input type="date" name="start-date" id="dateproject" value="<?php echo $report->report_start_date; ?>"></td>
                                </tr>
                                <tr class="no-border">
                                    <td class="no-border">End Date: </td>
                                    <td class="no-border"><input type="date" name="end-date" id="dateproject" value="<?php echo $report->report_end_date; ?>"></td>
                                </tr>
                            </table>
                        </div>
                        <?php echo '<input type="hidden" name="project-id" value="', $id ,'">'; ?>
                        <br>
                        <img src="<?php echo bloginfo('template_url').'/'; ?>img/content/division-empleos.png" alt="divider" class="form-divider longwidth" style="height:2px"><br>
                        <div class="work-items-completed">
                            <text style="font-weight:700;font-size:19px">WORK ITEMS COMPLETED</text><br> 
                            Step 2: Select the work items completed during the reporting period of this log.  <br>
                            <table style="margin-left:auto;margin-right:auto;margin-top:10px">
                                <tr class="no-border">
                                    <?php 
                                    $count = $wpdb->get_var("SELECT COUNT(*) FROM report_work_items WHERE report_id= '$rid'");
                                    $work = $wpdb->get_results("select work_item_id from report_work_items where report_id = $rid");
                                    $work_name = $wpdb->get_results("select work_item_name from work_items");

                                    for($i=1;$i<=20;$i++){
                                        $found = false;

                                        /* if(($column % 3) == 0){
                                    echo '<tr class="no-border">';
                                }*/

                                        for($n=0;$n<$count;$n++){
                                            if($work[$n]->work_item_id == $i)
                                                $found = true;
                                        }

                                        if($found==true)
                                            echo '<td class="no-border"><input type="checkbox" name="workitems[]" value="', $i ,'" id="workitems" checked />', $work_name[($i-1)]->work_item_name ,'</td>';
                                        else
                                            echo '<td class="no-border"><input type="checkbox" name="workitems[]" value="', $i ,'" id="workitems" />', $work_name[($i-1)]->work_item_name ,'</td>';


                                        if((($i % 3) == 0) && $i!=1){
                                            echo '</tr><tr class="no-border">';
                                        }

                                    }

                                    ?>
                                <tr class="no-border">
                            </table><br>
                        </div>
                        <img src="<?php echo bloginfo('template_url').'/'; ?>img/content/division-empleos.png" alt="divider" class="form-divider longwidth" style="height:2px"><br>
                        <div class="progress">
                            <text style="font-weight:700;font-size:19px">PROGRESS TO COMPLETION</text><br> 
                            Step 3: Update the progress to completion by inputting the total percent complete and the total square feet of the roofing <text style="color:red;font-weight:600">installed to date.</text>  <br>
                            <table style="margin-left:0" class="no-border">
                                <tr class="no-border">
                                    <td class="no-border">Square feet installed to date:</td> 
                                    <td class="no-border"><input type="text" name="square-feet-todate" id="square-feet-todate" value="<?php echo $report->report_square_feet_to_date; ?>"></td>
                                </tr>
                                <tr class="no-border">
                                    <td class="no-border">Percentage completed: </td>
                                    <td class="no-border"><input type="text" name="percentage-completed" id="percentagecompleted" value="<?php echo $report->report_percentage_completed; ?>"></td>
                                </tr>
                                <tr class="no-border">
                                    <td class="no-border">Target completion date: </td>
                                    <td class="no-border"><input type="date" name="target-date" id="targetdate" value="<?php echo $report->report_target_completion_date; ?>"></td>
                                </tr>
                            </table>
                            <?php 
                            if($report->report_completed==1){
                                echo '<input type="checkbox" name="completion-metal" value="1" checked/>';
                            }else{
                                echo '<input type="checkbox" name="completion-metal" value="1" />';
                            }?>
                            Upon completion of detail and metal work, please check this box. <br>
                        </div><br>
                        <img src="<?php echo bloginfo('template_url').'/'; ?>img/content/division-empleos.png" alt="divider" class="form-divider longwidth" style="height:2px"><br>
                        <div class="fieldnotes">
                            <text style="font-weight:700;font-size:19px">FIELD NOTES</text><br> 
                            Step 4: Provide details on any situations, weather issues or concerns encountered during the reporting period.<br>
                            <textarea id="details-field-notes" name="details-field-notes"><?php echo $report->report_field_notes; ?></textarea><br>
                        </div><br>
                        <img src="<?php echo bloginfo('template_url').'/'; ?>img/content/division-empleos.png" alt="divider" class="form-divider longwidth" style="height:2px"><br>
                        <div class="fieldnotes">
                            <text style="font-weight:700;font-size:19px">PHOTO DOCUMENTATION</text><br> 
                            Step 5: Provide photographs detailing various stages of the installation process for the reporting period.<br>
                            <input type="file" value="Add/Edit Pictures" name="add-pictures" id="pictures-button"><br>
                            <div class="image-tumbnails">Image thumbnails</div><br>
                        </div><br>
                        <img src="<?php echo bloginfo('template_url').'/'; ?>img/content/division-empleos.png" alt="divider" class="form-divider longwidth" style="height:2px"><br>
                        <div class="fieldnotes">
                            <text style="font-weight:700;font-size:19px">SUBMIT LOG</text><br> 
                            Step 6: Provide the name of the submitter and click the button to submit the log.
                            <div class="signature">
                                <text class="submitted-by">Submitted By: NAME</text><!--nombre de usuario-->
                                <input type="hidden" name="report-id" value="<?php echo $report->report_id; ?>">
                                <input type="hidden" name="project-id" value="<?php echo $report->project_id; ?>">
                                <input type="submit" value="Submit" name="edit-report" id="editreport-button">
                            </div>
                        </div><br>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="<?php echo bloginfo('template_url').'/'; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo bloginfo('template_url').'/'; ?>/js/cropper.js"></script>
    <script>
        var tmpFolder = makeid(),
            imgDir = './file_uploads/'+tmpFolder,
            fileExt1 = '.png',
            fileExt2 = '.jpg',
            fileExt3 = '.jpeg',
            request = '';

        $('#tmp-folder').val(tmpFolder);
        $('#tmp-folder-delete').val(tmpFolder);

        function makeid() {
            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for( var i=0; i < 5; i++ )
                text += possible.charAt(Math.floor(Math.random() * possible.length));

            return text;
        }

        var homeUrl = 'http://localhost/testpictures/';
        // REPLACE FOR <?php //echo home_url(); ?>

        $('#upload-form').submit(function(e) {
            e.preventDefault();

            // Abort any pending request
            if (request) {
                request.abort();
            }

            var $form = $(this),
                $inputs = $form.find('input'),
                $serialiazedData = $form.serialize(),
                //$files = $('#pictures').prop('files'),
                $data = new FormData($(this)[0]);

            /*$.each($files, function(key, value) {
            data.append(key, value);
        });*/

            //$form_data.append('file', $file_data);

            console.log($(this)[0]);

            $inputs.prop('disabled', true);
            $('.loader-container').addClass('active');

            request = $.ajax({
                url: './controller.php',
                type: 'post',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                success: function (data) {
                    //alert("Data Uploaded: "+data);
                },
                data: $data,
                cache: false,
                contentType: false,
                processData: false
            });

            //console.log($serialiazedData);

            request.done(function (response, textStatus, jqXHR) {
                console.log('Images saved successfully');
                $.ajax({
                    url: imgDir,
                    success: function(data) {
                        $('.uploaded-images').empty();
                        //List all .png file names in the page
                        //var $img_counter = 0;
                        $(data).find('a[href$="'+fileExt1+'"], a[href$="'+fileExt2+'"], a[href$="'+fileExt3+'"]').each(function () {
                            var $imgSrc = imgDir+'/'+$(this).attr('href');
                            $imgSrc = $imgSrc.replace('./', homeUrl);
                            $('.uploaded-images').append("<div class='col-sm-4'><img src='" + $imgSrc + "' class='img-responsive'><input type='hidden' name='img[]'></div>");
                            //$img_counter++;
                        });
                        $('.uploaded-images .col-sm-4 > img').cropper({
                            aspectRatio: 16 / 9,
                        });
                    }
                });
            });

            request.fail(function (jqXHR, textStatus, errorThrown) {
                console.error(
                    'The following error has occurred: ' +
                    textStatus, errorThrown
                );
            });

            setTimeout(function() {
                request.always(function () {
                    // Reenable the inputs
                    $inputs.prop("disabled", false);
                    $('.loader-container').removeClass('active');
                });
            },500);
        });

        $('#save').submit(function(e) {
            e.preventDefault();
            /*var data = $this.data();
        var $target;
        var result;
        var $image = $('.uploaded-images img').eq(0);

        result = $image.cropper();*/
            $('.uploaded-images .col-sm-4 > img').each(function() {
                $(this).nextAll('input').eq(0).val($(this).cropper('getCroppedCanvas').toDataURL('image/jpeg'));
            });
            $(this)[0].submit();
        });
    </script>
</html>