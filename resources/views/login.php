<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="data:;base64,=">
    <link rel="stylesheet" href="login_style.css">
    <title>登录 - 熊猫智家</title>
</head>
<body>
<main>
    <form class="login-form" action="/login" method="POST">
        <h1>熊猫智家</h1>
        <div class="form-field">
            <input type="text" name="username" id="username" placeholder="用户名" required>
        </div>
        <div class="form-field">
            <input type="password" name="password" id="password" placeholder="密码" required>
        </div>
        <div class="form-field" style="height: 72px">
            <button type="submit">登录</button>
        </div>
        <div class="form-field">
            <p id="fail-info" class="info">登录失败！请检查用户名密码是否正确。</p>
        </div>
    </form>
</main>
</body>
<script>
    function GetQueryString(name)
    {
        var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return unescape(r[2]);
        return null;
    }
    if (GetQueryString("status") === "fail") {
        document.getElementById('fail-info').classList.add("show");
    }
</script>
</html>