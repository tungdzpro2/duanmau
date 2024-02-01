<main>
    <div class="main">
        <div class="banner-login"><img width="90%" src="imgs/bannerlogin.png" alt=""></div>
        <div class="login form">
            <h1>LOGIN</h1>
            <form action="model/login.php" method="post">
                <input name="user" type="text" placeholder="Enter your user name">
                <input name="password" type="password" placeholder="Enter your password">
                <a href="./?action=forgotpassword">Forgot password?</a>
                <input name="sm-login" type="submit" class="button" value="Login">
            </form>
            <div class="signup">
                <span class="signup">Don't have an account?
                    <a href="?action=register" for="check">Signup</a>
                </span>
            </div>
        </div>
    </div>
</main>