<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Braintree-Demo</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div class="container">
     <div class="row" style="padding: 35px 1rem;">
      <div class="col-md-8 col-md-offset-2" style="top: 0.7rem;">
      <h2>$ {{session()->get('money')}} Dollar to Infaq  </h2>
      </div>
       <div class="col-md-8 col-md-offset-2">
         <div id="dropin-container"></div>
         <button id="submit-button">Request payment method </button>
       </div>
     </div>
  </div>
  <script>
    var button = document.querySelector('#submit-button');

    braintree.dropin.create({
      authorization: "{{ Braintree_ClientToken::generate() }}",
      container: '#dropin-container'
    }, function (createErr, instance) {
      button.addEventListener('click', function () {

        instance.requestPaymentMethod(function (err, payload) {
          $.get('{{ route('payment.process') }}', {payload}, function (response) {
            if (response.success) {
              
              alert("Thank You for Infaq, You are Awesome and may Allah reward people do good deeds, amin!");
              window.location.href =  "/pay_complete";
            } else {
              alert('Payment failed');
            }
          }, 'json');
        });

      });
    });
  </script>
</body>
</html>