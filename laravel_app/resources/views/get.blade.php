<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mobile Number Form</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header bg-primary text-white">
        <h4>Enter Mobile Number</h4>
      </div>
      <div class="card-body">
        <form id="mobileNumberForm">
          <div class="form-group">
            <label for="mobileNumber">Mobile Number</label>
            <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" placeholder="Enter your mobile number" required>
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <div id="result" class="mt-3"></div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#mobileNumberForm').on('submit', function(event) {
        event.preventDefault();

        var mobileNumber = $('#mobileNumber').val();

        $.ajax({
          url: '/api/check-mobile',
          method: 'POST',
          data: {
            mobileNumber: mobileNumber
          },
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {
            var result = '';
            if(response.status === 'inactive') {
              result = '<p>User is Inactive</p>';
            } else if(response.status === 'active') {
              result = '<p><strong>Payment Status:</strong> Active</p>';
              result += '<p><strong>Subscription Period:</strong> ' + response.subscription_period + ' months</p>';
              result += '<p><strong>Payment Date:</strong> ' + response.payment_date + '</p>';
            } else {
              result = '<p>Mobile number not found in the user table</p>';
            }
            $('#result').html(result);
          },
          error: function(response) {
            var result = '<p>Error: ' + response.responseJSON.message + '</p>';
            $('#result').html(result);
          }
        });
      });
    });
  </script>
</body>
</html>
