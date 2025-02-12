<?php
$firstErr = $lastErr = $userErr = $passErr = $conpassErr = $emailErr = $mobileErr = $genderErr = $dateErr = $courseErr = $nationErr =  "";
$first_name = $last_name = $user_name = $password = $confirm_password = $email = $mobile = $gender = $dob = $course = $nationality = "";
$success = false; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["first_name"])) {
        $firstErr = "First Name is required";
    } else {
        $first_name = test_input($_POST["first_name"]);
    }

    if (empty($_POST["last_name"])) {
        $lastErr = "Last Name is required";
    } else {
        $last_name = test_input($_POST["last_name"]);
    }

    if (empty($_POST["user_name"])) {
        $userErr = "User Name is required";
    } else {
        $user_name = test_input($_POST["user_name"]);
    }

    if (empty($_POST["password"])) {
        $passErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
    }

    if (empty($_POST["confirm_password"])) {
        $conpassErr = "Confirm Password is required";
    } else {
        $confirm_password = test_input($_POST["confirm_password"]);
        if ($confirm_password !== $password) {
            $conpassErr = "Passwords do not match";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["mobile"])) {
        $mobileErr = "Mobile is required";
    } else {
        $mobile = test_input($_POST["mobile"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if (empty($_POST["dob"])) {
        $dateErr = "Date of Birth is required";
    } else {
        $dob = test_input($_POST["dob"]);
    }

    if (empty($_POST["course"])) {
        $courseErr = "Course selection is required";
    } else {
        $course = test_input($_POST["course"]);
    }

    if (empty($_POST["nationality"])) {
        $nationErr = "Nationality is required";
    } else {
        $nationality = test_input($_POST["nationality"]);
    }
    if (empty($firstErr) && empty($lastErr) && empty($userErr) && empty($passErr) && empty($conpassErr) && empty($emailErr) && empty($mobileErr) && empty($genderErr) && empty($dateErr) && empty($courseErr) && empty($nationErr) && empty($profileErr)) {
        $success = true;
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="custom.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="form-container">
            <h3>Registration Form</h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                <label>First Name: </label>
                <input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>">
                <span style="color: #FF0000;">*<?php echo $firstErr;?></span><br>

                <label>Last Name: </label>
                <input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>">
                <span style="color: #FF0000;">*<?php echo $lastErr;?></span><br>

                <label>User Name: </label>
                <input type="text" name="user_name" value="<?php echo htmlspecialchars($user_name); ?>">
                <span style="color: #FF0000;">*<?php echo $userErr;?></span><br>

                <label>Password: </label>
                <input type="password" name="password">
                <span style="color: #FF0000;">*<?php echo $passErr;?></span><br>

                <label>Confirm Password: </label>
                <input type="password" name="confirm_password">
                <span style="color: #FF0000;">*<?php echo $conpassErr;?></span><br>

                <label>Email: </label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                <span style="color: #FF0000;">*<?php echo $emailErr;?></span><br>

                <label>Mobile: </label>
                <input type="tel" name="mobile" value="<?php echo htmlspecialchars($mobile); ?>">
                <span style="color: #FF0000;">*<?php echo $mobileErr;?></span><br>

                <label>Gender: </label>
                <span style="color: #FF0000;">*<?php echo $genderErr;?></span>
                <input type="radio" value="Male" name="gender" <?php if(isset($gender) && $gender=="Male") echo "checked"; ?>><label>Male</label><br>
                <input type="radio" value="Female" name="gender" <?php if(isset($gender) && $gender=="Female") echo "checked"; ?>><label>Female</label><br>

                <label>DOB: </label>
                <input type="date" name="dob" value="<?php echo htmlspecialchars($dob); ?>">
                <span style="color: #FF0000;">*<?php echo $dateErr;?></span><br>

                <label>Course: </label>
                <span style="color: #FF0000;">*<?php echo $courseErr;?></span>
                <select id="option" name="course">
                    <option value="" style="display: none;"></option>
                    <option value="C++" <?php if(isset($course) && $course=="c1") echo "selected"; ?>>C++</option>
                    <option value="Python" <?php if(isset($course) && $course=="c2") echo "selected"; ?>>Python</option>
                    <option value="HTML" <?php if(isset($course) && $course=="c3") echo "selected"; ?>>HTML</option>
                    <option value="CSS" <?php if(isset($course) && $course=="c4") echo "selected"; ?>>CSS</option>
                    <option value="Java" <?php if(isset($course) && $course=="c5") echo "selected"; ?>>Java</option>
                </select><br>

                <label>Nationality: </label>
                <span style="color: #FF0000;">*<?php echo $nationErr;?></span>
                <input type="radio" value="indian" name="nationality" <?php if(isset($nationality) && $nationality=="indian") echo "checked"; ?>><label>Indian</label>
                <input type="radio" value="other" name="nationality" <?php if(isset($nationality) && $nationality=="other") echo "checked"; ?>><label>Other</label><br>
                <button type="submit" name="Submit">Submit</button>
            </form>
            <h3>Registration Successful</h3>
            <p><strong>First Name:</strong> <?php echo htmlspecialchars($first_name); ?></p>
            <p><strong>Last Name:</strong> <?php echo htmlspecialchars($last_name); ?></p>
            <p><strong>User Name:</strong> <?php echo htmlspecialchars($user_name); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Mobile:</strong> <?php echo htmlspecialchars($mobile); ?></p>
            <p><strong>Gender:</strong> <?php echo htmlspecialchars($gender); ?></p>
            <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($dob); ?></p>
            <p><strong>Course:</strong> <?php echo htmlspecialchars($course); ?></p>
            <p><strong>Nationality:</strong> <?php echo htmlspecialchars($nationality); ?></p>
    </div>
</body>
</html>
?>