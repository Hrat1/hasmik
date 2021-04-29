<div id="teacherSide" class="container">
    <div class="row">
        <div class="col-12">
            <div class="my-lessons-header"><?php echo $lessonTypeToString;?> Lessons
                <span class="add_lesson" data-mdb-toggle="modal" data-mdb-target="#addLessonModal">+</span>
            </div>
        </div>
        <div class="col-12">
            <div id="lessonListWrapper" class="lessons-list-wrapper">
                <?php include_once "../operations/checkOperations/checkLessons.php"?>
            </div>
        </div>
    </div>
</div>
<?php
include_once("addLesson.html");
?>


