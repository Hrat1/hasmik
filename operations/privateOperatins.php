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

                                    $insertChildData = "INSERT INTO users (username, first_name, last_name, email, user_type, lesson_type, password, verified, vkey, parent_vkey) VALUES ( '" . $encChildEmail . "','" . $encChildFName . "', '" . $encChildLName . "', '" . $encChildEmail . "',  '3', '" . $lessonType . "', '" . $encChildPass . "', '1', '" . $childVKey . "', '" . $userVKey . "')";
                                    $updateParentData = "UPDATE users SET user_type='" . $userType . "', lesson_type='" . $lessonType . "', username='" . $encUsername . "' WHERE email='" . $_SESSION['u_id'] . "'";

                                    if (mysqli_query($conn, $insertChildData)) {
                                        header("Refresh:0");
                                    } else {
                                        echo "Error: " . $insertChildData . "<br>" . mysqli_error($conn);
                                    }

                                    if (mysqli_query($conn, $updateParentData)) {
                                        header("Refresh:0");
                                    } else {
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


//insert task file link, video link to db and add task file to uploads folder

if (isset($_POST['completeLesson']) && isset($_POST['lessonVideoLink']) && isset($_FILES['fileSelect']['name'])) {
    if (strlen($_POST['lessonVideoLink']) < 8) {
        $errorMsg = "Please write valid address";
    } elseif (strlen($_FILES['fileSelect']['name']) < 5) {
        $errorMsg = "Please select a valid file.";
    } else {
        $temp = explode(".", $_FILES["fileSelect"]["name"]);
        $newFilename = $lessonTypeToString . "_" . $userNameDecr . "_" . round(microtime(true)) . '.' . end($temp);
        $lessonVKey = $_GET['lessonId'];


        if (copy($_FILES['fileSelect']['tmp_name'], "../uploads/" . $newFilename)) {
            $fileName = encrypt($newFilename);
            $lessonVideoLink = encrypt($_POST['lessonVideoLink']);
            $updateLessonData = "UPDATE lessons SET lesson_task='" . $fileName . "', lesson_video_link='" . $lessonVideoLink . "' WHERE lesson_vkey='" . $lessonVKey . "'";

            if (mysqli_query($conn, $updateLessonData)) {
                echo "<script>window.location = window.location.href;</script>";
            } else {
                echo "Error: " . $updateLessonData . "<br>" . mysqli_error($conn);
            }
        } else {
            $errorMsg = "Something is wrong";
        }
    }
}


//insert homework file link to db and add homework file to uploads folder


if (isset($_POST['addHomework']) && isset($_FILES['homeworkSelect']['name']) && isset($_GET['lessonId'])) {
    if (strlen($_FILES['homeworkSelect']['name']) < 5) {
        $responseMsg = "Please select a valid file.";
    } else {
        $temp = explode(".", $_FILES["homeworkSelect"]["name"]);
        $newFilename = $lessonTypeToString . "_" . $userNameDecr . "_" . round(microtime(true)) . '.' . end($temp);

        if (copy($_FILES['homeworkSelect']['tmp_name'], "../uploads/homeworks/" . $newFilename)) {
            $exerciseVKey = md5($userNameDecr . date("Y-m-d h:i:sa"));
            $lessonVKey = $_GET['lessonId'];
            $studentVKey = $userVKey;
            $fileName = encrypt($newFilename);

            $insertExerciseQ = "INSERT INTO exercises (exercise_vkey, lesson_vkey, student_vkey, exercise_file) VALUES ('". $exerciseVKey ."', '". $lessonVKey ."', '". $studentVKey ."', '". $fileName ."')";

            if (mysqli_query($conn, $insertExerciseQ)) {
                echo "<script>window.location = window.location.href;</script>";
            } else {
                echo "Error: " . $insertExerciseQ . "<br>" . mysqli_error($conn);
            }
        } else {
            $errorMsg = "Something is wrong";
        }

//        echo "<script>window.location = window.location.href;</script>";
    }
}


