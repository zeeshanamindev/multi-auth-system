<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Auth System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .welcome-box {
            background: white;
            border-radius: 20px;
            padding: 50px 60px;
            text-align: center;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: fadeIn 0.8s ease;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .logo-icon {
            font-size: 70px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 15px;
        }
        
        .welcome-box h1 {
            font-size: 32px;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 10px;
        }
        
        .welcome-box p {
            color: #718096;
            font-size: 16px;
            margin-bottom: 30px;
        }
        
        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 14px 50px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 17px;
            display: inline-block;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
            color: white;
        }
        
        .btn-login i {
            margin-right: 10px;
        }
        
        .footer-text {
            margin-top: 25px;
            color: #a0aec0;
            font-size: 13px;
        }
        
        .footer-text i {
            color: #fc8181;
        }
        
        @media (max-width: 576px) {
            .welcome-box {
                padding: 30px 25px;
                margin: 20px;
            }
            
            .welcome-box h1 {
                font-size: 24px;
            }
            
            .btn-login {
                padding: 12px 35px;
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="welcome-box">
        <!-- Icon -->
        <div class="logo-icon">
            <i class="fas fa-shield-alt"></i>
        </div>
        
        <!-- Title -->
        <h1>Multi-Auth System</h1>
        <p>Secure Role-Based Access Control</p>
        
        <!-- Login Button -->
        <a href="{{ route('login') }}" class="btn-login">
            <i class="fas fa-sign-in-alt"></i> Login
        </a>
        
        <!-- Footer -->
        <div class="footer-text">
            Built with <i class="fas fa-heart"></i> using Laravel
        </div>
    </div>
</body>
</html>