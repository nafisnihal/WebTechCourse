<?php
include "nav.php";
require_once 'controller/productInfo.php';

$product = fetchProduct($_GET['ID']);
echo '<p><b>Delete Product</b></p>';
echo '<p>Name: ' . $product['Name'] . '</p>';
echo '<p>Buying Price: ' . $product['Buying_Price'] . '</p>';
echo '<p>Selling: ' . $product['Selling_Price'] . '</p>';

if ($product['display']){
    $dis = 'yes';
} else{
    $dis = 'no';
}

echo '<p>Displayable: ' . $dis . '</p>';

?>
<td>
<a href="controller/deleteProduct.php?id=<?php echo $product['ID'] ?>" onclick="return confirm('Alert! You are deleting a product.')">Delete</a></td>

