<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Details</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header bg-primary text-white">
        <h4>User Details</h4>
      </div>
      <div class="card-body">
        @if(isset($message))
          <p>{{ $message }}</p>
        @else
          <p><strong>Payment Status:</strong> {{ $payment_status == 1 ? 'Active' : 'Inactive' }}</p>
          <p><strong>Subscription Period:</strong> {{ $subscription_period }} months</p>
          <p><strong>Payment Date:</strong> {{ $payment_date }}</p>
        @endif
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
