<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-posta Adresinizi Doğrulayın - NovaBlog</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f1f5f9;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: #334155;
            -webkit-font-smoothing: antialiased;
        }
        table {
            border-spacing: 0;
        }
        td {
            padding: 0;
        }
        img {
            border: 0;
        }
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f1f5f9;
            padding: 40px 0;
        }
        .main-container {
            max-width: 580px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.06);
            border: 1px solid #e2e8f0;
        }
        .header {
            background-color: #0f172a;
            padding: 32px 40px;
            text-align: center;
        }
        .logo-badge {
            display: inline-block;
            background-color: #4f46e5;
            color: #ffffff;
            width: 44px;
            height: 44px;
            line-height: 44px;
            border-radius: 12px;
            font-size: 22px;
            font-weight: 800;
            text-align: center;
            vertical-align: middle;
            margin-right: 8px;
        }
        .logo-text {
            color: #ffffff;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.5px;
            vertical-align: middle;
            display: inline-block;
        }
        .content {
            padding: 40px;
        }
        .greeting {
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 16px;
        }
        .text {
            font-size: 15px;
            line-height: 1.65;
            color: #475569;
            margin-bottom: 24px;
        }
        .button-wrapper {
            text-align: center;
            margin: 32px 0;
        }
        .btn {
            display: inline-block;
            background-color: #4f46e5;
            color: #ffffff !important;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            padding: 14px 36px;
            border-radius: 12px;
            box-shadow: 0 4px 14px rgba(79, 70, 229, 0.35);
        }
        .info-box {
            background-color: #f8fafc;
            border-left: 4px solid #4f46e5;
            padding: 16px;
            border-radius: 8px;
            margin: 28px 0;
            font-size: 13px;
            color: #64748b;
            line-height: 1.5;
        }
        .fallback-link {
            font-size: 12px;
            color: #94a3b8;
            word-break: break-all;
            line-height: 1.5;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #f1f5f9;
        }
        .fallback-link a {
            color: #4f46e5;
            text-decoration: underline;
        }
        .footer {
            background-color: #f8fafc;
            padding: 24px 40px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            font-size: 13px;
            color: #94a3b8;
        }
        .footer a {
            color: #64748b;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <center class="wrapper">
        <table class="main-container" width="100%">
            <!-- Header -->
            <tr>
                <td class="header">
                    <span class="logo-badge">N</span>
                    <span class="logo-text">NovaBlog</span>
                </td>
            </tr>

            <!-- Content -->
            <tr>
                <td class="content">
                    <div class="greeting">Merhaba {{ $user->name }}, Hoş Geldiniz! 👋</div>
                    <p class="text">
                        NovaBlog topluluğuna katıldığınız için teşekkür ederiz. Hesabınızı güvenle aktifleştirmek, yazılarınızı paylaşmak ve içerikleri keşfetmek için lütfen e-posta adresinizi doğrulayın.
                    </p>

                    <!-- CTA Button -->
                    <div class="button-wrapper">
                        <a href="{{ $url }}" target="_blank" class="btn">
                            E-posta Adresimi Doğrula
                        </a>
                    </div>

                    <!-- Security Notice Box -->
                    <div class="info-box">
                        Bu doğrulama bağlantısı <strong>60 dakika</strong> boyunca geçerlidir.<br>
                        NovaBlog'da siz hesap oluşturmadıysanız, bu e-postayı dikkate almayınız.
                    </div>
                </td>
            </tr>

            <!-- Footer -->
            <tr>
                <td class="footer">
                    <p style="margin: 0 0 8px 0;">© {{ date('Y') }} NovaBlog. Tüm hakları saklıdır.</p>
                    <p style="margin: 0; color: #64748b;">
                        nova-blog.com
                    </p>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>
