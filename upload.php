
<?php 
session_start();
include 'header.php'; ?>


<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 upload-page">

                <div class="u-area">
                    <i class="cv cvicon-cv-upload-video"></i>

                    <p class="u-text1">Select Video files to upload</p>
                    



                    <form id="form" method="post" action="upload_script.php" class="flex" enctype="multipart/form-data">
                       
                        <input type='file' name='file' style="display:none" id="file"  >
                        <label for="file" class="display center-text btn btn-primary u-btn" ><b>Choose a file...</b></label>
                        <input type="submit" name="submit" class="btn btn-primary u-btn" value="Upload">
                    </form>
                </div>
                <div class="container-fluid u-details-wrap">
<?php include 'footer.php'; ?>


