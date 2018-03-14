<?php
    function displayResults() {
        global $items;
        
        if(isset($items)) {
            echo "<table class = 'table'>";
            foreach ($items as $item) {
                $itemName = $item['name'];
                $itemPrice = $item['salePrice'];
                $itemImage = $item['thumbnailImage'];
                $itemId = $item['itemId'];
                
                //Display item as table row
                echo '<tr>';
                echo "<td><img src ='$itemImage'></td>";
                echo "<td><h4>$itemName</h4></td>";
                echo "<td><h4>$itemPrice</h4></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }
?>