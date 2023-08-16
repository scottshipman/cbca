<!DOCTYPE html>
<html>
<head>
    <title>{{ $mailData['title'] }}</title>
</head>
<body>
<h1>{{ $mailData['title'] }}</h1>
<p>{{ $mailData['user']['name'] }},</p>

<p>You have successfully registered with the Crystal Beach Community
    Association for: <br>
    {{ $mailData['membership']['name'] }}<br>
    {{ $mailData['membership']['price'] }}<br>
    {{ $mailData['membership']['dates'] }}

</p><p>
    Your Order Id number is: {{ $mailData['membership']['orderId'] }}. If you
    have any issues you can contact <a href="mailto:info@crystalbeachcommunity.org">info@crystalbeachcommunity.org</a> and reference this order id.
    </p>

<p>Thank you,</p>
<p>CBCA Board</p>
</body>
</html>