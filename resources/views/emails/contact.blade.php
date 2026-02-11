<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pesan Baru dari {{ $contact->name }}</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="color: #1e3a8a;">Pesan Baru dari Website Espacial Artwork</h2>
        
        <div style="background-color: #f9fafb; padding: 20px; border-radius: 5px; margin: 20px 0;">
            <p><strong>Nama:</strong> {{ $contact->name }}</p>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            @if($contact->phone)
            <p><strong>Telepon:</strong> {{ $contact->phone }}</p>
            @endif
            @if($contact->subject)
            <p><strong>Subjek:</strong> {{ $contact->subject }}</p>
            @endif
            <p><strong>Pesan:</strong></p>
            <p style="background-color: #fff; padding: 15px; border-left: 4px solid #1e3a8a; margin-top: 10px;">
                {{ $contact->message }}
            </p>
        </div>
        
        <p style="color: #6b7280; font-size: 14px; margin-top: 30px;">
            Pesan ini dikirim dari form kontak website Espacial Artwork pada {{ $contact->created_at->format('d F Y H:i') }}.
        </p>
    </div>
</body>
</html>
