<!--
 * @Author: Hein Htet Aung
 * @Date:   2019-04-26 00:12:42
 * @Last Modified by:  root
 * @Last Modified time: 2019-05-07 13:57:39
**/
-->
<?php //check unicode or not
    $string="aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaေမာင် စိန်းထက်ေအာင်";

    if(strlen($string) != mb_strlen($string, 'utf-8'))
    { 
        echo "Please enter English words only:(";
    }
    else {
        echo "OK, English Detected!";
    }
?>