<?php
$getSessionId = $_SESSION["u_id"];
$getUserData = $conn->query("SELECT * FROM users WHERE email = '$getSessionId'");

$userDataRow = mysqli_fetch_assoc($getUserData);
$getUserType = $userDataRow['user_type'];
$userFirstName = $userDataRow['first_name'];
$userLastName = $userDataRow['last_name'];
$userEmail = $userDataRow['email'];
$userName = $userDataRow['username'];
$userLessonType = $userDataRow['lesson_type'];
$userVKey = $userDataRow['vkey'];
$userParent = $userDataRow['parent_vkey'];

//decrypted
$userFirstNameDecr = decrypt($userFirstName);
$userLastNameDecr = decrypt($userLastName);
$userEmailDecr = decrypt($userEmail);
$userNameDecr = decrypt($userName);

if ($getUserType == "2"){
//    if user is parent
    $getChildData = $conn->query("SELECT * FROM users WHERE parent_vkey = '$userVKey'");
    $childDataRow = mysqli_fetch_assoc($getChildData);

    $getChildFName = decrypt($childDataRow['first_name']);
    $getChildLName = decrypt($childDataRow['first_name']);
    $getChildType = $childDataRow['user_type'];
    $getChildEmail = decrypt($childDataRow['email']);
    $getChildName = decrypt($childDataRow['username']);
    $getChildLessonType = $childDataRow['lesson_type'];
    $getChildVKey = $childDataRow['vkey'];
    $getChildParent = $childDataRow['parent_vkey'];
} elseif ($getUserType == "3") {
//    if user is children
    $getParentData = $conn->query("SELECT * FROM users WHERE vkey = '$userParent'");
    $parentDataRow = mysqli_fetch_assoc($getParentData);

    $getParentFName = decrypt($parentDataRow['first_name']);
    $getParentLName = decrypt($parentDataRow['first_name']);
    $getParentType = $parentDataRow['user_type'];
    $getParentEmail = decrypt($parentDataRow['email']);
    $getParentName = decrypt($parentDataRow['username']);
    $getParentLessonType = $parentDataRow['lesson_type'];
    $getParentVKey = $parentDataRow['vkey'];
}