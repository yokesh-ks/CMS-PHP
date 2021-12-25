<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>     
    </div>
    <div class="container">
        <!-- bootstrap Pannels -->
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="post">
                        <div class="row">
                           
                            <div class="col-md-6">
                                <label>Category Name</label>
                                <input name="name" class="form-control" placeholder="Category Name" Value="" type="text" required="">
                            </div>
                            <div class="col-md-6">
                                <label>Product Name</label>
                                <input type="submit" value="Add Product" class="btn btn-primary btn-lg" >
                            </div>
                        
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
        <!-- Sidebar-->
        <div class="col-md-4">
            <div class="panel panel-default">
            <div class="panel-heading">Categories</div>
                <div class="panel-body">
                    Basic panel example
                </div>
            </div>
            <div class="panel panel-default">
            <div class="panel-heading">Recent Comments</div>
                <div class="panel-body">
                    Basic panel example
                </div>
            </div>
            <div class="panel panel-default">
            <div class="panel-heading">Recent Articles</div>
                <div class="panel-body">
                    Basic panel example
                </div>
            </div>
        </div>
        <!-- /sidebar -->
    </div>
<?php include 'inc/footer.php'; ?>  