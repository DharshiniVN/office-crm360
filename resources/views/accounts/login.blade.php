<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Accounts Login</title>
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #e8edff, #cfd8ff);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .auth-container {
      background: white;
      padding: 40px 45px;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.08);
      width: 100%;
      max-width: 400px;
      text-align: center;
      animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(10px);}
      to {opacity: 1; transform: translateY(0);}
    }

    .auth-container h2 {
      color: #1e2a78;
      margin-bottom: 25px;
      font-weight: 700;
      font-size: 24px;
    }

    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #d0d7ff;
      border-radius: 8px;
      font-size: 15px;
      outline: none;
      transition: 0.2s;
    }

    input:focus {
      border-color: #4a6cf7;
      box-shadow: 0 0 4px rgba(74,108,247,0.4);
    }

    button {
      width: 100%;
      background: #4a6cf7;
      color: white;
      border: none;
      padding: 12px;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      margin-top: 15px;
      transition: 0.3s;
    }

    button:hover {
      background: #3451db;
    }

    .auth-footer {
      margin-top: 15px;
      font-size: 14px;
      color: #555;
    }

    .auth-footer a {
      color: #4a6cf7;
      font-weight: 600;
      text-decoration: none;
    }

    .message {
      margin-bottom: 10px;
      font-size: 14px;
    }
    .message.error { color: red; }
    .message.success { color: green; }
  </style>
</head>
<body>

  <div class="auth-container">
      <h2>Accounts Login</h2>

      @if(session('error'))
        <p class="message error">{{ session('error') }}</p>
      @endif

      @if(session('success'))
        <p class="message success">{{ session('success') }}</p>
      @endif

      <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <input type="text" name="username" placeholder="Enter Username" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit">Login</button>
      </form>

      <div class="auth-footer">
        Don’t have an account?
        <a href="{{ route('register') }}">Register here</a>
      </div>
  </div>

</body>
</html>
