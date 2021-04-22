<?php
include_once("../db.php");
include_once("session.php");
include_once('encrypt.php');
include_once('checkOperations/checkUserType.php');
privateSession($conn);


//first time insert data from settings page

if (isset($_POST['firstLoginInsert'])) {
    if ($_POST['username'] && $_POST['username'] != null && strlen($_POST['username']) > 3) {
        $username = $_POST['username'];
        $encUsername = encrypt($username);

        $checkUsername = "select username from users where username='" . $encUsername . "'";
        $checkResult = $conn->query($checkUsername);

        if ($checkResult->num_rows > 0) {
            $errorMsg = "username already exists!";
        } elseif (isset($_POST['selectLesson']) && $_POST['selectLesson'] != null) {
            $lessonType = $_POST['selectLesson'];

            if ($lessonType == 1 || $lessonType == 2 || $lessonType == 3) {
                if (isset($_POST['selectUserType']) && $_POST['selectUserType'] != null) {
                    $userType = $_POST['selectUserType'];

                    if ($userType == 1) {
                        $sql = "UPDATE users SET user_type='" . $userType . "', lesson_type='" . $lessonType . "', username='" . $encUsername . "' WHERE email='" . $_SESSION['u_id'] . "'";
                        if (mysqli_query($conn, $sql)) {
                            header("Refresh:0");
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    } elseif ($userType == 2) {
                        if (isset($_POST['child_firstname']) && strlen($_POST['child_firstname']) >= 2 && $_POST['child_firstname'] != null) {
                            $childFName = $_POST['child_firstname'];
                            $encChildFName = encrypt($childFName);

                            if (isset($_POST['child_lastname']) && strlen($_POST['child_lastname']) >= 2 && $_POST['child_lastname'] != null) {
                                $childLName = $_POST['child_lastname'];
                                $encChildLName = encrypt($childLName);

                                if (isset($_POST['child_password']) && strlen($_POST['child_password']) >= 8 && $_POST['child_password'] != null) {
                                    $childPass = $_POST['child_password'];
                                    $encChildPass = encrypt($childPass);
                                    $childEmail = $username . "@youcan.com";
                                    $encChildEmail = encrypt($childEmail);
                                    $childVKey = md5($childEmail);

                                    $insertChildData = "INSERT INTO users (username, first_name, last_name, email, user_type, lesson_type, password, verified, vkey, parent_vkey) VALUES ( '". $encChildEmail ."','" . $encChildFName . "', '" . $encChildLName . "', '" . $encChildEmail . "',  '3', '" . $lessonType . "', '" . $encChildPass . "', '1', '" . $childVKey . "', '" . $userVKey . "')";
                                    $updateParentData = "UPDATE users SET user_type='" . $userType . "', lesson_type='" . $lessonType . "', username='" . $encUsername . "' WHERE email='" . $_SESSION['u_id'] . "'";

                                    if (mysqli_query($conn, $insertChildData)) {
                                        header("Refresh:0");
                                    }else{
                                        echo "Error: " . $insertChildData . "<br>" . mysqli_error($conn);
                                    }

                                    if (mysqli_query($conn, $updateParentData)) {
                                        header("Refresh:0");
                                    }else{
                                        echo "Error: " . $updateParentData . "<br>" . mysqli_error($conn);
                                    }

                                } else {
                                    $errorMsg = "Please write correct password";
                                }
                            } else {
                                $errorMsg = "Please write correct Lname.";
                            }
                        } else {
                            $errorMsg = "Please write correct Fname.";
                        }
                    } else {
                        $errorMsg = "Something is wrong.";
                    }
                } else {
                    $errorMsg = "Please select user type.";
                }
            } else {
                $errorMsg = "Please select lesson type.";
            }
        }
    } else {
        $errorMsg = "Please write correct username";
    }
}

//if(isset($_POST['dashboard'])){
//
//}
