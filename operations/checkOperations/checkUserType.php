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