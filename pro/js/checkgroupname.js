function checkgroupname() {
    groupname = document.getElementById("_groupName").value;
    document.getElementById("_mess").innerHTML = 'Please wait...';

    $.ajax({
        url: 'checkGroupName.php',
        type: 'POST',
        async: !1,
        //contentType: 'charset=utf-8',
        data: { un: groupname},
        success: function (data) {
            document.getElementById("_mess").innerHTML = data;
        }
    });
}