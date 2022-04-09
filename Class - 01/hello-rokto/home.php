<?php

require('connection.php');

//! Create Donor Request
if (isset($_POST['insert_donor'])) {
  $donor_name = $_POST['donor_name'];
  $donor_age = $_POST['donor_age'];
  $donor_blood_group = $_POST['donor_blood_group'];
  $donor_address = $_POST['donor_address'];
  $donor_mobile_no = $_POST['donor_mobile_no'];
  $last_donation_date = $_POST['last_donation_date'];


  if (!empty($donor_name) && !empty($last_donation_date)) {
    $query = "INSERT INTO blood_donor_list (donor_name, donor_age, donor_blood_group, donor_address,donor_mobile_no, last_donation_date) VALUE ('$donor_name', '$donor_age', '$donor_blood_group', '$donor_address', '$donor_mobile_no', '$last_donation_date')";
    $create_donor_query = mysqli_query($conn, $query);
  } else {
    echo '<script>alert("Please input all the fields!")</script>';
  }

  if (isset($create_donor_query)) {
    echo '<script>alert("Your Request Submitted")</script>';
  } else {
    echo '<script>alert("Sorry, Your Request Failed!")</script>';
  }
}

?>

<?php require('header.php'); ?>

<br><br><br>

<div class="container">
  <div class="row">
    <div class="col-md-12 card">
      <div>
        <div class="head-title">
          <h4 class="text-center">রক্ত দিতে নিচের ফর্ম পূরণ করুন আপনার সঠিক তথ্য দিয়ে</h4>
          <hr>
        </div>
        <div class="col-md-3 m-auto add-new-button">
          <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#addModal">
            <i class="fas fa-plus"></i> তথ্য দিন
          </a>
        </div>
        <br>
        <!-- <table class="table table-striped">
          <thead class="bg-danger text-white">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Age</th>
              <th>Blood Group</th>
              <th>Address</th>
              <th>Mobile Number</th>
              <th>Lat Donation Date</th>
              <th>View</th>
              <th>Update</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>

            <?php

            $sql = "SELECT * FROM blood_donor_list";
            $result = mysqli_query($conn, $sql);

            if ($result) {
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                  <td><?php echo $row['donor_id']; ?></td>
                  <td><?php echo $row['donor_name']; ?></td>
                  <td><?php echo $row['donor_age']; ?></td>
                  <td><?php echo $row['donor_blood_group']; ?></td>
                  <td><?php echo $row['donor_address']; ?></td>
                  <td><?php echo $row['donor_mobile_no']; ?></td>
                  <td><?php echo $row['last_donation_date']; ?></td>
                  <td>
                    <button type="button" class="btn btn-info viewBtn"> <i class="fas fa-eye"></i> View </button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-warning updateBtn"> <i class="fas fa-edit"></i> Update </button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-danger deleteBtn"> <i class="fas fa-trash-alt"></i> Delete </button>
                  </td>
                </tr>
            <?php
              }
            } else {
              echo "<script> alert('No Record Found');</script>";
            }
            ?>
          </tbody>
        </table> -->
      </div>
    </div>
  </div>
</div>

<!-- MODALS -->

<!-- ADD RECORD MODAL -->
<div class="modal fade" id="addModal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title">ফর্ম পূরণ করুন</h5>
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="form-group">
            <label for="title">আপনার নাম</label>
            <input type="text" name="donor_name" class="form-control" placeholder="আপনার নাম লিখুন" maxlength="50" required>
          </div>
          <div class="form-group">
            <label for="title">বয়স</label>
            <input type="number" name="donor_age" class="form-control" placeholder="আপনার বয়স" maxlength="50" required>
          </div>
          <div class="form-group">
            <label for="title">রক্তের গ্রুপ</label>
            <input type="text" name="donor_blood_group" class="form-control" placeholder="আপনার রক্তের গ্রুপ" maxlength="50" required>
          </div>
          <div class="form-group">
            <label for="title">ঠিকানা</label>
            <input type="text" name="donor_address" class="form-control" placeholder="আপনার বর্তমান ঠিকানা" maxlength="50" required>
          </div>
          <div class="form-group">
            <label for="title">মোবাইল নাম্বার</label>
            <input type="number" name="donor_mobile_no" class="form-control" placeholder="আপনার মোবাইল নাম্বার" maxlength="50" required>
          </div>
          <div class="form-group">
            <label for="title">শেষ কবে রক্ত দিয়েছেন?</label>
            <input type="date" name="last_donation_date" class="form-control" placeholder="যদি রক্ত দিয়ে থাকেন, তাহলে সর্বশেষ কবে দিয়েছেন? না দিয়ে থাকলে ফাঁকা রাখুন" maxlength="50">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" name="insert_donor">জমা দিন</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- VIEW MODAL -->
<div class="modal fade" id="viewModal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header bg-info text-white">
        <h5 class="modal-title">View Record Information</h5>
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-5 col-xs-6 tital ">
            <strong>Name:</strong>
          </div>
          <div class="col-sm-7 col-xs-6 ">
            <div id="viewname"></div>
          </div>
          <div class="col-sm-5 col-xs-6 tital ">
            <strong>Age:</strong>
          </div>
          <div class="col-sm-7 col-xs-6 ">
            <div id="viewage"></div>
          </div>
          <div class="col-sm-5 col-xs-6 tital ">
            <strong>Blood Group:</strong>
          </div>
          <div class="col-sm-7 col-xs-6 ">
            <div id="viewbloodgroup"></div>
          </div>
          <div class="col-sm-5 col-xs-6 tital ">
            <strong>Address:</strong>
          </div>
          <div class="col-sm-7 col-xs-6 ">
            <div id="viewaddress"></div>
          </div>
          <div class="col-sm-5 col-xs-6 tital ">
            <strong>Mobile Number:</strong>
          </div>
          <div class="col-sm-7 col-xs-6 ">
            <div id="viewmobilenumber"></div>
          </div>
          <div class="col-sm-5 col-xs-6 tital ">
            <strong>Last Donation Date:</strong>
          </div>
          <div class="col-sm-7 col-xs-6 ">
            <div id="viewlastdonationdate"></div>
          </div>
          <div class="col-sm-5 col-xs-6 tital ">
            <strong>Join Date:</strong>
          </div>
          <div class="col-sm-7 col-xs-6 ">
            <div id="viewjoindate"></div>
          </div>

        </div>
        <br>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- UPDATE MODAL -->
<div class="modal fade" id="updateModal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title">Edit Record</h5>
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="update.php" method="POST">
          <input type="hidden" name="updateid" id="updateid">
          <div class="form-group">
            <label for="title">Name</label>
            <input type="text" name="updatename" id="updatename" class="form-control" placeholder="Enter Name" maxlength="50" required>
          </div>
          <div class="form-group">
            <label for="title">Age</label>
            <input type="number" name="updateage" id="updateage" class="form-control" placeholder="Enter Age" maxlength="50" required>
          </div>
          <div class="form-group">
            <label for="title">Blood Group</label>
            <input type="text" name="updatebloodgroup" id="updatebloodgroup" class="form-control" placeholder="Enter Your Blood Group" maxlength="50" required>
          </div>
          <div class="form-group">
            <label for="title">Address</label>
            <input type="text" name="updateaddress" id="updateaddress" class="form-control" placeholder="Enter Your Address" maxlength="50" required>
          </div>
          <div class="form-group">
            <label for="title">Mobile Number</label>
            <input type="number" name="updatemobilenumber" id="updatemobilenumber" class="form-control" placeholder="Enter Your Mobile Number" maxlength="50" required>
          </div>
          <div class="form-group">
            <label for="title">Last Donation Date</label>
            <input type="date" name="updatelastdonationdate" id="updatelastdonationdate" class="form-control" placeholder="Enter Last Donation Date" maxlength="50" required>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="updateData">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- DELETE MODAL -->
<div class="modal fade" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="delete.php" method="POST">

        <div class="modal-body">

          <input type="hidden" name="deleteId" id="deleteId">

          <h4>Are you sure want to delete?</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary" name="deleteData">Yes</button>
        </div>

      </form>
    </div>
  </div>
</div>



<script>
  $(document).ready(function() {
    $('.updateBtn').on('click', function() {

      $('#updateModal').modal('show');

      // Get the table row data.
      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      console.log(data);

      $('#updateid').val(data[0]);
      $('#updatename').val(data[1]);
      $('#updateage').val(data[2]);
      $('#updatebloodgroup').val(data[3]);
      $('#updateaddress').val(data[4]);
      $('#updatemobilenumber').val(data[5]);
      $('#updatelastdonationdate').val(data[6]);

    });

  });
</script>

<script>
  $(document).ready(function() {
    $('.viewBtn').on('click', function() {

      $('#viewModal').modal('show');

      // Get the table row data.
      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      console.log(data);

      $('#viewname').text(data[1]);
      $('#viewage').text(data[2]);
      $('#viewbloodgroup').text(data[3]);
      $('#viewaddress').text(data[4]);
      $('#viewmobilenumber').text(data[5]);
      $('#viewlastdonationdate').text(data[6]);
      $('#viewjoindate').text(data[7]);

    });

  });
</script>

<script>
  $(document).ready(function() {
    $('.deleteBtn').on('click', function() {

      $('#deleteModal').modal('show');

      // Get the table row data.
      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      console.log(data);

      $('#deleteid').val(data[0]);

    });

  });
</script>

<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
</body>

</html>