function checkusername()
{
    var groupname = document.getElementById("_groupName");
    var m = document.getElementById("_Message");
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function ()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            m.innerHTML = xmlhttp.responseText;
        else if (xmlhttp.readyState == 1)
            m.innerHTML = "please wait...";
    }
    xmlhttp.open("GET", "checkgroupname.php?un="+groupname.value, false);
    xmlhttp.send();
}