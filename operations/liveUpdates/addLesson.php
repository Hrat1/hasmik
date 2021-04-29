<?php
session_start();
include_once "../../db.php";
include_once('../encrypt.php');
include_once('../checkOperations/checkUserType.php');
$errorSWrong = "Something went wrong. Please try again";

if (isset($_POST['lessonTitle']) && strlen($_POST['lessonTitle']) >= 5) {
    if (isset($_POST['meetingLink']) && strlen($_POST['meetingLink']) >= 7) {
        if (isset($_POST['lessonData']) && strlen($_POST['lessonData']) >= 5) {
            if (isset($_POST['lessonDesc']) && strlen($_POST['lessonDesc']) >= 60) {
                $teacherVKey = $userVKey;
                $lessonVKey = md5($userFirstNameDecr . $userLastNameDecr . date("Y-m-d h:i:sa"));
                $lessonType = $userLessonType;
                $lessonTitle = encrypt(ucfirst($_POST['lessonTitle']));
                $lessonDesc = encrypt(ucfirst($_POST['lessonDesc']));
                $lessonLink = encrypt($_POST['meetingLink']);
                $lessonStartData = encrypt($_POST['lessonData']);

                $insertLessonQ = "INSERT INTO lessons (lesson_vkey, teacher_vkey, lesson_title, lesson_description, lesson_type, live_lesson_link, lesson_start_time) VALUES ( '" . $lessonVKey . "','" . $teacherVKey . "', '" . $lessonTitle . "', '" . $lessonDesc . "', '" . $lessonType . "', '" . $lessonLink . "', '" . $lessonStartData . "')";

                if (mysqli_query($conn, $insertLessonQ)) {
                    echo "Your Lesson Added";
                } else {
                    echo "Something is wrong, please reload page";
                }
            } elseif (strlen($_POST['lessonDesc']) < 60) {
                echo "Description length is low from 60";
            } else {
                echo $errorSWrong;
            }
        } elseif (strlen($_POST['lessonData']) < 5) {
            echo "Please select valid data";
        } else {
            echo $errorSWrong;
        }
    } elseif (strlen($_POST['meetingLink']) < 7) {
        echo "Meeting link length is low from 7";
    } else {
        echo $errorSWrong;
    }
} elseif (strlen($_POST['lessonTitle']) < 5) {
    echo "Title text length is low from 10";
} else {
    echo $errorSWrong;
}