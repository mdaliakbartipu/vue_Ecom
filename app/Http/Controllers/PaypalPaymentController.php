<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paypalpayment;

class PaypalPaymentController extends Controller
{


    public function __construct($info = null)
    {
        // $info will be an array
        // $info  must have shipping property
        if (is_array($info)) :
            
            $this->shippingAddress = Paypalpayment::shippingAddress();
            
            $this->shippingAddress->setLine1($info['shipping']->line1??null)
                            ->setLine2($info['shipping']->line2??null)
                            ->setCity($info['shipping']->city??null)
                            ->setState($info['shipping']->state??null)
                            ->setPostalCode($info['shipping']->post??null)
                            ->setCountryCode($info['shipping']->country??null)
                            ->setPhone($info['shipping']->phone??null)
                            ->setRecipientName($info['shipping']->recipient??null);
        endif;
    }

    public function paywithPaypal(Request $info)
    {
        // dd($info->all());
        // dd((new Paypalpayment));
        // ### Address
        // Base Address object used as shipping or billing
        // address in a payment. [Optional]
        $shippingAddress = Paypalpayment::shippingAddress();

        $shippingAddress->setLine1("3909 Witmer Road")
        ->setLine2("Niagara Falls")
        ->setCity("Niagara Falls")
        ->setState("NY")
        ->setPostalCode("14305")
        ->setCountryCode("US")
        ->setPhone("716-298-1822")
        ->setRecipientName("Jhone");

        // ### Payer
        // A resource representing a Payer that funds a payment
        // Use the List of `FundingInstrument` and the Payment Method
        // as 'credit_card'
        $payer = Paypalpayment::payer();
        $payer->setPaymentMethod("paypal");

        $item1 = Paypalpayment::item();

        $item1->setName('Ground Coffee 40 oz')
            ->setDescription('Ground Coffee 40 oz')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setTax(0.3)
            ->setPrice(7.50);

        $item2 = Paypalpayment::item();

        $item2->setName('Granola bars')
            ->setDescription('Granola Bars with Peanuts')
            ->setCurrency('USD')
            ->setQuantity(5)
            ->setTax(0.2)
            ->setPrice(2);


        $itemList = Paypalpayment::itemList();
        $itemList->setItems([$item1, $item2])
            ->setShippingAddress($shippingAddress);


        $details = Paypalpayment::details();
        $details->setShipping("1.2")
            ->setTax("1.3")
            //total of items prices
            ->setSubtotal("17.5");

        //Payment Amount
        $amount = Paypalpayment::amount();
        $amount->setCurrency("USD")
            // the total is $17.8 = (16 + 0.6) * 1 ( of quantity) + 1.2 ( of Shipping).
            ->setTotal("20")
            ->setDetails($details);

        // ### Transaction
        // A transaction defines the contract of a
        // payment - what is the payment for and who
        // is fulfilling it. Transaction is created with
        // a `Payee` and `Amount` types

        $transaction = Paypalpayment::transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

        // ### Payment
        // A Payment Resource; create one using
        // the above types and intent as 'sale'

        $redirectUrls = Paypalpayment::redirectUrls();
        $redirectUrls->setReturnUrl(url("/paypal/success"))
            ->setCancelUrl(url("/paypal/fails"));

        $payment = Paypalpayment::payment();

        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);

        try {
            // ### Create Payment
            // Create a payment by posting to the APIService
            // using a valid ApiContext
            // The return object contains the status;
            $payment->create(Paypalpayment::apiContext());
        } catch (\PPConnectionException $ex) {
            return response()->json(["error" => $ex->getMessage()], 400);
        }
        return redirect($payment->getApprovalLink());
        // return response()->json([$payment->toArray(), 'approval_url' => $payment->getApprovalLink()], 200);
    }

}
