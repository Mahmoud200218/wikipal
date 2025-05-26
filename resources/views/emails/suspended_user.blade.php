<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Suspended</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f4;">
    <table align="center" width="100%" cellpadding="0" cellspacing="0" style="max-width: 640px; background-color: #ffffff; margin: 40px auto; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 25px rgba(0,0,0,0.1);">
        <!-- Header -->
        <tr style="background-color: #b71c1c;">
            <td style="padding: 30px; text-align: center;">
                <h1 style="margin: 0; font-size: 28px; color: #ffffff;">WikiPal</h1>
                <p style="margin: 5px 0 0; font-size: 14px; color: #ffcccc;">Account Suspension Notice</p>
            </td>
        </tr>

        <!-- Body -->
        <tr>
            <td style="padding: 30px;">
                <h2 style="color: #c0392b;">🚫 Your account has been suspended</h2>
                <p style="color: #555;">Dear {{ $user->name }},</p>
                <p style="color: #555;">We regret to inform you that your account on <strong>WikiPal</strong> has been suspended due to a violation of our platform's guidelines.</p>
                <p style="color: #555;">Please find your account details below:</p>

                <table width="100%" cellpadding="8" cellspacing="0" style="margin-top: 20px; background-color: #fce4ec; border-radius: 6px;">
                    <tr>
                        <td style="font-weight: bold; color: #b71c1c; width: 120px;">Name:</td>
                        <td style="color: #333;">{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; color: #b71c1c;">Email:</td>
                        <td style="color: #333;">{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; color: #b71c1c;">Status:</td>
                        <td style="color: #d32f2f;"><strong>Suspended</strong></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; color: #b71c1c;">Reports:</td>
                        <td style="color: #333;">
                            <div style="padding: 10px 15px; background-color: #ffffff; border: 1px solid #e0e0e0; border-radius: 5px;">
                                {{ $user->reports }}
                            </div>
                        </td>
                    </tr>
                </table>

                <p style="margin-top: 30px; color: #666;">
                    If you believe this is a mistake or would like to appeal, please contact our support team through the official channel.
                </p>
            </td>
        </tr>

        <!-- Footer -->
        <tr style="background-color: #f1f1f1;">
            <td style="padding: 20px; text-align: center; font-size: 13px; color: #888;">
                This message was sent automatically from the <strong>WikiPal</strong> platform. Do not reply to this email.<br>
                © {{ now()->year }} WikiPal – All rights reserved.
            </td>
        </tr>
    </table>
</body>
</html>
