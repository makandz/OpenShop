<?php
    use PayPal\Api\Payer;
    use PayPal\Api\Item;
    use PayPal\Api\ItemList;
    use PayPal\Api\Details;
    use PayPal\Api\Amount;
    use PayPal\Api\Transaction;
    use PayPal\Api\RedirectUrls;
    use PayPal\Api\Payment;

    $path = "..";
    $pass['title'] = "OpenShop - Checkout";
    $pass['desc'] = "Checkout process for OpenShop.";
    $page = "secure/checkout";

    require_once "models/main.php";

    require "${path}/secure/app.php";

    if (isset($_GET['id']) && $_GET['id'])
        $_ID = cleanValue($_GET['id'], true, false, false);
    else
        $_ID = false;

    if (!$_ID) {
        echo "Invalid link, return to the previous page and try again.";
        die();
    }

    $payer = new Payer();
    $payer->setPaymentMethod('paypal');

    $item = new Item();
    $item->setName($v_itemInfo['name'])
        ->setCurrency('USD')
        ->setQuantity(1)
        ->setPrice($v_itemInfo['cost']);

    $itemList = new ItemList();
    $itemList->setItems([$item]);

    $details = new Details();
    $details->setShipping(0)
        ->setSubtotal($v_itemInfo['cost']);
    
    $amount = new Amount();
    $amount->setCurrency('USD')
        ->setTotal($v_itemInfo['cost'])
        ->setDetails($details);

    $amount = new Amount();
    $amount->setCurrency('USD')
        ->setTotal($v_itemInfo['cost'])
        ->setDetails($details);

    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription($v_itemInfo['desc'])
        ->setInvoiceNumber(uniqid());

    $redirectUrls = new RedirectUrls();
    $redirectUrls->setReturnUrl()
        ->setCancelUrl();

    $payment = new Payment();
    $payment->setIntent('sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions([$transaction]);

    try {
        $payment->create($paypal);
    } catch (Exception $e) {
        echo "An error occured while creating the payment, contact support for help.";
        exit;
    }

    $approvalUrl = $payment->getApprovalLink();
    header("Location: {$approvalUrl}");

?>