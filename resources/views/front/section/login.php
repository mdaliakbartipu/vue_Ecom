<div class="login_page_bg" style="background:white">
        <div class="container">
            <div class="customer_login">
                <div style="display:flex; flex-direction:row;justify-content:space-around">
                    <!--login area start-->
                    <div style="width:30%">
                    
                </div>
                    <div style="width:30%">
                        <div class="account_form login">
                            <h2>login</h2>
                            <form action="" method="post">
                                <?=csrf_field()?>
                                <p>
                                    <label>Username or email <span>*</span></label>
                                    <input type="text" name="email">
                                </p>
                                <p>
                                    <label>Passwords <span>*</span></label>
                                    <input type="password" name="password">
                                </p>
                                <div class="login_submit">
                                    <!-- <a href="#">Lost your password?</a> -->
                                    <!-- <label for="remember">
                                        <input id="remember" type="checkbox">
                                        Remember me
                                    </label> -->

                                    <button style="background-color:green;float:left"  type="submit">login</button>
                                    <p>Don't have an account ? <br/>
                                    <a href="/register" style="height:50px;float:right;color:teal">Register</a>
                                    </p>
                                        
                                </div>

                            </form>
                        </div>
                    </div>

                    <div style="width:30%"></div>
                    <!--login area start-->
                </div>
            </div>
        </div>
    </div>