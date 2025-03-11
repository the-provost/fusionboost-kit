<!DOCTYPE html>
<html lang="en">
    @if($errors->any())
    <script>
        console.log('Errors:', @json($errors->all()));
    </script>
@endif
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <style>
        :root {
            --red-primary: #b80000;
            --red-glow: #8B000033;
            --dark-bg: #0a0a0a;
        }

        .alert {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 1px solid rgba(220, 53, 69, 0.2);
}

.alert-danger {
    background-color: rgba(220, 53, 69, 0.1);
    color: #ff4444;
    padding: 1rem;
    border-radius: 4px;
    font-size: 0.9rem;
    text-align: left;
}

        .btn-google {
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #fff;
    padding: 0.75rem;
    font-weight: 500;
    width: 100%;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    margin-bottom: 1rem;
    text-decoration: none;
}

.btn-google:hover {
    background: rgba(255, 255, 255, 0.12);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.1);
    text-decoration: none;
}

.divider {
    display: flex;
    align-items: center;
    text-align: center;
    margin: 1rem 0;
    color: rgba(255, 255, 255, 0.6);
}

.divider::before,
.divider::after {
    content: '';
    flex: 1;
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}

.divider span {
    padding: 0 1rem;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

        body {
            margin: 0;
            padding: 0;
            /* background: var(--dark-bg); */
            color: #fff;
            font-family: 'Nunito', sans-serif;
            background: var(--gradient-start);
    background: -webkit-linear-gradient(to top, var(--gradient-start), var(--gradient-end));
    background: linear-gradient(to top, var(--gradient-start), var(--gradient-end));
    min-height: 100vh;
        }


        .form-check-input {
    background-color: rgba(255, 255, 255, 0.05);
    color: rgb(255, 255, 255);
    border-color: rgba(255, 255, 255, 0.2);

    &:checked {
        background-color: $red-primary;
        border-color: $red-primary;
    }
}

.dark-mode .form-control {
    background-color: rgba(98, 95, 95, 1);
    color: #fff;
    border-color: rgba(255, 255, 255, 0.2);
}

.dark-mode .form-control:focus {
    background-color: rgba(255, 255, 255, 0.08);
    color: #fff;
}

.dark-mode .form-floating > label {
    color: rgba(255, 255, 255, 0.6);
}

.dark-mode .text-muted {
    color: rgba(255, 255, 255, 0.6) !important;
}

.logo-wrapper {
    text-align: center;

    .logo-img {
        max-width: 180px;  // Adjust this value based on your logo size
        height: auto;
    }
}

        .text-muted {
    color: rgba(255, 255, 255, 0.6) !important;
}

        .split-container {
            display: flex;
            width: 100vw;
            height: 100vh;
            position: fixed;
        }

        .split-left {
            width: 50%;
            background: var(--dark-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .split-right {
            width: 50%;
            background: var(--dark-bg);
            position: relative;
            overflow: hidden;
        }

        .login-wrapper {
            width: 400px;
            max-width: 100%;
            padding: 2rem;
        }

        .logo-wrapper {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .logo-img {
            max-width: 180px;
            height: auto;
        }

        .text-muted {
            color: rgba(255, 255, 255, 0.6) !important;
        }

        .form-floating {
            position: relative;
            margin-bottom: 1rem;
        }

        .form-control {
            background-color: rgba(98, 95, 95, 1);
            border: none;
            color: #fff;
            padding: 1rem 0.75rem;
            height: auto;
            width: 100%;
            border-radius: 4px;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.08);
            border-color: var(--red-primary);
            box-shadow: 0 0 0 0.25rem rgba(184, 0, 0, 0.25);
            outline: none;
        }

        .form-floating > label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 1rem 0.75rem;
            color: rgba(255, 255, 255, 0.6);
            pointer-events: none;
            transform-origin: 0 0;
            transition: transform 0.15s ease-in-out, color 0.15s ease-in-out;
        }

        .form-floating > .form-control:focus ~ label,
        .form-floating > .form-control:not(:placeholder-shown) ~ label {
            transform: scale(0.85) translateY(-0.5rem);
            color: rgba(83, 83, 83, 0.8);
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-check-input {
            background-color: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 255, 255, 0.2);
            cursor: pointer;
        }

        .form-check-input:checked {
            background-color: var(--red-primary);
            border-color: var(--red-primary);
        }

        .text-red {
            color: var(--red-primary) !important;
        }

        .btn-red {
            background: var(--red-primary);
            border: none;
            color: #fff;
            padding: 0.75rem;
            font-weight: 500;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-red:hover {
            background: #e81010;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(184, 0, 0, 0.4);
        }

        .invalid-feedback {
            color: #ff4444;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        #particles-js {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        a {
            text-decoration: none;
            transition: color 0.2s ease;
        }

        a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .split-container {
                flex-direction: column;
            }

            .split-left,
            .split-right {
                width: 100%;
            }

            .split-left {
                height: 100%;
            }

            .split-right {
                display: none;
            }

            .login-wrapper {
                padding: 1rem;
            }
        }
    </style>
</head>
<body class="dark-theme dark-mode">
    <div class="split-container">
        <!-- Left side - Login Form -->
        <div class="split-left">
            <div class="login-wrapper">
                <div class="login-header text-center">
                    <div class="logo-wrapper">
                        <img src="images/Greydesk-White Text-01.png" alt="Logo" class="logo-img">
                    </div>
                    <p class="text-muted">Welcome back! Please login to continue.</p>

                    <!-- Add this error section -->
                    @if($errors->any())
                        <div class="alert alert-danger" style="background-color: rgba(220, 53, 69, 0.1); color: #ff4444; padding: 1rem; border-radius: 4px; margin: 1rem 0;">
                            @foreach($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                </div>

                <br>
                <a href="/login/google" class="btn-google">
                    <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.64 9.2c0-.637-.057-1.251-.164-1.84H9v3.481h4.844c-.209 1.125-.843 2.078-1.796 2.716v2.259h2.908c1.702-1.567 2.684-3.875 2.684-6.615z" fill="#4285f4"/>
                        <path d="M9 18c2.43 0 4.467-.806 5.956-2.184l-2.908-2.259c-.806.54-1.837.86-3.048.86-2.344 0-4.328-1.584-5.036-3.711H.957v2.332C2.438 15.983 5.482 18 9 18z" fill="#34a853"/>
                        <path d="M3.964 10.712c-.18-.54-.282-1.117-.282-1.71 0-.593.102-1.17.282-1.71V4.96H.957C.347 6.175 0 7.55 0 9.002c0 1.452.348 2.827.957 4.042l3.007-2.332z" fill="#fbbc05"/>
                        <path d="M9 3.58c1.321 0 2.508.454 3.44 1.345l2.582-2.58C13.463.891 11.426 0 9 0 5.482 0 2.438 2.017.957 4.958L3.964 7.29C4.672 5.163 6.656 3.58 9 3.58z" fill="#ea4335"/>
                    </svg>
                    Login with Google
                </a>
                <br>
                <br>
                <div class="divider text-muted">
                    <span>OR</span>
                </div>
                <br>
                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf

                    <div class="form-floating">
                        <input type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email"
                               id="email"
                               placeholder="Email"
                               value="{{ old('email') }}"
                               required>
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password"
                               id="password"
                               placeholder="Password"
                               required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-red">
                                Forgot Password?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="btn-red">Sign In</button>

                    @if (Route::has('register'))
                        <p class="text-center mt-3">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="text-red">Register</a>
                        </p>
                    @endif
                </form>
            </div>
        </div>

        <!-- Right side - Particles -->
        <div class="split-right">
            <div id="particles-js"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        particlesJS('particles-js', {
            "particles": {
                "number": {
                    "value": 80,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#b80000"
                },
                "shape": {
                    "type": "circle"
                },
                "opacity": {
                    "value": 0.5,
                    "random": false
                },
                "size": {
                    "value": 3,
                    "random": true
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#b80000",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 6,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                }
            },
            "retina_detect": true
        });
    </script>
</body>
</html>
