<?php  
session_start();
require('../config/connect.php');
if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
    header('location: login.php');
}


if(isset($_POST) && !empty($_POST)){
    $name=mysqli_real_escape_string($connection, $_POST['name']);
    $description=mysqli_real_escape_string($connection, $_POST['description']);
    $sql = "INSERT INTO category (name, description) VALUES ('$name', '$description')";
    $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
    if($res){
        $smsg = "Category Added Successfully";
    }
    else{
        $fmsg ="failed to add category";
    }

    if(isset($_POST['maincat']) && !empty($_POST['maincat'])){
        $maincatid = mysqli_real_escape_string($connection, $_POST['maincat']);
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $description = mysqli_real_escape_string($connection, $_POST['description']);
        $sql = "INSERT INTO subcat (catid, name, description) VALUES ($maincatid, '$name', '$description')";
        $res = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        if($res){
            $ssmsg = "Sub Category Added Successfully";
        }
        else{
            $sfmsg ="failed to add Sub category";
        }
    }
}
?>

<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>     
    </div>
    <div class="container">
        <!-- bootstrap Pannels -->
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
                                <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
                                <label>Category Name</label>
                                <input name="name" class="form-control" placeholder="Category Name" Value="" type="text" required="">
                                <br>
                                <label>Category Description</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                                <br>
                                <input type="submit" value="Add Category" class="btn btn-primary btn-lg" >
                            </div>
                            <div class="col-md-6">
                                <label>Product Name</label>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                        
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <?php if(isset($ssmsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $ssmsg; ?> </div><?php } ?>
                                <?php if(isset($sfmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fsmsg; ?> </div><?php } ?>
                                <label>Select Main Category Name</label>
                                <select name="maincat" class="form-control">
                                <?php
                                    $selsql = "SELECT * FROM category";
                                    $selres = mysqli_query($connection, $selsql);
                                    while($selfetch= mysqli_fetch_assoc($selres)){
                                ?>
                                    <option value="<?php echo $selfetch['id']; ?>"><?php echo $selfetch['name'];?></option>
                                <?php
                                    }
                                ?>
                                </select>
                                <br>
                                <label>Sub Category Name</label>
                                <input name="name" class="form-control" placeholder="Category Name" Value="" type="text" required="">
                                <br>
                                <label>Sub Category Description</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                                <br>
                                <input type="submit" value="Add Sub Category" class="btn btn-primary btn-lg" >
                            </div>
                            <div class="col-md-6">
                                <label>Product Name</label>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                        
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
      
    </div>

    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                <ul>
                    <?php
                        $selsql="SELECT * FROM category";
                        $selres=mysqli_query($connection, $selsql);
                        while($selfetch=mysqli_fetch_assoc($selres)){
                            echo "<li>" .$selfetch['name'] . "</li>";
                        }
                    ?>
                </ul>
                </div>
            </div>
        </div>
    </div>

<?php include 'inc/footer.php'; ?>  