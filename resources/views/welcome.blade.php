<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pet Salón</title>
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,500,700|Fira+Sans:600" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://unpkg.com/animejs@2.2.0/anime.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
</head>

<body class="is-boxed has-animations">
    <div class="body-wrap boxed-container">
        <header class="site-header">

            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-1"><img src="img/logo.jpg" style="width: 100%" alt=""></div>
                    <div class="col-3">
                        Pet Salon Antofagasta
                    </div>
                </div>


            </div>
        </header>

        @error('rut')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ "El rut no existe en la base de datos" }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror

        @error('password')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @enderror

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <main>
            <section class="hero" style="padding-top: 0">
                <div class="container">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h5>Peluqueria Canina Antofagasta</h5>
                            <p class="lead">Sistema para gestión de horas Peluqueria canina PET SALON
                                ANTOFAGASTA.</p>
                            <p class="lead">Para solicitar horas ingrese con su cuenta o registrese.</p>
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#modalregistro">Registro</button>
                            <button type="button" class="btn btn-dark" data-toggle="modal"
                                data-target="#modalsesion">Iniciar Sesión</button>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Modal INICIO SESION-->
            <div class="modal fade" id="modalsesion" tabindex="-1" aria-labelledby="modalsesionLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesión</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="rut" class="col-md-4 col-form-label text-md-end">Rut Usuario</label>

                                    <div class="col-md-6">
                                        <input id="rut" type="rut"
                                            class="form-control @error('rut') is-invalid @enderror" name="rut"
                                            value="{{ old('rut') }}" required autocomplete="rut" autofocus>


                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>



            <!-- Modal REGISTRO -->
            <div class="modal fade" id="modalregistro" tabindex="-1" aria-labelledby="modalregistroLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registro de clientes</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="nombre"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="nombre" type="text"
                                            class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                            value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                        @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="apellido_paterno"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Apellido Paterno') }}</label>

                                    <div class="col-md-6">
                                        <input id="apellido_paterno" type="text"
                                            class="form-control @error('apellido_paterno') is-invalid @enderror"
                                            name="apellido_paterno" value="{{ old('apellido_paterno') }}" required
                                            autocomplete="apellido_paterno" autofocus>

                                        @error('apellido_paterno')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="telefono"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>

                                    <div class="col-md-6">
                                        <input id="telefono" type="text"
                                            class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                                            value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>

                                        @error('telefono')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="direccion"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Dirección') }}</label>

                                    <div class="col-md-6">
                                        <input id="direccion" type="text"
                                            class="form-control @error('direccion') is-invalid @enderror"
                                            name="direccion" value="{{ old('direccion') }}" required
                                            autocomplete="direccion" autofocus>

                                        @error('direccion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="rut"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Rut') }}</label>

                                    <div class="col-md-6">
                                        <input id="rut" type="text"
                                            class="form-control @error('rut') is-invalid @enderror" name="rut"
                                            value="{{ old('rut') }}" required autocomplete="rut" autofocus>

                                        @error('rut')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <section class="features section">
                <div class="container">
                    <div class="features-inner section-inner">
                        <div class="features-header text-center">
                            <div class="container-sm">
                                <h2 class="section-title mt-0">Servicios</h2>

                            </div>
                        </div>
                        <div class="features-wrap">
                            <div class="feature text-center is-revealing">
                                <div class="feature-inner">
                                    <div class="feature-icon" style="background:#FFD2DA;">
                                        <svg width="88" height="88" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="nonzero">
                                                <path d="M43 47v7a13 13 0 0 0 13-13v-7c-7.18 0-13 5.82-13 13z"
                                                    fill="#FF6381" />
                                                <path d="M32 41v4a9 9 0 0 0 9 9v-4a9 9 0 0 0-9-9z" fill="#FF97AA" />
                                            </g>
                                        </svg>
                                    </div>
                                    <h4 class="feature-title h3-mobile mb-8">Servicio de baño</h4>
                                    <p class="text-sm">El precio varía según el tamaño del perro.</p>
                                </div>
                            </div>
                            <div class="feature text-center is-revealing">
                                <div class="feature-inner">
                                    <div class="feature-icon" style="background:#FFD8CD;">
                                        <svg width="88" height="88" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="nonzero">
                                                <path
                                                    d="M54 56h-9a2 2 0 0 1-2-2V43a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2zm-9-13v10h9V43h-9z"
                                                    fill="#FCAC96" />
                                                <path
                                                    d="M41 50h-7V34h14v5h2v-5a2 2 0 0 0-2-2H34a2 2 0 0 0-2 2v18a2 2 0 0 0 2 2h7v-4z"
                                                    fill="#FC8464" />
                                            </g>
                                        </svg>
                                    </div>
                                    <h4 class="feature-title h3-mobile mb-8">Corte de pelo</h4>
                                    <p class="text-sm"></p>
                                </div>
                            </div>
                            <div class="feature text-center is-revealing">
                                <div class="feature-inner">
                                    <div class="feature-icon" style="background:#C6FDF3;">
                                        <svg width="88" height="88" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="nonzero">
                                                <circle fill="#1ADAB7" cx="38" cy="50" r="5" />
                                                <path
                                                    d="M53 42h2v-8a1 1 0 0 0-1-1h-8v2h5.586l-8.293 8.293a1 1 0 1 0 1.414 1.414L53 36.414V42z"
                                                    fill="#1ADAB7" />
                                                <path fill="#83F0DD"
                                                    d="M34 41.414l3-3 3 3L41.414 40l-3-3 3-3L40 32.586l-3 3-3-3L32.586 34l3 3-3 3zM55.414 48L54 46.586l-3 3-3-3L46.586 48l3 3-3 3L48 55.414l3-3 3 3L55.414 54l-3-3z" />
                                            </g>
                                        </svg>
                                    </div>
                                    <h4 class="feature-title h3-mobile mb-8">Desparacitación</h4>
                                    <p class="text-sm"></p>
                                </div>
                            </div>
                            <div class="feature text-center is-revealing">
                                <div class="feature-inner">
                                    <div class="feature-icon" style="background:#E0E1FE;">
                                        <svg width="88" height="88" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="nonzero">
                                                <path
                                                    d="M41 42h-7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1zM41 55h-7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1z"
                                                    fill="#4950F6" />
                                                <path fill="#8D92FA"
                                                    d="M45 34h10v2H45zM45 39h10v2H45zM45 47h10v2H45zM45 52h10v2H45z" />
                                            </g>
                                        </svg>
                                    </div>
                                    <h4 class="feature-title h3-mobile mb-8">Venta de productos</h4>
                                    <p class="text-sm"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="testimonials section">
                <div class="testimonials-shape testimonials-shape-1">
                    <svg width="280" height="280" viewBox="0 0 280 280" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient x1="100%" y1="0%" x2="0%" y2="100%" id="testimonials-shape-1">
                                <stop stop-color="#261FB6" offset="0%" />
                                <stop stop-color="#4950F6" offset="100%" />
                            </linearGradient>
                        </defs>
                        <circle cx="140" cy="685" r="140" transform="translate(0 -545)"
                            fill="url(#testimonials-shape-1)" fill-rule="evenodd" />
                    </svg>
                </div>
                <div class="testimonials-shape testimonials-shape-2">
                    <svg width="125" height="107" viewBox="0 0 125 107" xmlns="http://www.w3.org/2000/svg">
                        <g fill="none" fill-rule="evenodd">
                            <circle fill="#C6FDF3" cx="48" cy="59" r="48" />
                            <path
                                d="M58.536 39.713c0-6.884 1.72-14.007 5.163-21.368 3.443-7.36 8.167-13.458 14.173-18.292l11.645 7.91c-3.589 4.98-6.262 10.016-8.02 15.106S78.86 33.598 78.86 39.384v13.623H58.536V39.713z"
                                fill="#55EBD0" />
                            <path
                                d="M93.252 39.713c0-6.884 1.722-14.007 5.164-21.368 3.442-7.36 8.166-13.458 14.172-18.292l11.646 7.91c-3.589 4.98-6.262 10.016-8.02 15.106s-2.637 10.529-2.637 16.315v13.623H93.252V39.713z"
                                fill="#1ADAB7" />
                        </g>
                    </svg>
                </div>
                <div class="testimonials-shape testimonials-shape-3">
                    <svg width="48" height="48" viewBox="0 0 48 48" mlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient x1="93.05%" y1="19.767%" x2="15.034%" y2="85.765%"
                                id="testimonials-shape-3">
                                <stop stop-color="#FF3058" offset="0%" />
                                <stop stop-color="#FF6381" offset="100%" />
                            </linearGradient>
                        </defs>
                        <circle cx="24" cy="434" r="24" transform="translate(0 -410)" fill="url(#testimonials-shape-3)"
                            fill-rule="evenodd" />
                    </svg>
                </div>
                <div class="container">
                    <div class="testimonials-inner section-inner">
                        <h2 class="section-title mt-0 text-center">Testimonos</h2>
                        <div class="testimonials-wrap">
                            <div class="testimonial text-xs is-revealing">
                                <div class="testimonial-inner">
                                    <div class="testimonial-main">
                                        <div class="testimonial-header">
                                            <img class="mb-16" src="img/testimonial-01.png" alt="Testimonial">
                                        </div>
                                        <div class="testimonial-body">
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing
                                                elit, sed do eiusmod tempor incididunt.</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-footer">
                                        <div class="testimonial-link">
                                            <a href="#">@martajones</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial text-xs is-revealing">
                                <div class="testimonial-inner">
                                    <div class="testimonial-main">
                                        <div class="testimonial-header">
                                            <img class="mb-16" src="img/testimonial-02.png" alt="Testimonial">
                                        </div>
                                        <div class="testimonial-body">
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing
                                                elit, sed do eiusmod tempor incididunt.</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-footer">
                                        <div class="testimonial-link">
                                            <a href="#">@michealpahm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial text-xs is-revealing">
                                <div class="testimonial-inner">
                                    <div class="testimonial-main">
                                        <div class="testimonial-header">
                                            <img class="mb-16" src="img/testimonial-03.png" alt="Testimonial">
                                        </div>
                                        <div class="testimonial-body">
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur
                                                adipiscing
                                                elit, sed do eiusmod tempor incididunt.</p>
                                        </div>
                                    </div>
                                    <div class="testimonial-footer">
                                        <div class="testimonial-link">
                                            <a href="#">@markbrown</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="site-footer-inner has-top-divider">
                    <div class="brand footer-brand">

                    </div>
                    <ul class="footer-links list-reset">
                        <li>
                            <a href="#">Contacto</a>
                        </li>
                        <li>
                            <a href="#">About us</a>
                        </li>
                        <li>
                            <a href="#">FAQ's</a>
                        </li>
                        <li>
                            <a href="#">Soporte</a>
                        </li>
                    </ul>
                    <ul class="footer-social-links list-reset">
                        <li>
                            <a href="#">
                                <span class="screen-reader-text">Facebook</span>
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.023 16L6 9H3V6h3V4c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V6H13l-1 3H9.28v7H6.023z"
                                        fill="#FFF" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="screen-reader-text">Twitter</span>
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16 3c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4C.7 7.7 1.8 9 3.3 9.3c-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H0c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4C15 4.3 15.6 3.7 16 3z"
                                        fill="#FFF" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="screen-reader-text">Google</span>
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7.9 7v2.4H12c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C11.5 1.7 9.9 1 8 1 4.1 1 1 4.1 1 8s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H7.9z"
                                        fill="#FFF" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <div class="footer-copyright">&copy; 2022 Pet Salon Antofagasta, all rights reserved</div>
                </div>
            </div>
        </footer>
    </div>

    <script src="js/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

@if ($errors->any())
@endif

</html>
