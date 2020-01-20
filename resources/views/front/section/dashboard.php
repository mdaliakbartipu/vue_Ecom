<?php

$_GET['thisPage'] = 'Dashboard';

include("partials/breadcumb.php"); ?>

<div class="account_page_bg">
    <div class="container">
        <section class="main_content_area">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li><a href="#dashboard" data-toggle="tab" class="nav-link">Dashboard</a></li>
                                <li> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                                <!-- <li><a href="#downloads" data-toggle="tab" class="nav-link">Downloads</a></li> -->
                                <li><a href="#account-details" data-toggle="tab" class="nav-link active">Account details</a></li>
                                <li><a href="/logout" class="nav-link">logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade" id="dashboard">
                                <h3><?= \Auth::user()->name ?>'s Dashboard</h3>

                                <p>Welcome <?= \Auth::user()->name ?> to your dashboard</p>
                                <p>From here you can change your account details, can change your address which will be automatically placed on your checkout page.<br />You can see your orders and rewards points</p>
                                <p>Happy exploring</p>
                            </div>
                            <div class="tab-pane fade" id="orders">
                                <h3>Orders</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="center">
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>View</th>
                                                <!-- <th>Actions</th> -->
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php
                                            $index = 0;
                                            foreach ($orders as $key => $order) : ?>
                                                <tr>
                                                    <td><?= ++$index ?></td>
                                                    <td><?= $order->created_at ?></td>
                                                    <td><span class="success"><?= $order->payment_status ? 'Completed' : 'Processing' ?> </span></td>
                                                    <td><?= $order->total ?></td>
                                                    <td><button><i class="fa fa-eye"></i></button></td>
                                                    <!-- <td><a href="cart.html" class="view">view</a></td> -->
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="downloads">
                                <h3>Downloads</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Downloads</th>
                                                <th>Expires</th>
                                                <th>Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Shopnovilla - Free Real Estate PSD Template</td>
                                                <td>May 10, 2018</td>
                                                <td><span class="danger">Expired</span></td>
                                                <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                            </tr>
                                            <tr>
                                                <td>Organic - ecommerce html template</td>
                                                <td>Sep 11, 2018</td>
                                                <td>Never</td>
                                                <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="address">
                                <p>The following addresses will be used on the checkout page by default.</p>
                                <h4 class="billing-address">Billing address</h4>
                                <a href="#" class="view">Edit</a>
                                <p><strong>Bobby Jackson</strong></p>
                                <address>
                                    House #15,
                                    Road #1<br>
                                    Block #C ,
                                    Banasree <br>
                                    Dhaka,
                                    1212
                                </address>
                                <p>Bangladesh</p>
                            </div>
                            <div class="tab-pane fade show active" id="account-details">
                                <h3>Account details </h3>
                                <div class="login">
                                    <div class="login_form_container" style="width:45%;float:left;margin:1em">
                                        <div class="account_login_form">
                                            <form action="/save-user-info" method="POST">
                                                <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                                                <!-- <div class="input-radio">
                                                        <span class="custom-radio"><input type="radio" value="1" name="id_gender"> Mr.</span>
                                                        <span class="custom-radio"><input type="radio" value="2" name="id_gender"> Mrs.</span>
                                                    </div> <br> -->
                                                <label>Name</label>
                                                <input type="text" name="name" value="<?= $user->name ?>">
                                                <label>Email</label>
                                                <input type="text" name="email" value="<?= $user->email ?>">
                                                <label>Phone</label>
                                                <input type="text" name="phone" value="<?= $user->profile ? $user->profile->phone : null ?>">
                                                <!-- <label>Birthdate</label>
                                                    <input type="text" placeholder="MM/DD/YYYY" value="" name="dob">
                                                    <span class="example">
                                                      (E.g.: 05/31/1970)
                                                    </span> -->

                                                <br>
                                                <!-- <span class="custom_checkbox">
                                                        <input type="checkbox" value="1" name="newsletter">
                                                        <label>Sign up for our newsletter<br><em>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</em></label>
                                                    </span> -->
                                                <div class="save_button primary_btn default_button">
                                                    <button type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="login_form_container" style="width:45%;float:right;margin:1em">
                                        <div class="account_login_form">
                                            <form action="/save-user-info" method="POST">
                                                <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                                                <label>Country</label>
                                                <input type="text" name="country" value="<?= $user->profile ? $user->profile->country : null ?>">
                                                <label>State</label>
                                                <input type="text" name="state" value="<?= $user->profile ? $user->profile->state : null ?>">
                                                <label>City</label>
                                                <input type="text" name="city" value="<?= $user->profile ? $user->profile->city : null ?>">
                                                <label>Street</label>
                                                <input type="text" name="street" value="<?= $user->profile ? $user->profile->street : null ?>">
                                                <input type="text" name="address" value="<?= $user->profile ? $user->profile->address : null ?>">
                                                <!-- <label>Birthdate</label>
                                                    <input type="text" placeholder="MM/DD/YYYY" value="" name="dob">
                                                    <span class="example">
                                                      (E.g.: 05/31/1970)
                                                    </span> -->

                                                <br>
                                                <!-- <span class="custom_checkbox">
                                                        <input type="checkbox" value="1" name="newsletter">
                                                        <label>Sign up for our newsletter<br><em>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</em></label>
                                                    </span> -->
                                                <div class="save_button primary_btn default_button">
                                                    <button type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>