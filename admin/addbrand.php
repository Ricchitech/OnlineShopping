<?php
session_start();
include("../db.php");
include "sidenav.php";
include "topheader.php";

if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$brand_id=$_GET['brand_id'];
/*this is delet quer*/
mysqli_query($con,"delete from brands where brand_id='$brand_id'")or die("query is incorrect...");
}

if(isset($_POST['btn_save']))
{
$brand_title=$_POST['brand_title'];
mysqli_query($con,"insert into brands (`brand_title`) values ('$brand_title')") or die ("Query 1 is inncorrect");
//header("location: addbrand.php"); 
mysqli_close($con);
}
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-4">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Add Brand</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Brand Title</label>
                        <input type="text" id="brand_name" required name="brand_title" class="form-control">
                      </div>
                    </div>
                  </div>
                  <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary pull-right">Add New Brand</button>
                    <div class="clearfix"></div> 
              </div> 
            </div>

          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Brand List</h5>
              </div>

              <div class="card-body">
                <div class="table-responsive ps">

                <table class="table tablesorter table-hover" id="">
                    <thead class=" text-primary">
                      <tr><th>ID</th> <th>Brand Name</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                    $result=mysqli_query($con1,"select brand_id , brand_title from brands") or die ("Query 2 is inncorrect");
                        while(list($brand_id,$brand_title) = mysqli_fetch_array($result)){
                        echo "<tr><td>$brand_id</td><td>$brand_title</td><td>
                        <a href='addbrand.php?brand_id=$brand_id&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete User'>
                                <i class='material-icons'>close</i>
                              <div class='ripple-container'></div></a>
                        </td></tr>";
                        }
                       mysqli_close($con1);
                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
 
          <div class="col-md-4">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Category List</h5>
              </div>

              <div class="card-body">
                <div class="table-responsive ps">

                <table class="table tablesorter table-hover" id="">
                    <thead class=" text-primary">
                      <tr><th>ID</th> <th>Category</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                    $result=mysqli_query($con,"select cat_id , cat_title from Categories") or die ("Query 2 is inncorrect");
                        while(list($cat_id,$cat_title) = mysqli_fetch_array($result)){
                        echo "<tr><td>$cat_id</td><td>$cat_title</td>";
                        }
                       mysqli_close($con);
                        ?>
                    </tbody>
                  </table>
                  <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>

                  </div>
              </div>
            </div>
          </div>
        </div>
         </form>
        </div>
      </div>
      <?php
include "footer.php";
?>