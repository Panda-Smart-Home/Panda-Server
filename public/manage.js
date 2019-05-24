function changeUser() {
    var letterNumber = /^[0-9a-zA-Z]+$/;
    var old_username = document.getElementById("old-username").value;
    var old_password = document.getElementById("old-password").value;
    var new_username = document.getElementById("new-username").value;
    var new_password = document.getElementById("new-password").value;
    if (
        !letterNumber.test(old_username) 
        || !letterNumber.test(old_password) 
        || !letterNumber.test(new_username)
        || !letterNumber.test(new_password)
    ) {
        alert("输入错误，用户名密码只包含英文字母或数字，请重新输入！");
        return false;
    }
    if (new_password.length < 8) {
        alert("新密码最低为 8 位，请重新输入！");
        return false;
    }
    return true;
}

function logout() {
    window.location.href = "/logout"
}

function GetQueryString(name)
{
    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]); 
    return null;
}
if (GetQueryString("ap") === "fail") {
    alert("设置设备 WIFI 出错，请检查输入是否正确（合法的WIFI名称和密码）！后重试");
} else if (GetQueryString("ap") === "ok") {
    alert("设置成功！设备 WIFI 将会重启，请重新连接设备 WIFI。");
}
if (GetQueryString("sta") === "fail") {
    alert("家庭网络设置失败！");
} else if (GetQueryString("sta") === "ok") {
    alert("家庭网络设置成功。");
}
if (GetQueryString("user") === "fail") {
    alert("设置用户名密码出错，请检查原用户名密码输入是否正确！");
} else if (GetQueryString("user") === "ok") {
    alert("设置成功！下次登录将使用新用户名密码。");
}
