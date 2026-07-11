<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Status Update - Desert Rose</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f5f5f5; margin: 0; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        
        <!-- Header -->
        <div style="background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%); padding: 30px; text-align: center;">
            <h1 style="color: #ffffff; margin: 0; font-size: 28px;">Review Status Update</h1>
        </div>

        <!-- Content -->
        <div style="padding: 30px;">
            <p style="font-size: 18px; margin-bottom: 20px;">Dear {{ $review->name }},</p>
            
            <p style="font-size: 16px; margin-bottom: 20px;">
                We wanted to inform you that your review for <strong>Desert Rose Herbal Bazaar</strong> has been reviewed and is currently pending approval.
            </p>

            <!-- Review Details -->
            <div style="background-color: #f3f4f6; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                <h3 style="margin: 0 0 10px 0; color: #374151;">Your Review:</h3>
                <div style="margin-bottom: 10px;">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $review->rating)
                            <span style="color: #f59e0b; font-size: 20px;">★</span>
                        @else
                            <span style="color: #d1d5db; font-size: 20px;">★</span>
                        @endif
                    @endfor
                </div>
                <p style="font-style: italic; margin: 0; color: #4b5563;">"{{ $review->comment }}"</p>
            </div>

            <p style="font-size: 16px; margin-bottom: 20px;">
                Our team carefully reviews all submissions to ensure they meet our community guidelines. Your review is currently being reviewed, and we will notify you once a decision has been made.
            </p>

            <p style="font-size: 16px; margin-bottom: 20px;">
                If you have any questions or concerns, please don't hesitate to contact us.
            </p>

            <!-- CTA Button -->
            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ url('/contact') }}" style="display: inline-block; padding: 15px 30px; background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%); color: #ffffff; text-decoration: none; border-radius: 25px; font-weight: bold; font-size: 16px;">
                    Contact Us
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div style="background-color: #f9fafb; padding: 20px; text-align: center; border-top: 1px solid #e5e7eb;">
            <p style="margin: 0; color: #6b7280; font-size: 14px;">
                Desert Rose Herbal Bazaar<br>
                Sheraton Road, Hurghada, Egypt<br>
                <a href="mailto:info@desertrose.com" style="color: #f59e0b; text-decoration: none;">info@desertrose.com</a>
            </p>
        </div>
    </div>
</body>
</html>
