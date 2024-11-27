<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @include('frontend.layout.style')<!-- added all style file link-->
    <style>
        .container {
            min-height: calc(100vh - 24px);
            ;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .register-form {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .regForm {
            min-width: 50%;
            box-shadow: rgba(111, 150, 80, 0.35) 0px 5px 15px;
            padding: 15px;
        }

        @media only screen and (max-width: 768px) {
            .regForm {
                min-width: 90%;

            }
        }

        .button {
            background-color: #4da303;
            border: none;
            color: white;
            padding: 10px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 11px;
        }

        .button:hover {
            background-color: #5dc006;
        }

        .form-control:focus {
            border-color: #4da303 !important;
            box-shadow: none !important;
        }

        .form-label {
            margin-top: 11px !important;
            margin-bottom: 0px !important;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="register-form">

            <form  action="{{ route('login.store') }}" method="POST" class="regForm">
                @csrf
                
                <div class="navbar-brand d-flex justify-content-center">
                    <img src="{{asset('assets/Bdcalling Black logo.png')}}" alt="" width="90" height="30">
                </div>

                <label for="email" class="form-label">Email</label><br>
                <input type="email" id="email" name="email" class="form-control"
                    aria-describedby="passwordHelpBlock">
                @error('login')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label for="password" class="form-label">Password</label><br>
                <input type="password" id="password" name="password" class="form-control"
                    aria-describedby="passwordHelpBlock">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div>
                    <input type="checkbox" id="chk"> <span class="form-label">show password</span>
                </div>

                <div class="d-flex justify-content-between align-items-end">
                    <button type="submit" class="button rounded-2">LOG IN</button>
                    <div>
                        <input type="checkbox" id="chk"> <span class="form-label">Remember me</span>
                    </div>
                </div>
                
            </form>
        </div>
    </div>


    @include('frontend.layout.script'); <!-- added all script file link-->
    <script>
        const pwd = document.getElementById('password');
        const chk = document.getElementById('chk');

        chk.onchange = function(e) {
            pwd.type = chk.checked ? "text" : "password";
        }
    </script>
</body>

</html>
