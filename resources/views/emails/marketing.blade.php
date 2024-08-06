<!-- resources/views/emails/marketing.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Marketing Email</title>
</head>
<body>
    <p>Hi {{ $recipientName }},</p>

    <p>{{ $introText }}</p>

    <h3>{{ $mainOfferTitle }}</h3>
    <p>{{ $mainOfferDetails }}</p>

    <p>{{ $additionalDetails }}</p>

    <p><a href="{{ $ctaLink }}" style="background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none;">{{ $ctaText }}</a></p>

    <p>{{ $closingText }}</p>

    <p>Best regards,<br>
    {{ $senderName }}<br>
    {{ $senderTitle }}<br>
    {{ $senderContact }}</p>

    <p>P.S. {{ $psText }}</p>

    <footer>
        <p>{{ $companyName }} | {{ $companyAddress }} | <a href="{{ $unsubscribeLink }}">Unsubscribe</a> | {{ $socialMediaLinks }}</p>
    </footer>
</body>
</html>
