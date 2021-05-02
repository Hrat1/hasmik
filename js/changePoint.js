const changePointModal = document.getElementById('changePoint');
changePointModal.addEventListener('show.mdb.modal', (event) => {
    const button = event.relatedTarget;
    const username = button.getAttribute('data-mdb-username');
    const userId = button.getAttribute('data-mdb-userid');
    const modalUserKey = changePointModal.querySelector('#user-key');
    const modalTitle = changePointModal.querySelector('.modal-title');

    modalUserKey.textContent = `${userId}`;
    modalTitle.textContent = `${username}`;

});


// api code ////////////////////

function changePoint(){
    let userKey = $('#user-key').text();
    let selectedPoint = $("#changePointSelect").children("option:selected").val();
    let errorMessage = $("#errorFromBackEnd");

    if (userKey.length > 6) {
        if (selectedPoint >= 0.5 && selectedPoint <= 5) {
            $.ajax({
                type: 'post',
                url: '../operations/liveUpdates/changePoint.php',
                data: {
                    exID: userKey,
                    exPoint: selectedPoint,
                },
                success: function (msg) {
                    if (msg === "Student's point changed.") {
                        window.location = window.location.href;
                    } else {
                        errorMessage.show();
                        errorMessage.text(msg);
                    }
                }
            });
        }else {
            $("#errorFromBackEnd").show();
            errorMessage.text("Please select Point");
        }
    }else {
        $("#errorFromBackEnd").show();
        errorMessage.text("Something is wrong");
    }
}