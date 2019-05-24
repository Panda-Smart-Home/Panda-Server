<!DOCTYPE html>
<html lang="ZH">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="data:;base64,=">
    <link rel="stylesheet" href="manage_style.css">
    <title>管理 - 熊猫智家</title>
</head>
<body>
<main>
    <h1>熊猫控制中心管理</h1>
    <button class="logout" onclick="logout()">退出登录</button>
    <div class="card">
        <h2>设备信息</h2>
        <p>设备编号：<?php echo $config['id']; ?></p>
        <p>设备名称：<?php echo $config['name']; ?></p>
        <p>芯片型号：<?php echo $config['chip']; ?></p>
    </div>
    <div class="card">
        <h2>控制中心信息</h2>
        <?php date_default_timezone_set('Asia/Shanghai'); ?>
        <p>时间：<?php echo date('Y-m-d H:i:s', time()); ?></p>
    </div>
    <div class="card">
        <h2>控制中心配置</h2>
        <form action="/config" method="POST">
            <div class="form-field">
                <label>手机：</label>
                <input id="phone" class="text-input" name="phone" placeholder="用户手机号" value="<?php echo $config['phone'] ?? ''; ?>" required>
            </div>
            <button>保存</button>
        </form>
    </div>
    <div class="card">
        <h2>登录用户</h2>
        <form action="/user" method="POST" onsubmit="return changeUser()">
            <div class="form-field">
                <label>原用户：</label>
                <input id="old-username" class="text-input" type="text" name="old_username" value="<?php echo $config['username']; ?>" placeholder="原用户名" required>
            </div>
            <div class="form-field">
                <label>原密码：</label>
                <input id="old-password" class="text-input" type="password" name="old_password" placeholder="原密码" required>
            </div>
            <div class="form-field">
                <label>新用户：</label>
                <input id="new-username" class="text-input" type="text" name="new_username" placeholder="新用户名" required>
            </div>
            <div class="form-field">
                <label>新密码：</label>
                <input id="new-password" class="text-input" type="password" name="new_password" placeholder="新密码" required>
            </div>
            <button>保存</button>
        </form>
    </div>
</main>
</body>
<script src="manage.js"></script>
</html>