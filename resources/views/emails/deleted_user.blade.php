<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Account Deleted</title>
</head>

<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f4;">
    <table align="center" width="100%" cellpadding="0" cellspacing="0" style="max-width: 640px; background-color: #ffffff; margin: 40px auto; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 25px rgba(0,0,0,0.1);">
        <!-- Header -->
        <tr style="background-color: #263238;">
            <td style="padding: 30px; text-align: center;">
                <h1 style="margin: 0; font-size: 28px; color: #ffffff;">WikiPal</h1>
                <p style="margin: 5px 0 0; font-size: 14px; color: #b0bec5;">Account Deletion Confirmation</p>
            </td>
        </tr>

        <!-- Body -->
        <tr>
            <td style="padding: 30px;">
                <h2 style="color: #37474f;">🗑️ Your account has been deleted</h2>
                <p style="color: #555;">Dear {{ $user->name }},</p>
                <p style="color: #555;">
                    This is to confirm that your account associated with <strong>{{ $user->email }}</strong> has been permanently deleted from the <strong>WikiPal</strong> platform.
                </p>

                <p style="color: #555;">
                    All of your data, including personal details, posts, and history, has been removed in accordance with our privacy policy.
                </p>

                <p style="margin-top: 20px; color: #777;">
                    If this deletion was not authorized by you or you have any questions, please contact our support team immediately.
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