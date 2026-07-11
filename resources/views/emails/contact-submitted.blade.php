<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission - Desert Rose</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f5f5f5; margin: 0; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        
        <!-- Header -->
        <div style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); padding: 30px; text-align: center;">
            <h1 style="color: #ffffff; margin: 0; font-size: 28px;">📬 New Contact Form Submission</h1>
        </div>

        <!-- Content -->
        <div style="padding: 30px;">
            <p style="font-size: 16px; margin-bottom: 20px;">
                You have received a new message from the Desert Rose website.
            </p>

            <!-- Contact Details -->
            <div style="background-color: #fef3c7; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 8px 0; font-weight: bold; color: #92400e; width: 120px;">Name:</td>
                        <td style="padding: 8px 0; color: #78350f;">{{ $data['name'] }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px 0; font-weight: bold; color: #92400e;">Email:</td>
                        <td style="padding: 8px 0; color: #78350f;">
                            <a href="mailto:{{ $data['email'] }}" style="color: #f59e0b; text-decoration: none;">{{ $data['email'] }}</a>
                        </td>
                    </tr>
                    @if(isset($data['phone']))
                    <tr>
                        <td style="padding: 8px 0; font-weight: bold; color: #92400e;">Phone:</td>
                        <td style="padding: 8px 0; color: #78350f;">{{ $data['phone'] }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td style="padding: 8px 0; font-weight: bold; color: #92400e;">Subject:</td>
                        <td style="padding: 8px 0; color: #78350f;">{{ $data['subject'] }}</td>
                    </tr>
                </table>
            </div>

            <!-- Message -->
            <div style="background-color: #f3f4f6; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                <h3 style="margin: 0 0 10px 0; color: #374151;">Message:</h3>
                <p style="margin: 0; color: #4b5563; white-space: pre-wrap;">{{ $data['message'] }}</p>
            </div>

            <p style="font-size: 16px; margin-bottom: 20px;">
                Please respond to this inquiry as soon as possible.
            </p>
        </div>

        <!-- Footer -->
        <div style="background-color: #f9fafb; padding: 20px; text-align: center; border-top: 1px solid #e5e7eb;">
            <p style="margin: 0; color: #6b7280; font-size: 14px;">
                Desert Rose Herbal Bazaar<br>
                Sheraton Road, Hurghada, Egypt
            </p>
        </div>
    </div>
</body>
</html>
