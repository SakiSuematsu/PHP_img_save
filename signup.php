<h1>新規会員登録</h1>
<form action="register.php" method="post">
    <div>
    <label>
        名前：
        <input type="text" name="username" required>
    </label>
</div>
<div>
    <label>
        メールアドレス：
        <input type="text" name="mail" required>
    </label>
</div>
<div>
    <label>
        パスワード：
        <input type="password" name="pass" required>
    </label>
</div>
<input type="submit" value="新規登録">
</form>
<p>すでに登録済みの方は<a href="login_form.php">こちら</a></p>
<p>管理画面<a href="admin_user.php">こちら</a></p>