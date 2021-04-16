<div class="my-settings-form">
    <h3 class="sTabHeaders">General account settings</h3>
    <div class="sGeneralContent s-right-content">
        <div class="row">
            <ul class="list-items">
                <li class="list-item">
                    <div class="row">
                        <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 s-list">
                            Name
                        </div>
                        <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 s-list">
                            <?php echo "$userFirstNameDecr  $userLastNameDecr"; ?>
                        </div>
                    </div>
                </li>
                <li class="list-item">
                    <div class="row">
                        <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 s-list">
                            Email
                        </div>
                        <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 s-list">
                            <?php echo "$userEmailDecr"; ?>
                        </div>
                    </div>
                </li>
            </ul>
            <?php
            if ($getUserType == 0) {
                include "pages/accountUTZ.php";
            }
            ?>
        </div>
    </div>
</div>


