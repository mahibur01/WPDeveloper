<?php

require('../connection.php'); //!Database Connection

//! Create User Request
if (isset($_POST['insert_data'])) {
  $request_name = $_POST['request_name'];
  $user_age = $_POST['user_age'];
  $user_blood_group = $_POST['user_blood_group'];
  $user_address = $_POST['user_address'];
  $user_mobile_no = $_POST['user_mobile_no'];
  $user_email = $_POST['user_email'];
  $donation_date = $_POST['donation_date'];
  $donation_time = $_POST['donation_time'];
  $user_message = $_POST['user_message'];


  if (!empty($request_name) && !empty($user_message)) {
    $query = "INSERT INTO blood_donate_request (request_name, user_age, user_blood_group, user_address,user_mobile_no, user_email, donation_date, donation_time, user_message) VALUE ('$request_name', '$user_age', '$user_blood_group', '$user_address', '$user_mobile_no', '$user_email', '$donation_date', '$donation_time', '$user_message')";

    $create_query = mysqli_query($conn, $query);
  } else {
    echo '<script>alert("Please input all the fields!")</script>';
  }

  if (isset($create_query)) {
    // echo '<script>alert("Your Request Submitted")</script>';
  } else {
    echo '<script>alert("Sorry, Your Request Failed!")</script>';
  }
}

if (isset($_GET['delete'])) { //!Delete Method
  $request_id = $_GET['delete'];
  $query = "DELETE FROM blood_donate_request WHERE request_id={$request_id}";
  $delquery = mysqli_query($conn, $query);

  if ($delquery) {
    header("Location: ./requestdata.php");
  } else {
    echo "Data Delete Failed!";
  }
}








?>



<?php require('header.php'); ?>

<div id="layoutSidenav">
  <?php require('sidebar.php'); ?>

  <div id="layoutSidenav_content">
    <main>
      <div class="container pt-5">
        <div class="row">
          <div class="col-md-12 card">
            <div>
              <div class="head-title">
                <h4 class="text-center pt-3">রক্তের জন্য আবেদনগুলি</h4>
                <hr>
              </div>
              <div class="col-md-3 m-auto add-new-button">
                <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#addModal">
                  <i class="fas fa-plus"></i> নতুন আবেদন করুন
                </a>
              </div>
              <br>

              <div class="container update_bar p-3">
                <div class="row">

                  <form action="" method="POST" class="d-flex justify-content-around">
                    <?php
                    if (isset($_GET['update'])) {
                      $request_id = $_GET['update'];
                      $query = "SELECT * FROM blood_donate_request WHERE request_id = {$request_id}";
                      $get_user_data = mysqli_query($conn, $query);
                      while ($user_data = mysqli_fetch_assoc($get_user_data)) {
                        $request_name = $user_data['request_name'];
                        $user_age = $user_data['user_age'];
                        $user_blood_group = $user_data['user_blood_group'];
                        $user_address = $user_data['user_address'];
                        $user_mobile_no = $user_data['user_mobile_no'];
                        $donation_date = $user_data['donation_date'];
                        $donation_time = $user_data['donation_time'];
                        $user_message = $user_data['user_message'];

                        echo "<style>.add-new-button{display:none;}</style>"

                    ?>

                        <div class="col-lg-3">

                          <label for="request_name"> Name
                            <input class="form-control" type="text" name="request_name" value="<?php echo $request_name; ?>">
                          </label>

                          <label for="user_age"> Age
                            <input class="form-control" type="text" name="user_age" value="<?php echo $user_age; ?>">
                          </label>

                          <label for="user_blood_group"> Blood Group
                            <input class="form-control" type="text" name="user_blood_group" value="<?php echo $user_blood_group; ?>">
                          </label>


                        </div>

                        <div class="col-lg-3">


                          <label for="user_address"> Address
                            <input class="form-control" type="address" name="user_address" value="<?php echo $user_address; ?>">
                          </label>

                          <label for="user_mobile_no"> Mobile No
                            <input class="form-control" type="number" name="user_mobile_no" value="<?php echo $user_mobile_no; ?>">
                          </label>

                          <label for="donation_date"> Last Donation Date
                            <input class="form-control" type="text" name="donation_date" value="<?php echo $donation_date; ?>">
                          </label>

                        </div>

                        <div class="col-lg-3">

                          <label for="donation_time"> Last Donation Date
                            <input class="form-control" type="text" name="donation_time" value="<?php echo $donation_time; ?>">
                          </label>

                          <label for="user_message"> Last Donation Date
                            <input class="form-control" type="text" name="user_message" value="<?php echo $user_message; ?>">
                          </label>


                          <div class="m-auto ">
                            <input type="submit" value="update" name="update_btn" class="btn btn-success btn-block mt-3">
                            </input>
                          </div>

                        </div>


                    <?php }
                    } ?>

                    <?php
                    if (isset($_POST['update_btn'])) { //!Update Method
                      $request_name = $_POST['request_name'];
                      $user_age = $_POST['user_age'];
                      $user_blood_group = $_POST['user_blood_group'];
                      $user_address = $_POST['user_address'];
                      $user_mobile_no = $_POST['user_mobile_no'];
                      $user_email = $_POST['user_email'];
                      $donation_date = $_POST['donation_date'];
                      $donation_time = $_POST['donation_time'];
                      $user_message = $_POST['user_message'];

                      if (!empty($request_name) && !empty($user_message)) {


                        $query = "UPDATE blood_donate_request SET 
    request_name = '$request_name', 
    user_age = '$user_age', 
    user_blood_group = '$user_blood_group', 
    user_address = '$user_address', 
    user_mobile_no = '$user_mobile_no', 
    donation_date='$donation_date', 
    donation_time='$donation_time',
    user_message='$user_message' WHERE request_id = $request_id";
                      }

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

              <table class="table table-striped table-sm ">
                <thead class="bg-danger text-white">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Blood Group</th>
                    <th>Address</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Donation Date</th>
                    <th>Donation Time</th>
                    <th>Message</th>
                    <th>View</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>

                  <!-- Donation Request View -->
                  <?php
                  $sql = "SELECT * FROM blood_donate_request";
                  $result = mysqli_query($conn, $sql);

                  if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                      <tr>
                        <td><?php echo $row['request_id']; ?></td>
                        <td><?php echo $row['request_name']; ?></td>
                        <td><?php echo $row['user_age']; ?></td>
                        <td><?php echo $row['user_blood_group']; ?></td>
                        <td><?php echo $row['user_address']; ?></td>
                        <td><?php echo $row['user_mobile_no']; ?></td>
                        <td><?php echo $row['user_email']; ?></td>
                        <td><?php echo $row['donation_date']; ?></td>
                        <td><?php echo $row['donation_time']; ?></td>
                        <td><?php echo $row['user_message']; ?></td>
                        <td>
                          <button type="button" class="btn btn-info viewBtn m-0"> <i class="fas fa-eye"></i> </button>
                        </td>
                        <td>
                          <a href="requestdata.php?update=<?php echo $row['request_id']; ?>" type="button" class="btn btn-warning updateBtn m-0"> <i class="fas fa-edit"></i> </a>
                        </td>
                        <td>
                          <a href="requestdata.php?delete=<?php echo $row['request_id']; ?>" type="button" class="btn btn-danger deleteBtn m-0"> <i class="fas fa-trash-alt"></i> </a>
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
              <form method="POST">
                <div class="form-group">
                  <label for="title">আপনার নাম</label>
                  <input type="text" name="request_name" class="form-control" placeholder="আপনার নাম লিখুন">
                </div>
                <div class="form-group">
                  <label for="title">বয়স</label>
                  <input type="number" name="user_age" class="form-control" placeholder="আপনার বয়স">
                </div>
                <div class="form-group">
                  <label for="title">রক্তের গ্রুপ</label>
                  <input type="text" name="user_blood_group" class="form-control" placeholder="আপনার রক্তের গ্রুপ">
                </div>
                <div class="form-group">
                  <label for="title">ঠিকানা</label>
                  <input type="text" name="user_address" class="form-control" placeholder="আপনার বর্তমান ঠিকানা">
                </div>
                <div class="form-group">
                  <label for="title">মোবাইল নাম্বার</label>
                  <input type="number" name="user_mobile_no" class="form-control" placeholder="আপনার মোবাইল নাম্বার">
                </div>
                <div class="form-group">
                  <label for="title">ইমেইল</label>
                  <input type="email" name="user_email" class="form-control" placeholder="আপনার ইমেইল">
                </div>
                <div class="form-group">
                  <label for="title">কবে রক্ত লাগবে?</label>
                  <input type="date" name="donation_date" class="form-control" placeholder="তারিখ লিখুন">
                </div>

                <div class="form-group">
                  <label for="title">কখন রক্ত লাগবে?</label>
                  <input type="time" name="donation_time" class="form-control" placeholder="সময় লিখুন">
                </div>


                <div class="form-group">
                  <label for="title">ম্যাসেজ</label>
                  <input type="text" name="user_message" class="form-control" placeholder="লিখুন">
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-danger" name="insert_data">জমা দিন</button>
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


      <?php require('footer.php'); ?>