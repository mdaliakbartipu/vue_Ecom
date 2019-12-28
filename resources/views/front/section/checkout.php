<?php

$_GET['thisPage'] = 'Checkout';

include("partials/breadcumb.php"); ?>

<div class="checkout_page_bg">
    <div class="container">
        <div class="Checkout_section">
            <div class="checkout_form">
            <form action="/order" method="post">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="checkout_form_left">
                            
                                <h3>Billing Details</h3>
                                <div class="row">

                                    <div class="col-lg-6 mb-20">
                                        <label>First Name <span>*</span></label>
                                        <input type="text" name="first_name">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label>Last Name <span>*</span></label>
                                        <input type="text" name="last_name">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label for="country">country <span>*</span></label>
                                        <select class="niceselect_option" name="cuntry" id="country" style="display: none;">
                                            <option value="2">bangladesh</option>
                                            <option value="3">Algeria</option>
                                            <option value="4">Afghanistan</option>
                                            <option value="5">Ghana</option>
                                            <option value="6">Albania</option>
                                            <option value="7">Bahrain</option>
                                            <option value="8">Colombia</option>
                                            <option value="9">Dominican Republic</option>

                                        </select>
                                    </div>

                                    <div class="col-12 mb-20">
                                        <label>Street address <span>*</span></label>
                                        <input name="street" placeholder="House number and street name" type="text">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <input name="address" placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>Town / City <span>*</span></label>
                                        <input type="text" name="city">
                                    </div>
                                    <div class="col-12 mb-20">
                                        <label>State / County <span>*</span></label>
                                        <input type="text" name="state">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label>Phone<span>*</span></label>
                                        <input type="text" name="phone">

                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <label> Email Address <span>*</span></label>
                                        <input type="text" name="email">

                                    </div>
                                    <div class="col-12 mb-20">
                                        <input id="account" type="checkbox" data-target="createp_account">
                                        <label for="account" data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne">Create an account?</label>

                                        <div id="collapseOne" class="collapse one" data-parent="#accordion">
                                            <div class="card-body1">
                                                <label> Account password <span>*</span></label>
                                                <input placeholder="password" type="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-20">
                                        <input id="address" type="checkbox" data-target="createp_account" name="shipping">
                                        <label class="righ_0" for="address" data-toggle="collapse" data-target="#collapsetwo" aria-controls="collapseOne">Ship to a different address?</label>

                                        <div id="collapsetwo" class="collapse one" data-parent="#accordion">
                                            <div class="row">
                                                <div class="col-lg-6 mb-20">
                                                    <label>First Name <span>*</span></label>
                                                    <input type="text"name="sfirst_name">
                                                </div>
                                                <div class="col-lg-6 mb-20">
                                                    <label>Last Name <span>*</span></label>
                                                    <input type="text" name="slast_name">
                                                </div>

                                                <div class="col-12 mb-20">
                                                    <div class="select_form_select">
                                                        <label for="countru_name">country <span>*</span></label>
                                                        <select class="niceselect_option" name="scuntry" id="countru_name" style="display: none;">
                                                            <option value="2">bangladesh</option>
                                                            <option value="3">Algeria</option>
                                                            <option value="4">Afghanistan</option>
                                                            <option value="5">Ghana</option>
                                                            <option value="6">Albania</option>
                                                            <option value="7">Bahrain</option>
                                                            <option value="8">Colombia</option>
                                                            <option value="9">Dominican Republic</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12 mb-20">
                                                    <label>Street address <span>*</span></label>
                                                    <input name="sstreet" placeholder="House number and street name" type="text">
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <input name="saddress" placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <label>Town / City <span>*</span></label>
                                                    <input type="text" name="scity">
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <label>State / County <span>*</span></label>
                                                    <input type="text" name="sstate">
                                                </div>
                                                <div class="col-lg-6 mb-20">
                                                    <label>Phone<span>*</span></label>
                                                    <input type="text" name="sphone">

                                                </div>
                                                <div class="col-lg-6">
                                                    <label> Email Address <span>*</span></label>
                                                    <input type="text" name="semail">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="order-notes">
                                            <label for="order_note">Order Notes</label>
                                            <textarea name="order_note" id="order_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="checkout_form_right">

                            <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                            <h3>Your order</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($cartProducts as $item) : ?>
                                            <tr>
                                                <td><?= $item['name'] ?><strong> × <?= $item['qty'] ?></strong></td>
                                                <td> $<?= (int) $item['price'] * (int) $item['qty'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Cart Subtotal</th>
                                            <?php

                                            $subtotal = 0;
                                            $ship = 5;
                                            foreach ($cartProducts as $item) {
                                                $subtotal += (int) $item['price'] * (int) $item['qty'];
                                            }
                                            ?>
                                            <td>$<?= $subtotal ?></td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td><strong>$<?= $ship ?></strong></td>
                                        </tr>
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td><strong>$<?= $subtotal + $ship ?></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment_method">
                                <div class="panel-default">
                                    <input id="payment" name="payment_method" type="radio" value="cash" data-target="createp_account">
                                    <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">Cash</label>

                                    <div id="method" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                            <p>Cash on delivery</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-default">
                                    <input id="payment_defult" name="payment_method" type="radio" value="online" data-target="createp_account">
                                    <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">Online Payment<img src="assets/img/icon/papyel.png" alt=""></label>

                                    <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                        <div class="card-body1">
                                            <p>Pay via Cards or online options</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="order_button">
                                    <button type="submit">Proceed to Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>