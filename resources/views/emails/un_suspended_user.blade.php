<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Account Reactivated</title>
</head>

<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f4;">
    <table align="center" width="100%" cellpadding="0" cellspacing="0" style="max-width: 640px; background-color: #ffffff; margin: 40px auto; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 25px rgba(0,0,0,0.1);">
        <!-- Header -->
        <tr style="background-color: #2e7d32;">
            <td style="padding: 30px; text-align: center;">
                <h1 style="margin: 0; font-size: 28px; color: #ffffff;">WikiPal</h1>
                <p style="margin: 5px 0 0; font-size: 14px; color: #c8e6c9;">Account Reactivation Notice</p>
            </td>
        </tr>

        <!-- Body -->
        <tr>
            <td style="padding: 30px;">
                <h2 style="color: #388e3c;">✅ Your account has been reactivated</h2>
                <p style="color: #555;">Dear {{ $user->name }},</p>
                <p style="color: #555;">We're pleased to inform you that your <strong>WikiPal</strong> account has been successfully reactivated and is now fully functional.</p>
                <p style="color: #555;">Here are your account details:</p>

                <table width="100%" cellpadding="8" cellspacing="0" style="margin-top: 20px; background-color: #e8f5e9; border-radius: 6px;">
                    <tr>
                        <td style="font-weight: bold; color: #2e7d32; width: 120px;">Name:</td>
                        <td style="color: #333;">{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; color: #2e7d32;">Email:</td>
                        <td style="color: #333;">{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; color: #2e7d32;">Status:</td>
                        <td style="color: #2e7d32;"><strong>Active</strong></td>
                    </tr>
                </table>

                <p style="margin-top: 30px; color: #666;">
                    You can now log in and continue using the platform as usual. If you have any questions or need further assistance, feel free to reach out to our support team.
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