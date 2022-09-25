<!--
 API Documentation HTML Template  - 1.0.0
 Copyright © 2022 KwachaCredit
 Licensed under the MIT license.
 https://github.com/chandachewe10/kwacha-credit-Standard-API.git
 !-->
 <?php

if ($_SERVER['REQUEST_METHOD']=="POST") {
    //PAYMENT REQUEST FROM A CUSTOMER
    //Open cURL Session for requesting payment from a customer
    $PaymentRequest = curl_init();
    $amount=$_POST['amount'];
    $phone=$_POST['phone'];
    $ref=$_POST['referenceNumber'];

    curl_setopt_array($PaymentRequest, array(

      CURLOPT_URL => 'https://kwachacredit.com/api/api_testing',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
   "amount": '.json_encode($amount).',
   "currency": "EUR",
   "externalId": '.json_encode($ref).',
   "payer": {
     "partyIdType": "MSISDN",
     "partyId": '.json_encode($phone).'
   },
   "payerMessage": "Paying For a Novel",
   "payeeNote": "Payment Successfull"
 }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: Bearer .......'
      ),
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_SSL_VERIFYHOST => false,
    ));

    $response = curl_exec($PaymentRequest);
    echo "Payment Status : $response.<br>";

    //Close cURL Session for making Payment From A customer
    curl_close($PaymentRequest);
}
 ?>
 
 
 
 <!-- INITIALISNG PAYMENT FROM A CUSTOMER FROM CLIENT SIDE-->
 
 <!DOCTYPE html>
 
 <head>
     <title>cURL-PHP MOMO API</title>
     <meta charset="utf-8" />
     <meta name="developer" content="Chanda Chewe" />
     <meta name="description" content="MTN MoMoAPI Client Side" />
     <meta name="revised" content="16/09/2021" />
     <meta name="viewport" content="width=device-width,initial-scale=1.0" />
 
   </head>
 
 <body>
<style>
     body {
        font-family: Arial, Helvetica, sans-serif;
       font-weight:bold;
       font-size:small;
       background-color:#ccc;
           
    }
        #name{
            width:90%;
                        padding:12px 20px;
                        margin:8px 0;
                        display:inline-block;
                        border:1px solid #ccc;
                        box-sizing:border-box;  
        }
#submit{
    background-color:#4CAF50;
                        color:white;
                        padding:14px 20px;
                        margin:8px 0;
                        border:none;
                        width:70%;
                        cursor:pointer;
}
form{
    border: 3px solid #f1f1f1;
                margin-top: 10px;
                width: 30%;
                background-color: #f1f1f1;  
                margin-bottom:20px;          
                        
}
@media screen and (max-width:1025px) {
            form{
                        border:3px solid #f1f1f1;
                        margin-top:10px;
                        width:90%;
            }
        }
</style>




     <center>
       
         
   <form action="<?PHP echo ($_SERVER['PHP_SELF']); ?>";  method="POST">
     <h3>KwachaCredit API</h3>
     <h4>COLLECTIONS</h4>
         <input type="number" name="amount" id="name" placeholder="Enter Amount" ></br>
         <input type="number" name="phone" id="name" placeholder="Enter phone number"></br>
         <input type="number" name="referenceNumber" id="name" placeholder="Enter Reference Number"></br>
         <input type="submit" value="ZMW" id="submit">
         <br><br>
         
         </form>
         <!--notes-->
         <small style="color:blue">Please note that your reference number should be a readonly registered mobile money number you used during registration. It is however recommendated to hide this field in production.</small>
       
     </center>
     
         
 </body>
 </html>
 
                
 
 
                