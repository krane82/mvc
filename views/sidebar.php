<div class="container">
        <div class="col-lg-2 col-sm-2 col-xs-4" style="background-color: aliceblue">
            <?php if($data['admin']==true):?>
                <h3>Hello, admin!</h3>
                <div class="form-group">
                    <a class="btn btn-sm btn-default" href="auth/logout">Logout</a>
                </div>
            <?php else:?>
                <form action="auth/check" method="post">
                    <label><p>Login</p>
                        <input class="form-control form-group" type="text" name="login" placeholder="Login">
                    </label>
                    <label><p>Password</p>
                        <input class="form-control form-group" type="password" name="password" placeholder="Password">
                        <p>
                            <button class="btn btn-sm btn-default" type="submit">Log In</button>
                        </p>
                    </label>
                </form>
            <?php endif?>
        </div>