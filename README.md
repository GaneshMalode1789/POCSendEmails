# Email API Documentation

## Overview
This API allows you to send transactional emails by providing the necessary details in the request payload.

## Endpoint
`POST /send-email`

## Request
### Headers
- `Content-Type: application/json`

### Body Parameters
| Parameter          | Type   | Description                                      | Required |
|--------------------|--------|--------------------------------------------------|----------|
| `to`               | string | The recipient's email address                    | Yes      |
| `recipientName`    | string | The recipient's name                             | Yes      |
| `introText`        | string | Introduction text for the email                  | Yes      |
| `mainOfferTitle`   | string | Title of the main offer                          | Yes      |
| `mainOfferDetails` | string | Details of the main offer                        | Yes      |
| `additionalDetails`| string | Additional details about the offer               | Yes      |
| `ctaLink`          | string | Call-to-action link (must be a valid URL)        | Yes      |
| `ctaText`          | string | Call-to-action text                              | Yes      |
| `closingText`      | string | Closing text for the email                       | Yes      |
| `senderName`       | string | Name of the sender                               | Yes      |
| `senderTitle`      | string | Title of the sender                              | Yes      |
| `senderContact`    | string | Contact information of the sender                | Yes      |
| `psText`           | string | Postscript text                                  | Yes      |
| `companyName`      | string | Name of the company                              | Yes      |
| `companyAddress`   | string | Address of the company                           | Yes      |
| `unsubscribeLink`  | string | Unsubscribe link (must be a valid URL)           | Yes      |
| `socialMediaLinks` | string | Social media links                               | Yes      |

### Example Request
```json
{
    "to": "recipient@example.com",
    "recipientName": "John Doe",
    "introText": "Welcome to our service!",
    "mainOfferTitle": "Special Offer",
    "mainOfferDetails": "Get 50% off on your first purchase.",
    "additionalDetails": "Limited time offer.",
    "ctaLink": "https://example.com",
    "ctaText": "Shop Now",
    "closingText": "Best regards,",
    "senderName": "Jane Smith",
    "senderTitle": "Marketing Manager",
    "senderContact": "jane.smith@example.com",
    "psText": "P.S. Don’t miss out!",
    "companyName": "Example Inc.",
    "companyAddress": "123 Example Street, Example City, EX 12345",
    "unsubscribeLink": "https://example.com/unsubscribe",
    "socialMediaLinks": "Facebook | Twitter | Instagram"
}

