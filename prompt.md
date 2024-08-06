# Email Sending API

This project provides an API for sending transactional emails using Laravel. It validates the email data and sends the email using the built-in Mail functionality.

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [API Documentation](#api-documentation)
- [Testing](#testing)
- [License](#license)

## Requirements

- PHP 7.4 or higher
- Composer
- Laravel 8 or higher

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/email-sending-api.git
    cd email-sending-api
    ```

2. Install the dependencies:
    ```bash
    composer install
    ```

3. Set up the environment variables:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Configure your email service in the `.env` file:
    ```
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS="hello@example.com"
    MAIL_FROM_NAME="${APP_NAME}"
    ```

5. Run the migrations (if you have any):
    ```bash
    php artisan migrate
    ```

## Usage

### Sending an Email

To send an email, make a POST request to the `/send-email` endpoint with the following JSON body:

```json
{
    "to": "recipient@example.com",
    "recipientName": "John Doe",
    "introText": "Hello,",
    "mainOfferTitle": "Special Offer",
    "mainOfferDetails": "Get 50% off on all items.",
    "additionalDetails": "Offer valid till the end of the month.",
    "ctaLink": "http://example.com",
    "ctaText": "Shop Now",
    "closingText": "Best regards,",
    "senderName": "Jane Doe",
    "senderTitle": "Marketing Manager",
    "senderContact": "jane@example.com",
    "psText": "Don't miss out!",
    "companyName": "Example Inc.",
    "companyAddress": "123 Example St, City, Country",
    "unsubscribeLink": "http://example.com/unsubscribe",
    "socialMediaLinks": "http://example.com/social"
}
