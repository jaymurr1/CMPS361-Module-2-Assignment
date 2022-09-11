<?php
// set default values
    if (!isset($product_description)) { $product_description = '';}
    if (!isset($list_price)) { $list_price = '';}
    if (!isset($discount_percent)) { $discount_percent = '';}

?>

<html>
    <head>
        <title>Great Game Sales </title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <main>
            <h1>Pricing Guide for Retro Games</h1>
            <?php if (!empty($error_message)) { ?>
                <p class="error"><?php echo $error_message; ?></p>
                <?php } //end if statement ?>

                <form action="gamediscount.php" method="post">
                    <div id="data">
                        <!---product description--->
                        <label>Product Description</label>
                        <input type="text" name="product_description"
                            value="<?php echo htmlspecialchars($product_description); ?>"><br>

                            <!---List Price --->
                            <label>List Price</label>
                        <input type="text" name="list_price"
                            value="<?php echo htmlspecialchars($list_price); ?>"><br>
                             <!---Discount Percentage--->
                             <label>Discount</label>
                        <input type="text" name="discount_percent"
                            value="<?php echo htmlspecialchars($discount_percent); ?>">
                        <span>%</span>
                    </div>
                    <div id="buttons">
                        <label>&nbsp;</label>
                        <input type="submit" value="Calculate"><br>
                        
                </form>
        </main>
     </body>
 </html>