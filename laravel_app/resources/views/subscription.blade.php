<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Button</title>
    <style>
        .subscription-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .subscription-button:hover {
            background-color: #0056b3;
        }

        .subscription-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .subscription-dropdown {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="subscription-container">
        <select id="subscriptionPeriod" class="subscription-dropdown">
            <option value="1" data-amount="200">1 month - $200</option>
            <option value="3" data-amount="300">3 months - $300</option>
            <option value="6" data-amount="900">6 months - $900</option>
            <option value="12" data-amount="1200">12 months - $1200</option>
        </select>
        <button class="subscription-button" onclick="showMobileInput()">Subscribe Now</button>
    </div>

    <div id="mobileInputContainer" style="display:none;">
        <input type="text" id="mobileNumber" placeholder="Enter Mobile Number">
        <button class="subscription-button" onclick="submitForm()">Submit</button>
    </div>

    <form id="paymentForm" action="{{ route('pay') }}" method="post" style="display:none;">
        @csrf
        <input type="hidden" name="subscription_period" id="subscriptionPeriodInput">
        <input type="hidden" name="mobile_number" id="mobileNumberInput">
        <input type="hidden" name="amount" id="amountInput">
    </form>

    @if($errors->any())
        <div class="error-message">
            {{ $errors->first('mobile_number') }}
        </div>
    @endif

    <script>
        function showMobileInput() {
            document.getElementById('mobileInputContainer').style.display = 'block';
        }

        function submitForm() {
            var period = document.getElementById('subscriptionPeriod').value;
            var mobileNumber = document.getElementById('mobileNumber').value;
            var amount = document.getElementById('subscriptionPeriod').selectedOptions[0].getAttribute('data-amount');

            document.getElementById('subscriptionPeriodInput').value = period;
            document.getElementById('mobileNumberInput').value = mobileNumber;
            document.getElementById('amountInput').value = amount;

            document.getElementById('paymentForm').submit();
        }
    </script>
</body>
</html>
