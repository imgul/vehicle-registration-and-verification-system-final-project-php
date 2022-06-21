$(document).ready(function () {
    /*----------------------------------
        Sweet Alerts
    ------------------------------------*/
    $(".logoutBtn").click(function () {
        swal({
            title: "Are you sure?",
            text: "You want to logout from your account!",
            icon: "success",
            buttons: [
                "Cancel",
                "Yes, logout!"
            ],
            dangerMode: true,
        })
            .then((willLogout) => {
                if (willLogout) {
                    window.location.href = "logout.php";
                }
            });
    });
});
