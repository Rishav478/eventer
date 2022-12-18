<?php 
include('includes/autoload.php');
include('includes/securePayment.php');


require('includes/login_auth.php'); 
$_SESSION['LAST_ACTIVE_LOGIN'] = time();
$id = $_SESSION['id'];
$LAST_LOGIN = $_SESSION['LAST_ACTIVE_LOGIN'];

$name = $_SESSION['name'];
$mobile = $_SESSION['mobile'];

?>
      <!-- Main Content -->
      <div class="main-content">
        
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create New Promotions</h4>
                  </div>
                  <div class="card-body">
                        <form method="POST" action="checkout.php">
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Promotion Name</label>
                            <div class="col-sm-12 col-md-7">
                              <input type="text" name="promotion-name" class="form-control" required>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Promotion Type</label>
                            <div class="col-sm-12 col-md-7">
                              <label class="custom-switch">
                                <input type="radio" onclick="javascript:Check();" name="event-category" id="event-category-paid" value="banner" class="custom-switch-input" required>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Banner <span title="Banner promotion will be displayed at the top slider banner on home page " style="font-weight: bold; font-size: 20px">&nbsp;&#8520;</span></span>
                              </label>
                              <label class="custom-switch">
                                <input type="radio" onclick="javascript:Check();" name="event-category" id="event-category-free" value="feature_post" class="custom-switch-input" required>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Feature Post <span title="Feature post promotion will be displayed at the feature section on home page " style="font-weight: bold; font-size: 20px;">&nbsp;&#8520;</span></span>
                              </label>
                            </div>
                          </div>
                          <div class="form-group row mb-4" id="banner" style="visibility:hidden">
                            <label class="col-form-label text-md-right col-7 col-md-3 col-lg-3">Event Banner</label>
                            <div class="col-sm-12 col-md-7">
                              <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label" style="color: black;">Choose Promotion Banner</label>
                                <input type="file" name="banner" id="image-upload" required/>
                              </div>
                              <p class="text-danger">Image must be less then 5 mb..!</p>
                            </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-7 col-md-3 col-lg-3">Select Promotional Event</label>
                              <div class="col-sm-12 col-md-7">
                                    <select class="form-control" name="promotional-event">
<?php
$fetchEvent = "SELECT * from event where sellerId = '$id' order by event_id desc";
$resEvent = mysqli_query($con,$fetchEvent);
while ($rowsPv = mysqli_fetch_array($resEvent)) {
?>
                                          <option value="<?= $rowsPv['paralLink'] ?>"><?= $rowsPv['event_name'] ?></option>
<?php } ?>
                                    </select>
                              </div>
                          </div>
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-7 col-md-3 col-lg-3">Select Promotional Pakage</label>
                              <div class="col-sm-12 col-md-7">
                                    <select id="pakage" class="form-control" name="promotional-pakage" onchange="pakages()">
                                          <option value="7">7 Days - ₹149</option>
                                          <option value="14">14 Days - ₹199</option>
                                          <option value="28">28 Days - ₹299</option>
                                    </select>
                              </div>
                          </div>
                          <input type="hidden" name="orderId"value="<?= orderIds ?>" readonly />
                          <input type="hidden" id="orderAmount" name="orderAmount" value="0" readonly />
                          <input type="text" name="appId" value="<?= appId ?>" readonly />
                          <input type="hidden" name="customerName" value="<?= $name ?>" readonly />
                          <input type="hidden" name="customerEmail" value="<?= $email ?>" readonly />
                          <input type="hidden" name="customerPhone" value="<?= $mobile ?>" readonly />
                          <input type="hidden" name="returnUrl" value="<?= returnUrl ?>" readonly />
                          <input type="hidden" class="form-control" name="orderNote" value="<?= $id ?>" placeholder="User Id" readonly />
                          <input type="hidden" class="form-control" name="orderCurrency" value="INR" placeholder="Enter Currency here (Ex. INR)" readonly />
                          <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                              <button class="btn btn-primary" id="pay" name="referral-publish">Proced to Pay</button>
                            </div>
                          </div>
                        </form>
                  </div>
                </div>
              </div>
            </div>

      </div>
<script type="text/javascript">
function Check() {
    if (document.getElementById('event-category-paid').checked) {
        document.getElementById('banner').style.visibility  = 'visible';
    }
    else document.getElementById('banner').style.visibility = 'hidden';

}
document.getElementById('pay').innerHTML ="Proced to Pay ₹149";
document.getElementById('orderAmount').value =149;
function pakages(){
      var pakage = parseInt(document.getElementById('pakage').value);

      if (pakage == 7) {
            document.getElementById('pay').innerHTML ="Proced to Pay ₹149";
            document.getElementById('orderAmount').value =149;
      } else if (pakage == 14) {
            document.getElementById('pay').innerHTML ="Proced to Pay ₹199";
            document.getElementById('orderAmount').value =199;
      } else if (pakage == 28){
            document.getElementById('pay').innerHTML ="Proced to Pay ₹299";
            document.getElementById('orderAmount').value =299;
      } else {
            document.getElementById('pay').innerHTML ="Proced to Pay ₹149";
            document.getElementById('orderAmount').value =149;
      }
}

</script>
<?php include('includes/footer.php'); ?>