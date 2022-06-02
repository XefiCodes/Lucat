<?php
    include_once ('bts/connect_db.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Landing Lucat</title>
        <?php include("bts/links.php") ?>
        <link href="Styles/global.css" rel="stylesheet">
        <link href="Styles/scss/hover.css" rel="stylesheet">
        <link href="Styles/submitstyle.css" rel="stylesheet">
        <script>
            function view() {
                pic.src = URL.createObjectURL(event.target.files[0]);
            }
        </script>
    </head>
    <body>
        <?php include("bts/navbar.php") ?>
        <script>
            $(document).ready(function(){
                $('#togol').click(function(){
                    $('#ill').toggle();
                    // $('#com').toggle();
                });
            });
        </script>
        <button id="togol"><a href="submit.php">Submission Form here</a></button>
        <!-- Commissions Form -->
        <form id="com" class="query" action="comms.php" method="POST" enctype="multipart/form-data" style="border-radius:10px">
            <img id="pic" src="img/upload.png" width="50vw" height="50px" style=" margin-left : 23vw; border-style:none; " />
            <input type="file" name="image" onchange="view()" style=" margin-top: auto;" />
            <input type="text" name="title" placeholder="Title" style=" margin-left : 12vw; " required/>
            <input type="text" name="caption" placeholder="Description" style=" margin-left : 12vw; "/>
            <input type="text" name="min" placeholder="Lowest" style=" margin-left : 12vw; " required/>
            <input type="text" name="max" placeholder="Highest" style=" margin-left : 12vw; "/>
            <input type="checkbox" name="status" style=" margin-left : 12vw; " value="Artist"/> Looking for clients?
            <div class="divider">
                <div class="warning">Images should not be more than 1 MB. PNG only.</div>
                <input type="submit" name="comms">
            </div>
        </form>
        <div class="paypal_flex" style="text-align:center;">
        <div id="paypal-button-container"></div>
        </div>
        <!-- Sample PayPal credentials (client-id) are included -->
        <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD&intent=capture&enable-funding=venmo"></script>
        <script>
          const paypalButtonsComponent = paypal.Buttons({
              // optional styling for buttons
              // https://developer.paypal.com/docs/checkout/standard/customize/buttons-style-guide/
              style: {
                color: "gold",
                shape: "rect",
                layout: "vertical"
              },

              // set up the transaction
              createOrder: (data, actions) => {
                  // pass in any options from the v2 orders create call:
                  // https://developer.paypal.com/api/orders/v2/#orders-create-request-body
                  const createOrderPayload = {
                      purchase_units: [
                          {
                              amount: {
                                  value: "3.00"
                              }
                          }
                      ]
                  };

                  return actions.order.create(createOrderPayload);
              },

              // finalize the transaction
              onApprove: (data, actions) => {
                  const captureOrderHandler = (details) => {
                      const payerName = details.payer.name.given_name;
                      console.log('Transaction completed');
                  };

                  return actions.order.capture().then(captureOrderHandler);
              },

              // handle unrecoverable errors
              onError: (err) => {
                  console.error('An error prevented the buyer from checking out with PayPal');
              }
          });

          paypalButtonsComponent
              .render("#paypal-button-container")
              .catch((err) => {
                  console.error('PayPal Buttons failed to render');
              });
        </script>
        <!-- Footer -->
        <?php include("bts/footer.php") ?>
    </body>
</html>