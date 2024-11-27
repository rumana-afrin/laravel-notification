<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 20px;
            text-align: center;
        }

        .email {
            width: 75%;
            padding: 20px;
            background-color: #fcfcfc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(142, 255, 117, 0.575);
        }
        a{
            color: #1ea9e2;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <section>
        <div class="email">
            <div class="email-header">
                <h2>Verify Your Email Address</h2>
            </div>
            <div class="email-subheading">
                @if (session('message') && session('user_email'))
                    <div class="alert alert-success">
                        {{ session('message') }} <b>{{ session('user_email') }}</b>
                    </div>
                @endif
            </div>

            <div class="verify-info">

                <p>Please check your email inbox and follow the instructions to complete the verification process.</p>
            </div>

            <div class="dont-get">
                <p>Don't receive the email? Check your spam folder or Resend</p>

                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <input type="email" name="email" placeholder="Enter your email address" required>
                    <button type="submit">Resend</button>
                </form>
            </div>
            <div class="help mt-2">
                <h3>Need Help? <a href="javascript:void(0)">Contact Us</a></h3>
            </div>
        </div>
    </section>





</body>

</html>
