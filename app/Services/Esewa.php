<?php

namespace App\Services;
use Illuminate\Http\Request;


class Esewa{
    public static function pay($amount, $description, $pid){
        ?>
        <html>
            <body>
         <form action="https://uat.esewa.com.np/epay/main" method="POST" id="esewa-form">
                                <input value="100" name="tAmt" type="hidden">
                                <input value="90" name="amt" type="hidden">
                                <input value="5" name="txAmt" type="hidden">
                                <input value="2" name="psc" type="hidden">
                                <input value="3" name="pdc" type="hidden">
                                <input value="EPAYTEST" name="scd" type="hidden">
                                <input value="<?php echo $pid ?>" name="pid" type="hidden">
                                <input value="http://merchant.com.np/page/esewa_payment_success?q=su" type="hidden" name="su">
                                <input value="http://merchant.com.np/page/esewa_payment_failed?q=fu" type="hidden" name="fu">
                                <!-- <input value="Submit" type="submit" id="submit"> -->
                                <p>Redirecting....</p>
                                </form> 

                                <script>
                                    document.getElementById('esewa-form').submit();
                              </script>
            </body>
        </html>
        <?php
    }
    public static function verify(Request $request){

    }
}