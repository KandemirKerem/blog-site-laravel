<div style="font-family: sans-serif; padding: 20px; border: 1px solid #eee;">
    <h2>Yeni Bir Mesajın Var!</h2>
    <p><strong>Gönderen:</strong> {{ $formData['name'] }}</p>
    <p><strong>E-posta:</strong> {{ $formData['email'] }}</p>
    <hr>
    <p><strong>Mesaj:</strong></p>
    <p>{{ $formData['message'] }}</p>
</div>
