<!DOCTYPE html>
<html lang="en" class="light">
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Enigma admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Enigma Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Reset-Password - {{ env('APP_NAME') }}</title>
        <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
        <style>
            .eye-icon{
                position: absolute;
                right: 4px;
                top: 16px;
                z-index: 999;
            }
        </style>
    </head>
    <body class="login">
        @include('extra.alert')
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
                        <span class="text-white text-lg ml-3"> {{ env('APP_NAME') }} </span> 
                    </a>
                    <div class="my-auto">
                        <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{ asset('dist/images/illustration.svg') }}">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            Reset Password to your account
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Enter a new password for {{ env('APP_NAME') }}.</div>
                    </div>
                </div>
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Reset Your Password
                        </h2>
                        <div class="intro-x mt-2 text-slate-400 dark:text-slate-400 xl:hidden text-center">Enter a new password for {{ env('APP_NAME') }}.</div>
                        <div class="intro-x mt-8">
                            <form id="reset-password-form">
                                <input type="hidden" name="email" id="email" class="intro-x login__input form-control py-3 px-4 block mt-4" value="{{ $email }}">
                                <input type="hidden" name="token" id="token" class="intro-x login__input form-control py-3 px-4 block mt-4" value="{{ $token }}">
                                <div class="relative relative-eye-icon">
                                    <i class="fa-regular eye-icon fa-eye-slash mr-2 text-sm cursor-pointer showKey"></i>
                                    <input type="password" name="password" id="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Enter new password">
                                </div>
                                <div id="error-password" class="login__input-error text-danger mt-2"></div>
                                <button id="generate-password" class="intro-x text-slate-500 block mt-2 text-success text-xs sm:text-sm">Generate Password?</button>
                                <div class="relative relative-eye-icon">
                                    <i class="fa-regular eye-icon fa-eye-slash mr-2 text-sm cursor-pointer showKey"></i>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Re-enter your password">
                                </div>
                                <div id="error-password_confirmation" class="login__input-error text-danger mt-2"></div>
                            </form>
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button id="btn-reset-password" class="btn btn-primary py-3 px-5 xl:w-36 xl:mr-3 align-top">Reset Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('dist/js/app.js') }}"></script>
        <script src="{{ asset('dist/js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/toastify.min.js') }}"></script>
         <script type="module">
            (function () {
                var site_url = $('#site_url').val();
                function resetPassword() {
                    // Reset state
                    $('#reset-password-form').find('.login__input').removeClass('border-danger')
                    $('#reset-password-form').find('.login__input-error').html('')

                    // Post form
                    let email = $('#email').val();
                    let token = $('#token').val();
                    let password = $('#password').val();
                    let password_confirmation = $('#password_confirmation').val();

                    // Loading state
                    let html = ``;
                        html += `<svg width="25" viewBox="-2 -2 42 42" xmlns="http://www.w3.org/2000/svg" stroke="white" class="w-5 h-5">`;
                        html += `<g fill="none" fill-rule="evenodd">`;
                        html += `<g transform="translate(1 1)" stroke-width="4">`;
                        html += `<circle stroke-opacity=".5" cx="18" cy="18" r="18"></circle>`;
                        html += `<path d="M36 18c0-9.94-8.06-18-18-18">`;
                        html += `<animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite"></animateTransform>`;
                        html += `</path>`;
                        html += `</g>`;
                        html += `</g>`;
                        html += `</svg>`;
                    $('#btn-reset-password').html(html);

                    $.ajax({
                        url: `{{ route('reset-password.check') }}`,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "email": email,
                            "token": token,
                            "password": password,
                            "password_confirmation": password_confirmation
                        },
                        success: (resp) => {
                            if(resp.success) {
                                window.location.href = "{{ route('login') }}";
                            }
                        },
                        error: (err) => {
                            $('#btn-register').html('Register');
                            $('#btn-reset-password').html('Reset Password')
                            if (err.responseJSON.errors != '') {
                                for (const [key, val] of Object.entries(err.responseJSON.errors)) {
                                    $(`#${key}`).addClass('border-danger')
                                    $(`#error-${key}`).html(val)
                                }
                            }
                        }
                    });
                }

                $('#reset-password-form').on('keyup', function(e) {
                    if (e.keyCode === 13) {
                        resetPassword()
                    }
                })

                $('#btn-reset-password').on('click', function() {
                    resetPassword()
                })

                $('#generate-password').on('click', function(e) {
                    e.preventDefault();
                    var length = 20,
                        charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()",
                        retVal = "";
                    for (var i = 0, n = charset.length; i < length; ++i) {
                        retVal += charset.charAt(Math.floor(Math.random() * n));
                    }
                    $('#password').val(retVal);
                    $('#password_confirmation').val(retVal);
                });

                $('.showKey').on('click', function(e) {
                    e.preventDefault();
                    $(this).toggleClass('fa-eye fa-eye-slash');
                    let input = $(this).parent('.relative-eye-icon').children('input');
                    if (input.attr("type") === "password") {
                        input.attr("type", "text");
                    } else {
                        input.attr("type", "password");
                    }
                })
            })()
        </script>
    </body>
</html>