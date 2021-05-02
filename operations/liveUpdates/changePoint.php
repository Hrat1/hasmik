<?php
session_start();
include_once('../../db.php');
include_once("../encrypt.php");

if (isset($_POST['exID']) && isset($_POST['exPoint']) && $_POST['exID'] != null && $_POST['exPoint'] != null) {
    $exID = $_POST['exID'];
    $exPoint = $_POST['exPoint'];

    if (strlen($exID) > 6) {
        if ($exPoint >= 0.5 && $exPoint <= 5) {
            $sql = "UPDATE exercises SET exercise_assessment='" . $exPoint . "' WHERE exercise_vkey='" . $exID . "'";

            if (mysqli_query($conn, $sql)) {
                echo "Student's point changed.";
            } else {
                echo "Something is wrong please reload page";
            }
        }else{
            echo "Please select Point.";
        }
    }else{
        echo "something is wrong please reload page";
    }
}