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

    require_once "${path}/models/main.php";

    require "${path}/secure/app.php";

    $user['email'] = $_POST['email'] ?? false;
    $user['first'] = $_POST['first'] ?? false;
    $user['last'] = $_POST['last'] ?? false;
    $user['phone'] = $_POST['phone'] ?? false;

    var_dump($user);

    if (in_array(false, $user)) {
        echo "something went wrong.";
        die();
    }

    $_SESSION['user'] = $user;

    if (!($_SESSION['cart_purchase'] ?? false)) {
        echo "error submitting order..";
        die();
    }

    $payer = new Payer();
    $payer->setPaymentMethod('paypal');

    $total = 0;
    $itemList = new ItemList();
    foreach ($_SESSION['cart_purchase'] as $a) {
        $item = new Item();
        $item->setName($a['name'])
            ->setCurrency('CAD')
            ->setQuantity($a['quantity'])
            ->setPrice($a['price'] / 100);
        $total += ($a['price'] / 100) * $a['quantity'];
        $stuff[] = $item;
    }

    $itemList->setItems($stuff);

    $details = new Details();
    $details->setShipping(0)
        ->setSubtotal($total);
    
    $amount = new Amount();
    $amount->setCurrency('CAD')
        ->setTotal($total)
        ->setDetails($details);

    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription("OpenShop order.")
        ->setInvoiceNumber(uniqid());

    $redirectUrls = new RedirectUrls();
    $redirectUrls->setReturnUrl($url . "/secure/success.php")
        ->setCancelUrl($url);

    $payment = new Payment();
    $payment->setIntent('sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions([$transaction]);

    try {
        $payment->create($paypal);
    } catch (Exception $e) {
        var_dump($e);
        echo "An error occured while creating the payment, contact support for help.";
        exit;
    }

    $approvalUrl = $payment->getApprovalLink();
    header("Location: {$approvalUrl}");

?>