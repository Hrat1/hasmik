<div id="teacherSide" class="container">
    <div class="row">
        <div class="col-12">
            <div class="my-lessons-header">
                <?php echo $lessonTypeToString;?> Lessons
            </div>
        </div>
        <div class="col-12">
            <div id="lessonListWrapper" class="lessons-list-wrapper">
                <?php include_once "../operations/checkOperations/checkLessons.php"?>
            </div>
        </div>
    </div>
</div>