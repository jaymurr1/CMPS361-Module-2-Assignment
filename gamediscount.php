<?php
    //capture form data
    $product_description = filter_input(INPUT_POST, 'product_description');
    $list_price = filter_input(INPUT_POST, 'list_price', FILTER_VALIDATE_FLOAT);
    $discount_percent = filter_input(INPUT_POST, 'discount_percent', FILTER_VALIDATE_INT);
    
    //validate data
    $error_message = ''; //baseline value
    if (empty($product_description)) {
        $error_message .= 'I need to know what the name of your game is. Cmon breh<br>';
    }

    //validate list priuce
    if ($list_price === FALSE) {
        $error_message .= 'Price must be a valid number.<br>';
    } else if ($list_price <= 0) {
            $error_message .= 'Price must be greater than zero.<br>';
    
    }

    //validate discount percent

    if ($discount_percent === FALSE) {
        $error_message .= 'Discount percent must be a valid whole number.<br>';
    } else if ($discount_percent <= 0) {
            $error_message .= 'Discount percent must be greater than zero.<br>';
    
    }

    if ($error_message != '') {
        include('main.php');
        exit();
    }


    //Calculate discount
    $discount = $list_price * $discount_percent * .01;
    $discount_price = $list_price - $discount;

    //sales tax
    define('SALES_TAX_PERCENT', 8);
    $sales_tax = $discount_price * SALES_TAX_PERCENT * .01;

    //sales total

    $sales_total = $discount_price + $sales_tax;

    //format!!!
    $list_price_formatted = "$".number_format($list_price, 2);
    $discount_percent_formatted = $discount_percent."%";
    $discount_formatted = "$".number_format($discount, 2);
    $discount_price_formatted = "$".number_format($discount_price, 2);
    $sales_tax_percent_formatted = SALES_TAX_PERCENT."%";
    $sales_tax_formatted = "$".number_format($sales_tax, 2);
    $sales_total_formatted = "$".number_format($sales_total, 2);
    


?>
<html>
    <head>
        <title>Great Game Sales</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <main>
            <h1>Retro Game Price Evaluator</h1>

            <label>Product Description:</label>
            <span><?php echo htmlspecialchars($product_description); ?></span><br>

            <label>List Price:</label>
            <span><?php echo htmlspecialchars($list_price_formatted); ?></span><br>



            <label>Standard Discount:</label>
            <span><?php echo htmlspecialchars($discount_percent_formatted); ?></span><br>

            <label>Discount Amount:</label>
            <span><?php echo $discount_formatted; ?></span><br>

            <label>Discount Price:</label>
            <span><?php echo $discount_price_formatted; ?></span><br>

            <br>

            <label>Sales Tax Rate:</label>
            <span><?php echo $sales_tax_percent_formatted; ?></span><br>

            <label>Sales Tax Amount:</label>
            <span><?php echo $sales_tax_formatted; ?></span><br>

            <label>Sales Total:</label>
            <span><?php echo $sales_total_formatted; ?></span><br>
</main>
</body>
</html>

 
            
            