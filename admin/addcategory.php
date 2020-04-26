<?php
session_start();
include("../db.php");
include "sidenav.php";
include "topheader.php";

if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$cat_id=$_GET['cat_id'];
/*this is delet quer*/
mysqli_query($con,"delete from categories where cat_id='$cat_id'")or die("query is incorrect...");
}

if(isset($_POST['btn_save']))
{
$cat_title=$_POST['cat_title'];
mysqli_query($con,"insert into categories (`cat_title`) values ('$cat_title')") or die ("Query 1 is inncorrect");
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
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Add Category</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Category Title</label>
                        <input type="text" id="cat_name" required name="cat_title" class="form-control">
                      </div>
                    </div>
                  </div>
                  <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary pull-right">Add New Category</button>
                    <div class="clearfix"></div>
                  
                
              </div>
              
            </div>
          </div>
          <div class="col-md-5">
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
                    $result=mysqli_query($con1,"select cat_id , cat_title from Categories") or die ("Query 2 is inncorrect");
                        while(list($cat_id,$cat_title) = mysqli_fetch_array($result)){
                        echo "<tr><td>$cat_id</td><td>$cat_title</td><td>
                        <a href='addcategory.php?cat_id=$cat_id&action=delete' type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Delete User'>
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