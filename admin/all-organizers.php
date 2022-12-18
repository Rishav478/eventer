<?php 
include('includes/autoload.php'); 


require('includes/login_auth.php'); 
$_SESSION['LAST_ACTIVE_LOGIN'] = time();
$aid = $_SESSION['aid'];
$LAST_LOGIN = $_SESSION['LAST_ACTIVE_LOGIN'];

?>
      <!-- Main Content -->
      <div class="main-content">

            <div class="row ">
            </div>
        
                <div class="card">
                  <div class="card-header">
                    <h4>All Organizers</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th scope="col">Profile Picture</th>
                            <th scope="col">Org Name</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Refferal Code</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                      $sql = "SELECT * FROM seller ORDER BY id DESC";
                      $result = mysqli_query($con,$sql);
                      $i=1;
                      while ($row=mysqli_fetch_array($result)){
                      ?>
                          <tr>
                            <td><?= $i ?></td>
                            <td><img width="50px" height="50px" src="../seller/assets/uploads/org-image/<?= $row['profile'] ?>"></td>
                            <td><a href="../about-org.php?name=<?= $row['id'] ?>" target="_blank"><?= $row['orgName'] ?></a></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['mobile'] ?></td>
                            <td><?= $row['refferalCode'] ?></td>
                            <td><?= date('d-M-Y', strtotime($row['date'])) ?></td>
                          </tr>
                      <?php $i=$i+1; } ?>
                        </tbody>
                        
                      </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <nav class="d-inline-block">
                      <ul class="pagination mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span
                              class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>

      </div>
<?php include('includes/footer.php'); ?>