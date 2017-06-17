<center>
 
 
<?php 
include('crypto.php');
     error_reporting(0);
    // $merchant_data='aaaaaaaaa';
    // $working_key='xxxxxxxxxxxx';//Shared by CCAVENUES
    // $access_code='xxxxxxxxx';//Shared by CCAVENUES
    $merchant_data='129247';
    $working_key='234171D8EAE02E763905BA19DAF8E7D1';//Shared by CCAVENUES
    $access_code='AVWT70ED01AB83TWBA';//Shared by CCAVENUES
     

    foreach ($_POST as $key => $value){
        $merchant_data.=$key.'='.urlencode($value).'&';
    }
 

    $encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
?>
<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>