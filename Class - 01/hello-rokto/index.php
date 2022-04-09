<?php

require('connection.php');

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
        echo '<script>alert("Your Request Submitted")</script>';
    } else {
        echo '<script>alert("Sorry, Your Request Failed!")</script>';
    }
}

?>

<?php require('header.php'); ?>

<div class="card card-image img-fluid" style="background-image: url('assets/images/blooddonate.jpg'); background-size: cover; ">
    <div class="text-white text-center rgba-stylish-strong py-5 px-4">
        <div class="py-5">
            <h4 class="card-title h4 my-4 py-2">এক ফোঁটা রক্ত, একটি জীবন</h4>
            <h1 class="mb-4 pb-2 px-md-5 mx-md-5">আপনার এক ফোঁটা রক্তে বাঁচতে পারে একটি জীবন!<br>রক্ত দিন, জীবন বাঁচান</h1>
            <a href="home.php" class="btn btn-danger">রক্ত দিন<i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</div>

<div class="container-fluid" id="container">
    <div class="card text-center" id="prompt">
        <div class="card-body">
            <h4 class="card-title"><strong>রক্ত লাগবে?</strong></h4>
            <p class="card-text">আমরা 'হ্যালো রক্ত' পরিবার বিনামূল্যে রক্তদান করে থাকি। জরুরী প্রয়োজনে রক্ত দরকার হলে আমাদের সাথে যোগাযোগ করুন।</p>
            <a href="#abedon" class="btn btn-green">রক্ত নিন<i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</div>


<div class="container-fluid" id="container2">

    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h3 class="display-4">আমাদের কার্যক্রম</h3>
            <hr class="dots">
            <p class="lead">একটি প্রাণ বাঁচাতে পারাটাই আমাদের সাফল্য, আমরা প্রতিনিয়ত চেষ্টা করি কোনো প্রাণ যেন রক্তের অভাবে মারা না যায়!</p>
        </div>
    </div>

    <div class="container-fluid mb-5">
        <div class="card-deck">

            <div class="card mb-3">

                <div class="view overlay">
                    <img class="card-img-top" src="assets/images/photo1.jpg" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <div class="card-body">
                    <h4 class="card-title">ব্লাড ডোনেশন ক্যাম্পিং</h4>
                    <p class="card-text">স্কুল/কলেজে আমাদের ক্যাম্পিং এবং রক্তদান কর্মসূচি । ২০১৯</p>
                </div>

            </div>

            <div class="card mb-3">

                <div class="view overlay">
                    <img class="card-img-top" src="assets/images/photo2.jpg" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <div class="card-body">
                    <h4 class="card-title">র‍্যালি এবং সভা</h4>
                    <p class="card-text">জাতীয় রক্তদান দিবসে র‍্যালি এবং সভা অনুষ্ঠিত হয়েছিলো ২০২০ সালের মে মাসে।</p>
                </div>

            </div>

            <div class="card mb-3">

                <div class="view overlay">
                    <img class="card-img-top" src="assets/images/photo2.jpg" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <div class="card-body">
                    <h4 class="card-title">বিশ্ব রক্তদান দিবসে বিশেষ র‍্যালী</h4>
                    <p class="card-text">বিশ্ব রক্তদান দিবস উপলক্ষে বিশেষ র‍্যালীর আয়োজন করা হয়।</p>
                </div>

            </div>

            <div class="card mb-3">

                <div class="view overlay">
                    <img class="card-img-top" src="assets/images/photo4.jpg" alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

                <div class="card-body">
                    <h4 class="card-title">রক্তদান কর্মসূচী</h4>
                    <p class="card-text">ঢাকা ইউনিভার্সিটি তে সফল ভাবে সম্পন্ন হলো 'হ্যালো রক্ত' এর রক্তদান কর্মসূচী।</p>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid mb-5">
    <div class="row">

        <div class="col-sm-6 col-md-8 m-auto" id="abedon">
            <div class="card">
                <h5 class="card-header danger-color white-text text-center py-4">
                    <strong>রক্তের জন্য আবেদন করুন</strong>
                </h5>
                <div class="card-body px-lg-5 pt-0">

                    <form class="text-center" style="color: #757575;" method="POST">
                        <div class="form-row">
                            <div class="col">
                                <div class="md-form">
                                    <input type="text" id="request_name" name="request_name" class="form-control">
                                    <label for="request_name">আপনার নাম</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="md-form">
                                    <input type="number" id="user_age" name="user_age" class="form-control">
                                    <label for="user_age">বয়স</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="md-form">
                                    <input type="text" id="user_blood_group" name="user_blood_group" class="form-control">
                                    <label for="user_blood_group">রক্তের গ্রুপ</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="md-form">
                                    <input type="text" id="user_address" name="user_address" class="form-control">
                                    <label for="user_address">রক্তদানের ঠিকানা</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="md-form">
                                    <input type="number" id="user_mobile_no" name="user_mobile_no" class="form-control">
                                    <label for="user_mobile_no">মোবাইল নাম্বার</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="md-form">
                                    <input type="email" id="user_email" name="user_email" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
                                    <label for="user_email">ই-মেইল</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="md-form">
                                    <input type="date" id="donation_date" name="donation_date" class="form-control">
                                    <label for="donation_date">রক্তদানের তারিখ</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="md-form">
                                    <input type="time" id="donation_time" name="donation_time" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock">
                                    <label for="donation_time">রক্তাদানের সময়</label>
                                </div>
                            </div>
                        </div>

                        <div class="md-form">
                            <textarea id="user_message" name="user_message" class="form-control md-textarea" rows="3"></textarea>
                            <label for="user_message">কিছু বলার থাকলে লিখুন</label>
                        </div>

                        <button type="submit" class="btn btn-danger btn-rounded btn-block my-4 waves-effect z-depth-0" name="insert_data">আবেদন করুন</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

<?php include_once('footer.php'); ?>