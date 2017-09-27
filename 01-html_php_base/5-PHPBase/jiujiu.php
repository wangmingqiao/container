<?php
/**
 * @Author: WMQ
 * @Date:   2017-07-27 18:56:54
 * @Last Modified by:   WMQ
 * @Last Modified time: 2017-07-27 20:18:59
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>
<body>
<table rules="all" border="1">
        <?php
            // echo "<tr>";
            // echo "<td>";
            for ($i=1; $i <=9 ; $i++) {
                echo "<tr>";
                    //写列
                    for ($j=1; $j<=$i ; $j++) {
                        $a=$i*$j;
                        // echo "<td>{$i}×{$j}=$c</td>";
                        echo"<td style='padding:5px;font-size:10px;'>{$i}&times;{$j}={$a}</td>";
                       }
                "</tr>";
            }
            // echo"</td>";
            // echo"<td>";

            // echo "</td>";
            // echo "</tr>";


        ?>
    </table>
    <table rules="all" border="1">
        <?php
            // echo "<tr>";
            // echo "<td>";
            for ($i=9; $i >=1 ; $i--) {
                echo "<tr>";
                    //写列
                    for ($j=1; $j<=$i ; $j++) {
                        $a=$i*$j;
                        // echo "<td>{$i}×{$j}=$c</td>";
                        echo"<td style='padding:5px;font-size:10px;'>{$i}&times;{$j}={$a}</td>";
                       }
                "</tr>";
            }
            // echo"</td>";
            // echo"<td>";

            // echo "</td>";
            // echo "</tr>";


        ?>
    </table>
    <table rules="all" border="1">
        <?php
            // echo "<tr>";
            // echo "<td>";
            for ($i=1; $i <=9 ; $i++) {
                echo "<tr>";
                    //写列
                    for ($j=1; $j<=9 ; $j++) {
                        $a=$i*$j;
                        // echo "<td>{$i}×{$j}=$c</td>";
                        echo"<td style='padding:5px;font-size:10px;'>{$i}&times;{$j}={$a}</td>";
                       }
                "</tr>";
            }
            // echo"</td>";
            // echo"<td>";

            // echo "</td>";
            // echo "</tr>";


        ?>
    </table>
</body>
</html>