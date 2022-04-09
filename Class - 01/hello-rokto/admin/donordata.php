<?php

require('../connection.php'); //!Database Connection

if (isset($_POST['insert_donor'])) { //!Create Method
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
    echo '<script>
alert("Please input all the fields!")
</script>';
  }

  if (isset($create_donor_query)) {
  } else {
    echo '<script>
alert("Sorry, Your Request Failed!")
</script>';
  }
}



if (isset($_GET['delete'])) { //!Delete Method
  $donor_id = $_GET['delete'];
  $query = "DELETE FROM blood_donor_list WHERE donor_id={$donor_id}";
  $delquery = mysqli_query($conn, $query);

  if ($delquery) {
  } else {
    echo "Data Delete Failed!";
  }
}






?>


<?php require('header.php'); ?> //! Header

<div id="layoutSidenav">

  <?php require('sidebar.php'); ?> //! Sidebar

  <div id="layoutSidenav_content">
    <main>
      <div class="container pt-5">
        <div class="row">
          <div class="col-md-12 card">
            <div>
              <div class="head-title">
                <h4 class="text-center pt-3">রক্তাদানে আগ্রহীদের তালিকা</h4>
                <hr>
              </div>
              <div class="col-md-3 m-auto add-new-button">
                <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#addModal">
                  <i class="fas fa-plus"></i> নতুন তথ্য যোগ করুন
                </a>
              </div>

              <div class="container update_bar p-3">
                <div class="row">

                  <form action="" method="POST" class="d-flex justify-content-around">
                    <?php
                    if (isset($_GET['update'])) {
                      $donor_id = $_GET['update'];
                      $query = "SELECT * FROM blood_donor_list WHERE donor_id = {$donor_id}";
                      $get_donor_data = mysqli_query($conn, $query);
                      while ($donor_data = mysqli_fetch_assoc($get_donor_data)) {
                        $donor_name = $donor_data['donor_name'];
                        $donor_age = $donor_data['donor_age'];
                        $donor_blood_group = $donor_data['donor_blood_group'];
                        $donor_address = $donor_data['donor_address'];
                        $donor_mobile_no = $donor_data['donor_mobile_no'];
                        $last_donation_date = $donor_data['last_donation_date'];

                        echo "<style>.add-new-button{display:none;}</style>"

                    ?>

                        <div class="col-lg-3">

                          <label for="donor_name"> Name
                            <input class="form-control" type="text" name="donor_name" value="<?php echo $donor_name; ?>">
                          </label>

                          <label for="donor_age"> Age
                            <input class="form-control" type="text" name="donor_age" value="<?php echo $donor_age; ?>">
                          </label>

                        </div>

                        <div class="col-lg-3">

                          <label for="donor_blood_group"> Blood Group
                            <input class="form-control" type="text" name="donor_blood_group" value="<?php echo $donor_blood_group; ?>">
                          </label>

                          <label for="donor_address"> Address
                            <input class="form-control" type="address" name="donor_address" value="<?php echo $donor_address; ?>">
                          </label>

                        </div>

                        <div class="col-lg-3">
                          <label for="donor_mobile_no"> Mobile No
                            <input class="form-control" type="number" name="donor_mobile_no" value="<?php echo $donor_mobile_no; ?>">
                          </label>

                          <label for="last_donation_date"> Last Donation Date
                            <input class="form-control" type="text" name="last_donation_date" value="<?php echo $last_donation_date; ?>">
                          </label>


                        </div>

                        <div class="col-lg-2 m-auto ">
                          <input type="submit" value="update" name="update_btn" class="btn btn-success btn-block mt-3">
                          </input>
                        </div>

                    <?php }
                    } ?>

                    <?php

                    if (isset($_POST['update_btn'])) { //!Update Method
                      $donor_name = $_POST['donor_name'];
                      $donor_age = $_POST['donor_age'];
                      $donor_blood_group = $_POST['donor_blood_group'];
                      $donor_address = $_POST['donor_address'];
                      $donor_mobile_no = $_POST['donor_mobile_no'];
                      $last_donation_date = $_POST['last_donation_date'];


                      $query = "UPDATE blood_donor_list SET donor_name = '$donor_name', donor_age = '$donor_age', donor_blood_group = '$donor_blood_group', donor_address = '$donor_address', donor_mobile_no = '$donor_mobile_no', last_donation_date='$last_donation_date' WHERE donor_id = $donor_id";

                      $update_query = mysqli_query($conn, $query);

                      if ($update_query) {
                        echo "<style>.update_bar{display:none;}</style>";
                      } else {
                        echo "Not Updated";
                      }
                    }

                    ?>




                  </form>
                </div>


              </div>

              <br>
              <table class="table table-striped table-sm">
                <thead class="bg-danger text-white">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Blood Group</th>
                    <th>Address</th>
                    <th>Mobile Number</th>
                    <th>Last Donation Date</th>
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
                          <button type="button" name="viewBtn" id="viewBtn" class="btn btn-info viewBtn m-0"> <i class="fas fa-eye"></i></button>
                        </td>
                        <td>
                          <a href="donordata.php?update=<?php echo $row['donor_id']; ?>" type="button" class="btn btn-danger updateBtn m-0"> <i class="fas fa-edit"></i> </a>
                        </td>
                        <td>
                          <a href="donordata.php?delete=<?php echo $row['donor_id']; ?>" type="button" class="btn btn-danger deleteBtn m-0"> <i class="fas fa-trash-alt"></i> </a>
                        </td>
                      </tr>
                  <?php
                    }
                  } else {
                    echo "<script> alert('No Record Found');</script>";
                  }
                  ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


      <!-- MODALS -->

      <!-- Add Data Modal -->
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
              <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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

      <!-- View Modal -->
      <div class="modal fade" id="viewModal">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header bg-info text-white">
              <h5 class="modal-title">View Request</h5>
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
                  <div id="donor_name"></div>
                </div>
                <div class="col-sm-5 col-xs-6 tital ">
                  <strong>Age:</strong>
                </div>
                <div class="col-sm-7 col-xs-6 ">
                  <div id="donor_age"></div>
                </div>
                <div class="col-sm-5 col-xs-6 tital ">
                  <strong>Blood Group:</strong>
                </div>
                <div class="col-sm-7 col-xs-6 ">
                  <div id="donor_blood_group"></div>
                </div>
                <div class="col-sm-5 col-xs-6 tital ">
                  <strong>Address:</strong>
                </div>
                <div class="col-sm-7 col-xs-6 ">
                  <div id="donor_address"></div>
                </div>
                <div class="col-sm-5 col-xs-6 tital ">
                  <strong>Mobile Number:</strong>
                </div>
                <div class="col-sm-7 col-xs-6 ">
                  <div id="donor_mobile_no"></div>
                </div>
                <div class="col-sm-5 col-xs-6 tital ">
                  <strong>Last Donation Date:</strong>
                </div>
                <div class="col-sm-7 col-xs-6 ">
                  <div id="last_donation_date"></div>
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

      <!-- View Script -->
      <script>
        $(document).ready(function() {
          $('.viewBtn').on('click', function() {

            $('#viewModal').modal('show');

            // Get the table row data.
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
              return $(this).text();
            }).get();

            $('#donor_name').text(data[1]);
            $('#donor_age').text(data[2]);
            $('#donor_blood_group').text(data[3]);
            $('#donor_address').text(data[4]);
            $('#donor_mobile_no').text(data[5]);
            $('#last_donation_date').text(data[6]);

          });

        });
      </script>








      <?php require('footer.php'); ?>