<?php $page = 'reportform'; ?>
<?php include('header-projects.php'); ?>
<?php

$id = $_GET['id'];
$project = $wpdb->get_results("select * from projects where project_id = $id");

?>
    <div class="loader-container">
        <div class="loader"></div>
    </div>
    <div id="projectform">
        <div class="general-content">
            <img src="<?php echo bloginfo('template_url').'/'; ?>img/logo.png" alt="cim logo" class="logo"><br>
            <img src="<?php echo bloginfo('template_url').'/'; ?>img/content/division-empleos.png" alt="divider" class="form-divider"><br>
            <text class="title">
                <?php echo $project[0]->project_name ?>
            </text><br>
            <div class="alert alert-danger hidden" id="error"></div>
            <div class="inside-content">
                <p class="content">Contractor work log: Please submit the following log at the specified frequency identified by Roof Management during the preconstruction meeting. The log should provide an accurate account of the work items completed, progress to completion, issues encountered and photo representation of various stages of work during the reporting period.</p>

                <form method="POST" action="<?php echo home_url().'/'; ?>controller/?id=<?php echo $_GET['id']; ?>" id="save" name="save">
                    <div class="project-info">
                        <img src="<?php echo bloginfo('template_url').'/'; ?>file_uploads/projects/<?php echo $_GET['id']; ?>/project_image.jpg" alt="imagen proyecto" class="project-img">
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
                                <td class="no-border"><input type="date" name="start-date" id="dateproject"></td>
                            </tr>
                            <tr class="no-border">
                                <td class="no-border">End Date: </td>
                                <td class="no-border"><input type="date" name="end-date" id="dateproject"></td>
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
                                <td class="no-border"><input type="checkbox" name="workitems[]" value="1" id="workitems" />Surface preparation</td>
                                <td class="no-border"><input type="checkbox" name="workitems[]" value="2" id="workitems" />Installed skylights</td>
                                <td class="no-border"><input type="checkbox" name="workitems[]" value="3" id="workitems" />Replaced deck</td>
                            </tr>
                            <tr class="no-border">
                                <td class="no-border"><input type="checkbox" name="workitems[]" value="4" id="workitems"/>Installed edge metal</td>
                                <td class="no-border"><input type="checkbox" name="workitems[]" value="5" id="workitems" />Installed wood nailer/blocking</td>
                                <td class="no-border"><input type="checkbox" name="workitems[]" value="6" id="workitems" />Installed gutters and downspouts</td>
                            </tr>
                            <tr class="no-border">
                                <td class="no-border"><input type="checkbox" name="workitems[]" value="7" id="workitems"/>Installed insulation</td>
                                <td class="no-border"><input type="checkbox" name="workitems[]" value="8" id="workitems" />Installed internal drains</td>
                                <td class="no-border"><input type="checkbox" name="workitems[]" value="9" id="workitems" />Installed field membrane</td>
                            </tr>
                            <tr class="no-border">
                                <td class="no-border"><input type="checkbox" name="workitems[]" value="10" id="workitems"/>Applied surfacing</td>
                                <td class="no-border"><input type="checkbox" name="workitems[]" value="11" id="workitems"/>Installed inter-ply membrane/felt</td>
                                <td class="no-border"><input type="checkbox" name="workitems[]" value="12" id="workitems" />Completed night tie-in</td>
                            </tr>
                            <tr class="no-border">
                                <td class="no-border"><input type="checkbox" name="workitems[]" value="13" id="workitems" />Installed capsheet</td>
                                <td class="no-border"><input type="checkbox" name="workitems[]" value="14" id="workitems" />Installed 15# felt</td>
                                <td class="no-border"><input type="checkbox" name="workitems[]" value="15" id="workitems" />Installed parapet flashings</td>
                            </tr>
                            <tr class="no-border">
                                <td class="no-border"><input type="checkbox" name="workitems[]" value="16" id="workitems" />Installed ice and water shield</td>
                                <td class="no-border"><input type="checkbox" name="workitems[]" value="17" id="workitems" />Installed curb flashings</td>
                                <td class="no-border"><input type="checkbox" name="workitems[]" value="18" id="workitems" />Installed shingles</td>
                            </tr>
                            <tr class="no-border">
                                <td class="no-border"><input type="checkbox" name="workitems[]" value="19" id="workitems" />Installed detail flashings</td>
                                <td class="no-border"><input type="checkbox" name="workitems[]" value="20" id="workitems" />Completed punch list</td>
                            </tr>
                            <tr class="no-border">
                        </table><br>
                    </div>
                    <img src="<?php echo bloginfo('template_url').'/'; ?>img/content/division-empleos.png" alt="divider" class="form-divider longwidth" style="height:2px"><br>
                    <div class="progress-completion">
                        <text style="font-weight:700;font-size:19px">PROGRESS TO COMPLETION</text><br>
                        Step 3: Update the progress to completion by inputting the total percent complete and the total square feet of the roofing <text style="color:red;font-weight:600">installed to date.</text>  <br>
                        <table style="margin-left:0" class="no-border">
                            <tr class="no-border">
                                <td class="no-border">Square feet installed to date:</td>
                                <td class="no-border"><input type="text" name="square-feet-todate" id="square-feet-todate"></td>
                            </tr>
                            <tr class="no-border">
                                <td class="no-border">Percentage completed: </td>
                                <td class="no-border"><input type="text" name="percentage-completed" id="percentagecompleted"></td>
                            </tr>
                            <tr class="no-border">
                                <td class="no-border">Target completion date: </td>
                                <td class="no-border"><input type="date" name="target-date" id="targetdate"></td>
                            </tr>
                        </table>
                        <input type="checkbox" name="completion-metal" value="1" /> Upon completion of detail and metal work, please check this box. <br>
                    </div><br>
                    <img src="<?php echo bloginfo('template_url').'/'; ?>img/content/division-empleos.png" alt="divider" class="form-divider longwidth" style="height:2px"><br>
                    <div class="fieldnotes">
                        <text style="font-weight:700;font-size:19px">FIELD NOTES</text><br>
                        Step 4: Provide details on any situations, weather issues or concerns encountered during the reporting period.<br>
                        <textarea id="details-field-notes" name="details-field-notes"></textarea><br>
                    </div><br>
                    <img src="<?php echo bloginfo('template_url').'/'; ?>img/content/division-empleos.png" alt="divider" class="form-divider longwidth" style="height:2px"><br>
                    <div class="imageupload">
                        <text style="font-weight:700;font-size:19px">PHOTO DOCUMENTATION</text><br>
                        Step 5: Provide photographs detailing various stages of the installation process for the reporting period.<br>
                        <div class="upload-section">
                            <a href="#" class="btn btn-default" onclick="document.getElementById('pictures').click(); return false;" />Select images</a>
                        </div>
                        <div class="uploaded-images" id="images"></div>
                        <input type="hidden" id="tmp-folder-delete" name="tmp-folder-delete">
                    </div><br>
                    <img src="<?php echo bloginfo('template_url').'/'; ?>img/content/division-empleos.png" alt="divider" class="form-divider longwidth" style="height:2px"><br>
                    <div class="fieldnotes">
                        <text style="font-weight:700;font-size:19px">SUBMIT LOG</text><br>
                        Step 6: Provide the name of the submitter and click the button to submit the log.
                        <div class="signature">
                            <!--<text class="submitted-by">Submitted By: NAME</text><!--nombre de usuario-->
                            <input type="hidden" name="submit-project">
                            <input type="submit" value="Submit Project Update" id="submitproject-button">
                        </div>
                    </div><br>
                </form>
            </div>
        </div>
    </div>

    <div class="hidden">
        <form action="<?php echo home_url().'/?id='; ?>controller" method="POST" id="upload-form" enctype="multipart/form-data">
            <input class="hidden" type="file" id="pictures" name="pictures[]" multiple value="Select files">
            <a href="#" class="btn btn-default" onclick="document.getElementById('pictures').click(); return false;" />Select images</a>
            <button class="btn btn-success" type="submit">Upload images</button>
            <input type="file" id="fileID" style="visibility: hidden;" />
            <input type="hidden" id="tmp-folder" name="tmp-folder">
        </form>
    </div>

    <div class="hidden">
        <form action="<?php echo home_url().'/'; ?>controller" method="POST" id="unload">
            <input type="hidden" name="tmp-folder-unload" id="tmp-folder-unload">
            <input type="hidden" name="reports">
        </form>
    </div>
    <script>
        var home = '<?php echo bloginfo('template_url');?>',
            tmpFolder = makeid(),
            imgDir = home+'/file_uploads/reports/'+tmpFolder,
            fileExt1 = '.png',
            fileExt2 = '.jpg',
            fileExt3 = '.jpeg',
            request = '';

        $('#tmp-folder').val(tmpFolder);
        $('#tmp-folder-delete').val(tmpFolder);
        $('#tmp-folder-unload').val(tmpFolder);

        function makeid() {
            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for( var i=0; i < 5; i++ )
                text += possible.charAt(Math.floor(Math.random() * possible.length));

            return text;
        }

        var homeUrl = 'http://localhost/testpictures/';
        // REPLACE FOR <?php //echo home_url(); ?>

        $('#pictures').change(function () {
            $('#upload-form').submit();
        });

        $('#upload-form').submit(function(e) {
            e.preventDefault();

            console.log('enter');

            // Abort any pending request
            if (request) {
                request.abort();
            }

            var $form = $(this),
                $inputs = $form.find('input'),
                $data = new FormData($(this)[0]);

            $inputs.prop('disabled', true);
            $('.loader-container').addClass('active');

            request = $.ajax({
                url: '<?php echo home_url();?>/controller',
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
                        $('#upload-modal').modal('hide');
                        $('.uploaded-images').empty();
                        var cont = 0;
                        $(data).find('a[href$="'+fileExt1+'"], a[href$="'+fileExt2+'"], a[href$="'+fileExt3+'"]').each(function () {
                            var $imgSrc = imgDir+'/'+$(this).attr('href');
                            $imgSrc = $imgSrc.replace('./', homeUrl);
                            $('.uploaded-images').append("<div class='col-sm-4'><div class='cropper-height'><img src='" + $imgSrc + "' class='img-responsive'><input type='hidden' name='img[]'></div><input type='text' placeholder='Description of the image' class='img-desc' name='"+cont+"'></div>");
                            cont++;
                        });
                        $('.uploaded-images .col-sm-4 img').cropper({
                            aspectRatio: 4 / 3,
                            autoCrop: true,
                        });
                        $data = new FormData($('#unload')[0]);
                        $.ajax({
                            url: '<?php echo home_url();?>/controller',
                            type: 'post',
                            xhr: function() {
                                var myXhr = $.ajaxSettings.xhr();
                                return myXhr;
                            },
                            success: function (data) {
                                console.log("Data unloaded");
                            },
                            data: $data,
                            cache: false,
                            contentType: false,
                            processData: false
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

        $('#selectimgs').click(function(e){
            e.preventDefault();
        });

        $('#save').submit(function(e) {
            e.preventDefault();

            $('.uploaded-images .col-sm-4 > .cropper-height > img').each(function() {
                var $canvas = $(this).cropper('getCroppedCanvas'),
                    $img_base64 = $canvas.toDataURL('image/jpeg');
                $(this).nextAll('input').eq(0).val($img_base64);
            });

            var errors ="";
            var start = $("input[name=start-date]").val();
            var end = $("input[name=end-date]").val();
            //var workItems = $('#workitems:checked').length;
            var squareFeetToDate = $("#square-feet-todate").val();
            var percentageCompleted = $("#percentagecompleted").val();
            var targetdate = $("#targetdate").val();
            var detailsFieldNotes = $("#details-field-notes").val();

            if( start == null || start.length == 0) {
                errors += "The Start Date is required<br>";
            }
            if( start == null || start.length == 0) {
                errors += "The End Date is required<br>";
            }
            /*if( workItems == 0) {
                errors += "You must complete at least one work item<br>";
            }*/
            if( squareFeetToDate == null || squareFeetToDate.length == 0) {
                errors += "The Square feet installed to date is required<br>";
            } else if(!/^\d+$/.test(squareFeetToDate)){
                errors += "Enter a valid number for Square feet installed to date (only whole numbers)<br>";
            }
            if( percentageCompleted == null || percentageCompleted.length == 0) {
                errors += "The Percentage completed is required<br>";
            } else if(!/^\d{4}$/.test(percentageCompleted)){
                errors += "Enter a valid percentage of completion (only whole numbers)<br>";
            } else if (percentageCompleted > 100) {
                errors += "You can not select a percentage of completion greater than 100<br>";
            }
            if( targetdate == null || targetdate.length == 0) {
                errors += "The Target completion date is required<br>";
            }
            if( detailsFieldNotes == null || detailsFieldNotes.length == 0) {
                errors += "The field notes are required<br>";
            } else if(detailsFieldNotes.length > 512){
                errors += "The maximum number of letters for the field notes is 521<br>";
            }
            if($("#images").html()==''){
                errors += "You must upload an image for the project<br>";
            }
            //redireccion
            if(errors=="") {
                $(this)[0].submit();
            } else {
                //colorear los campos mal ingresados
                $("#error").removeClass('hidden').addClass('active').html("Whoops <br>"+errors);
                $('html,body').animate({ scrollTop: 0 }, 'slow');
                return false;
            }
        });
    </script>
<?php include('footer-projects.php'); ?>