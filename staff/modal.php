<?php
  $connect = mysqli_connect("localhost","root", "", "post_retirement");
  if(isset($_POST["id"])) {
    $id = $_POST['id'];
    $res = mysqli_query($connect, "SELECT * FROM tblpostretirements where id='$id'");
    // while($row=mysqli_fetch_array($res))
    $sqlRow = mysqli_fetch_array($res);
  }
?>

<div class="modal fade details-1" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header"><h4 class="modal-title text-center">Preview of Data </h4></div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">            
            <iframe src="uploads/<?= $sqlRow['File']; ?>" width="100%" height="500px" frameborder="1"></iframe>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button onclick="closeModal()" class="btn btn-danger">Close Details</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function closeModal() {
    $('#details-modal').modal('hide');
    setTimeout(function() {
      $('#details-modal').remove();
      $('.modal-backdrop').remove();
    },500);
  }
</script>

