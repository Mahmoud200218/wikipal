<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Contact Request</title>
</head>

<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f4;">
    <table align="center" width="100%" cellpadding="0" cellspacing="0" style="max-width: 640px; background-color: #ffffff; margin: 40px auto; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 25px rgba(0,0,0,0.1);">
        <!-- Header -->
        <tr style="background-color: #1b1f3b;">
            <td style="padding: 30px; text-align: center;">
                <h1 style="margin: 0; font-size: 28px; color: #ffffff;">WikiPal</h1>
                <p style="margin: 5px 0 0; font-size: 14px; color: #cccccc;">Your Trusted News and Insights Platform</p>
            </td>
        </tr>

        <!-- Body -->
        <tr>
            <td style="padding: 30px;">
                <h2 style="color: #2c3e50;">📬 New Contact Request Received</h2>
                <p style="color: #555;">A new contact message has been submitted via the platform. Below are the details:</p>

                <table width="100%" cellpadding="8" cellspacing="0" style="margin-top: 20px; background-color: #f9f9f9; border-radius: 6px;">
                    <tr>
                        <td style="font-weight: bold; color: #1b1f3b; width: 120px;">Name:</td>
                        <td style="color: #333;">{{ $contact->user->name }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; color: #1b1f3b;">Email:</td>
                        <td style="color: #333;">{{ $contact->user->email }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; color: #1b1f3b;">Subject:</td>
                        <td style="color: #333;">{{ $contact->subject }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; color: #1b1f3b;">Message:</td>
                        <td style="color: #333;">
                            <div style="padding: 10px 15px; background-color: #ffffff; border: 1px solid #e0e0e0; border-radius: 5px;">
                                {{ $contact->message }}
                            </div>
                        </td>
                    </tr>
                </table>

                <p style="margin-top: 30px; color: #666;">Please review the message and respond accordingly.</p>
            </td>
        </tr>

        <!-- Footer -->
        <tr style="background-color: #f1f1f1;">
            <td style="padding: 20px; text-align: center; font-size: 13px; color: #888;">
                This email was sent automatically from the <strong>WikiPal</strong> platform. Please do not reply to it.<br>
                © {{ now()->year }} WikiPal – All rights reserved.
            </td>
        </tr>
    </table>
</body>

</html>