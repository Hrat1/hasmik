<!-- settings page user type == zero-->
<form method="post" class="firstLoginData">
    <div class="errorFromBackEnd">
        <?php if (isset($errorMsg)){echo "* " . $errorMsg;}?>
    </div>
    <div class="form-outline mb-4">
        <input type="text" id="username" class="form-control" name="username" onkeyup="checkUsernameStatus(); checkIsAllFilled()" autocomplete="off" minlength="4" required/>
        <label class="form-label" for="username">Username</label>
    </div>
    <p id="usernameCheck" class="errorCheckForInput"></p>
    <div class="form-group mb-4">
        <select id="userTypeSelect" class="form-select custom-select" name='selectUserType' onchange="changeUserType(this); checkIsAllFilled()" required>
            <option value="" selected disabled>Select User Type</option>
            <option value="1">Student</option>
            <option value="2">Parent</option>
        </select>
    </div>
    <div class="form-group mb-4">
        <select id="selectSubject" class="form-select custom-select" onchange="checkIsAllFilled()" name='selectLesson'>
            <option value="" selected disabled>Select Lesson</option>
            <option value="1">English</option>
            <option value="2">Spanish</option>
            <option value="3">JavaScript</option>
        </select>
    </div>
    <div id="child" class="form-group">
        <div class="row mb-4 fullName">
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="childsFName" class="form-control name" name="child_firstname" value="<?php if (isset($childFName)){echo $childFName;}?>"  onkeyup="checkIsAllFilled()" minlength="2" maxlength="20" />
                    <label class="form-label" for="childsFName">Child's first name</label>
                </div>
            </div>
            <div class="col lastName">
                <div class="form-outline">
                    <input type="text" id="childsLName" class="form-control name" name="child_lastname" value="<?php if (isset($childLName)){echo $childLName;}?>"  onkeyup="checkIsAllFilled()" minlength="2" maxlength="24" />
                    <label class="form-label" for="childsLName">Child's last name</label>
                </div>
            </div>
        </div>
        <div class="form-outline mb-4">
            <input type="text" id="childsPassword" class="form-control" value="<?php if (isset($childPass)){echo $childPass;}?>"  name="child_password" onkeyup="checkPassword(this); checkIsAllFilled()" autocomplete="off" />
            <label class="form-label" for="childsPassword">Child's password</label>
        </div>
        <p id="passCheck" class="errorCheckForInput"></p>
    </div>

    <button type="submit" class="btn btn-success btn-block mb-4" id="firstLoginButton" name="firstLoginInsert" disabled>Change Settings</button>
</form>

