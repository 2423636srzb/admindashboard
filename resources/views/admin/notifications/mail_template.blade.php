<!-- resources/views/admin/notifications/mail_template.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa;">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h2>{{ $subject }}</h2>
            </div>
            <div class="card-body">
                <p>Hi {{ $name }},</p>
                <p class="card-text">{{ $messages }}</p>
                <p><strong>Regards,</strong></p>
                <p>{{ $from }}</p>
            </div>
            <div class="card-footer text-center text-muted">
                <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
