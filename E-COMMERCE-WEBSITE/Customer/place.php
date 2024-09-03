<?php

include "../shared/sqlconnection.php";
include "menu.html";

$sql = "
     SELECT 
        c.cartid AS cartid,
        c.user_id AS userid,
        p.name AS product_name,
        p.price AS price,
        COUNT(c.pid) AS quantity,
        (p.price * COUNT(c.pid)) AS total_price,
        p.owner AS ownerid
    FROM 
        cart c
    JOIN 
        product p ON c.pid = p.pid
    GROUP BY 
        c.cartid, c.user_id, p.pid
    ORDER BY 
        c.cartid;
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placed Order Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h2>Placed Order Report</h2>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total=0;
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $total+=$row["total_price"];
                    echo "<tr>";
                    echo "<td>" . $row["product_name"] . "</td>";
                    echo "<td>Rs" . number_format($row["price"], 2) . "</td>";
                    echo "<td>" . $row["quantity"] . "</td>";
                    echo "<td>Rs" . number_format($row["total_price"], 2) . "</td>";
                    echo "</tr>";
                }


            } else {
                echo "<tr><td colspan='7'>No orders found</td></tr>";
            }
              


            ?>
        </tbody>
    </table>


    <?php
    $conn->close(); 
 echo "   
<span class='btn btn-warning '>Totol Price:RS $total</span> ";
    ?>
<button class='btn btn-danger w-100'>Confirm Order</button>
</body>
</html>
