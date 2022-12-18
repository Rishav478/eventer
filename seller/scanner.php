<?php 
include('includes/autoload.php'); 


require('includes/login_auth.php'); 
$_SESSION['LAST_ACTIVE_LOGIN'] = time();
$id = $_SESSION['id'];
$sellerName = $_SESSION['name'];
$LAST_LOGIN = $_SESSION['LAST_ACTIVE_LOGIN'];

?>
<script src="ht.js"></script>
<style>
  .result{
    background-color: green;
    color:#fff;
    padding:20px;
  }
</style>
<div class="main-content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Scan Ticket</h4>
                 </div>
                <div class="">
                    <div class="col">
                        <center><div style="width:280px;" id="reader"></div></center>
                    </div>
                    <audio id="myAudio1">
                        <source src="success.mp3" type="audio/ogg">
                    </audio>
                    <audio id="myAudio2">
                      <source src="failes.mp3" type="audio/ogg">
                    </audio>
                    <script>
                        var x = document.getElementById("myAudio1");
                        var x2 = document.getElementById("myAudio2");      
                        function showHint(str) {
                          if (str.length == 0) {
                            document.getElementById("txtHint").innerHTML = "";
                            return;
                          } else {
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function() {
                              if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("txtHint").innerHTML = this.responseText;
                              }
                            };
                            xmlhttp.open("GET", "gethint.php?q=" + str, true);
                            xmlhttp.send();
                          }
                        }
                    
                        function playAudio() { 
                          x.play(); 
                        } 
                    
                    
                    </script>
                    <div class="col" style="padding:30px;">
                        <h4>SCAN RESULT</h4>
                        <div hidden>Employee name</div>
                        <form action="">
                            <input hidden type="text" name="start" class="input" id="result" onkeyup="showHint(this.value)" placeholder="result here" readonly="" />
                        </form>
                        <p>Status: <span id="txtHint"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<script type="text/javascript">
    function onScanSuccess(qrCodeMessage) {
        document.getElementById("result").value = qrCodeMessage;
        showHint(qrCodeMessage);
        setTimeout(function(){document.getElementById('classname').style.display='none';},5000);
    playAudio();

    }
    function onScanError(errorMessage) {
      //handle scan error
    }
    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess, onScanError);

</script>


</script>
<?php include('includes/model.php'); ?>
      <footer class="main-footer">
        <div class="footer-left">
          <i class="fas fa-copyright"></i> Copyright | Eventer
        </div>
        <div class="footer-right">
          All Right Reserve
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/summernote/summernote-bs4.js"></script>
  <script src="assets/bundles/codemirror/lib/codemirror.js"></script>
  <script src="assets/bundles/codemirror/mode/javascript/javascript.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="assets/bundles/ckeditor/ckeditor.js"></script>
    <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="assets/js/page/forms-advanced-forms.js"></script>
    <script src="assets/bundles/cleave-js/dist/cleave.min.js"></script>
  <script src="assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>

  <script src="assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <script src="assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
  <script src="assets/js/page/create-post.js"></script>
  <script src="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/ckeditor.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- forms-editor.html  21 Nov 2019 03:55:16 GMT -->
</html>