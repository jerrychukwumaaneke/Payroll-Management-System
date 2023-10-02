 <nav class="navbar navbar-expand navbar-light  topbar mb-4 static-top shadow" style="background-color: black;">

        


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

           

    

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <div class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                      <?php
// $adminid=$_SESSION['aid'];
// $ret=mysqli_query($con,"select AdminName from tbladmin where ID='$adminid'");
// $row=mysqli_fetch_array($ret);
// $name=$row['AdminName'];

?>
               <!--  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name; ?></span> -->
                <!-- <img class="img-profile rounded-circle" src="../img/emprofilepic/IMG_20190811_125703_428.jpg"> -->
              </div>
            </li>

          </ul>

        </nav>