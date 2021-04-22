<div class="my-settings-form">
    <h3 class="sTabHeaders">Security</h3>
    <div class="sGeneralContent s-right-content">
        <div class="row">
            <ul class="list-items">
                <li class="list-item">
                    <div class="noHover changePass row ">
                        <div class="col-9 col-sm-9 col-md-8 col-lg-3 col-xl-3 s-list">
                            Change password
                        </div>
                        <div class="col-3 col-sm-3 col-md-4 col-lg-9 col-xl-9 s-list">
                            <span>It's a good idea to use a strong password that you're not using elsewhere</span>
                            <button id="editPassword">Edit</button>
                        </div>
                    </div>
                    <div id="changePassWrapper" class="noHover">
                        <!-- settings page user type == zero-->
                        <form method="post" class="firstLoginData">
                            <div class="errorFromBackEnd">
                                <?php if (isset($errorMsg)){echo "* " . $errorMsg;}?>
                            </div>
                            <div class="form-group">
                                <div class="form-outline mb-4">
                                    <input type="text" id="childsPassword" class="form-control" name="currentPassword" onkeyup="" minlength="8" autocomplete="off" />
                                    <label class="form-label" for="childsPassword">Current</label>
                                </div>
                                <p class="errorCheckForInput"></p>
                                <div class="form-outline mb-4">
                                    <input type="text" id="childsPassword" class="form-control" name="child_password" onkeyup="checkPassword(this)" minlength="8" autocomplete="off" />
                                    <label class="form-label" for="childsPassword">New Password</label>
                                </div>
                                <p id="passCheck" class="errorCheckForInput"></p>
                                <div class="form-outline mb-4">
                                    <input type="text" id="childsPassword" class="form-control"  name="child_password" onkeyup="" minlength="8" autocomplete="off" />
                                    <label class="form-label" for="childsPassword">Re-type new password</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-block mb-4" id="changePassword" name="changePassword" disabled>Change Password</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>



