<div class="my-settings-form">
    <h3 class="sTabHeaders">Children Data</h3>
    <div class="sGeneralContent s-right-content">
        <div class="row">
            <ul class="list-items">
                <li class="list-item">
                    <div class="row">
                        <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 s-list">
                            Name
                        </div>
                        <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 s-list">
                            <?php echo "$getChildFName  $getChildLName"; ?>
                        </div>
                    </div>
                </li>
                <li class="list-item">
                    <div class="row">
                        <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 s-list">
                            Email
                        </div>
                        <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 s-list">
                            <?php echo "$getChildEmail"; ?>
                        </div>
                    </div>
                </li>
                <li class="list-item">
                    <div class="row">
                        <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 s-list">
                            Lesson
                        </div>
                        <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 s-list">
                            <?php
                            if ($getChildLessonType == 1) {
                                echo "English";
                            } elseif ($getChildLessonType == 2) {
                                echo "Spanish";
                            } elseif ($getChildLessonType == 3) {
                                echo "JavaScript";
                            }
                            ?>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>