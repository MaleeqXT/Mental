<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <title>Register Now</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #ffffff;
            font-family: 'Karla', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container1 {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }

        .register-section {
            width: 100%;
            height: 100vh;
            overflow: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* Fix scrollbar color for visibility */
            scrollbar-width: thin;
            scrollbar-color: black #f0f0f0;
        }

        /* Webkit Browsers */
        .register-section::-webkit-scrollbar {
            width: 12px;
            height: 12px;
        }

        .register-section::-webkit-scrollbar-thumb {
            background-color: black;
            border-radius: 10px;
        }

        .register-section::-webkit-scrollbar-track {
            background: #f0f0f0;
            border-radius: 10px;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            padding-top: 3rem;
            z-index: 9999;
        }

        .logo {
            color: #ffffff;
            font-weight: bold;
            font-size: 1.25rem;
            padding: 1rem;
            text-decoration: none;
        }

        .logo img {
            width: 10rem;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-top: 2rem;
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .form-title {
            text-align: center;
            font-size: 3rem;
            font-family: "Caveat", cursive;
            font-optical-sizing: auto;
            font-weight: 700;
            font-style: normal;
        }

        .register-form {
            display: flex;
            flex-direction: column;
            padding-top: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            padding-top: 1rem;
        }

        .form-label {
            font-size: 1.125rem;
        }

        .form-input {
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            border: 1px solid #cbd5e0;
            border-radius: 0.375rem;
            width: 100%;
            padding: 0.5rem 0.75rem;
            color: #4a5568;
            margin-top: 0.25rem;
            /* Fix focus outline */
            outline: none;
            transition: box-shadow 0.2s ease-in-out;
        }

        .form-input:focus {
            outline: none;
            /* Adjust focus box-shadow for better visibility */
            box-shadow: 0 0 10px rgba(180, 142, 64, 0.5);
        }

        .submit-button {
            background-color: #000000;
            color: #ffffff;
            font-weight: bold;
            font-size: 1.125rem;
            padding: 0.5rem;
            margin-top: 2rem;
            transition: background-color 0.2s ease-in-out;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            /* Remove font family override to keep consistency */
        }

        .submit-button:hover {
            background-color: #B48E40;
        }

        .login-link-container {
            text-align: center;
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .login-link {
            text-decoration: underline;
            font-weight: 600;
            color: #B48E40;
        }

        .image-section {
            width: 50%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            background-color: black;
        }

        .background-image {
            object-fit: cover;
            width: 100%;
            height: 100vh;
            margin-left: 2px;
            display: none;
            object-position: right;
        }

        .text-danger {
            color: red;
            padding: 5px;
        }

        @media (min-width: 768px) {
            .register-section {
                width: 50%;
            }

            .logo-container {
                justify-content: flex-start;
                padding-left: 3rem;
                margin-bottom: -3rem;
            }

            .form-container {
                padding-top: 4rem;
                padding-left: 4rem;
                padding-right: 4rem;
            }

            .background-image {
                display: block;
            }
        }
    </style>
</head>

<body class="bg-white font-family-karla h-screen">
    <div class="container1">
        <!-- Register Section -->
        <div class="register-section">

            <div class="logo-container">
            </div>

            <div class="form-container">
                <p class="form-title">Register Now</p>
                <form class="register-form" action="{{ route('register') }}" method="post" enctype="multipart/form-data"> <!-- Added enctype -->
                    @csrf

                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" placeholder="John Smith" class="form-input" value="{{ old('name') }}"/>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="your@email.com" class="form-input" value="{{ old('email') }}"/>
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" class="form-input" />
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="confirm-password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm-password" name="password_confirmation" placeholder="Password" class="form-input" />
                        @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="image" class="form-label">Profile Image</label>
                        <input type="file" id="image" name="image" class="form-input" accept="image/*" />
                        @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>

                    <input type="submit" value="Register" class="submit-button" />
                </form>
            </div>
        </div>

        <!-- Background Image -->
        <div class="image-section">
            <img class="background-image" src="{{ asset('assets/images/family.jpg') }}" alt="Background" />
        </div>
    </div>
</body>
</html>
