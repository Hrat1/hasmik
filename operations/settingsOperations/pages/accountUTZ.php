<!-- settings page user type == zero-->

<?php
if (isset($_POST['firstLoginInsert'])){
    $selectType = $_POST['selectUserType'];

    echo $selectType;
}
?>
<form method="post" class="firstLoginData">
    <div class="form-outline mb-4">
        <input type="text" id="username" class="form-control" onkeyup="checkUsernameStatus()" autocomplete="off" required/>
        <label class="form-label" for="username">Username</label>
    </div>
    <p id="usernameCheck" class="errorCheckForInput"></p>
    <div class="form-group mb-4">
        <select id="userTypeSelect" class="form-select custom-select" name='selectUserType' onchange="changeUserType(this)" required>
            <option value="" selected disabled>Select User Type</option>
            <option value="1">Student</option>
            <option value="2">Parent</option>
            <option value="3">Teacher</option>
        </select>
    </div>
    <div id="child" class="form-group">
        <div class="row mb-4 fullName">
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="childsFName" class="form-control" name="child_firstname" minlength="2" maxlength="20" />
                    <label class="form-label" for="childsFName">Child's first name</label>
                </div>
            </div>
            <div class="col lastName">
                <div class="form-outline">
                    <input type="text" id="childsLName" class="form-control" name="child_lastname" minlength="2" maxlength="24" />
                    <label class="form-label" for="childsLName">Child's last name</label>
                </div>
            </div>
        </div>
        <div class="form-group mb-4">
            <select id="selectSubject" class="form-select custom-select" name='select' onkeypress="userTypeChange()" >
                <option value="" selected disabled>Select Subject</option>
                <option value="1">English</option>
                <option value="2">Spanish</option>
                <option value="3">JavaScript</option>
            </select>
        </div>
        <div class="form-outline mb-4">
            <input type="text" id="childsPassword" class="form-control" name="child_password" />
            <label class="form-label" for="childsPassword">Child's password</label>
        </div>
    </div>
    <button type="submit" class="btn btn-success btn-block mb-4" name="firstLoginInsert">Place order</button>
</form>

