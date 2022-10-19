
<?php 
session_start();
include 'database.php';
if(!isset($_GET['id'])||!isset($_SESSION['id_user'])){
    header("location:index.php");
    }
    else {
        $id=$_GET['id'];
        
    $query = "SELECT * FROM videos WHERE id_video=? AND id_user=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id,$_SESSION['id_user']]);

    
    $count = $stmt->rowCount();
    if($count==1){
        $video = $stmt->fetch();
        $title=$video['title'];
        $description=$video['description'];
        $video=$video['video'];
    }
    else{
        header("location:index.php");
    }
    
    }
        
    ?>
    <?php include_once 'header.php';?>
<!-- goto -->

<!-- /goto -->

<form action="upload-edit-script.php" method="post">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="u-form">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="e1">Video Title</label>
                                <input type="text" name="title" class="form-control" id="e1" placeholder="Enter name" value="<?php echo $title;?>">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="e2">About</label>
                                <textarea class="form-control" name="description" id="e2" rows="3" placeholder="Enter description" value=><?php echo $description;?></textarea>
                            </div>
                        </div>
                    </div>


                </div>
        <input type="hidden" name="id" value="<?php echo $id;?>">
                <div class="u-area mt-small">
                        <input type="submit" name="submit" class="btn btn-primary u-btn" value="Save">
                        <!--a tag that leads to single-video.php-->
                        <a href="single-video.php?id=<?php echo $id;?>" class="btn btn-primary u-btn">Go to video</a>
                    
                </div>
                
            </div>
        </div>
    </div>

</form>

<?php include 'footer.php'; ?>