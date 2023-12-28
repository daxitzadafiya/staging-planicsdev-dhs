<!DOCTYPE html>
<html lang="en" class="light">
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Enigma admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Enigma Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>{{ env('APP_NAME') }} - Forgot Password</title>
        <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
    </head>
    <body class="login">
        @include('extra.alert')
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <div class="hidden xl:flex flex-col min-h-screen">
                    <div class="my-auto">
                        <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{ asset('dist/images/illustration.svg') }}">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            Forgot password to your account. 
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Please enter your email address and we will send you a password link.</div>
                    </div>
                </div>
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Reset Your password
                        </h2>
                        <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">Please enter your email address and we will send you a password link.</div>
                        <div class="intro-x mt-8">
                            <form id="forgot-form">
                                <input type="text" name="email" id="email" class="intro-x login__input form-control py-3 px-4 block" placeholder="Email">
                                <div id="error-email" class="login__input-error text-danger mt-2"></div>
                            </form>
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button id="btn-forgot" class="btn btn-primary py-3 px-8 xl:w-40 xl:mr-3 align-top">Send Reset Link</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('dist/js/app.js') }}"></script>
        <script src="{{ asset('dist/js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/toastify.min.js') }}"></script>
        <script type="module">
            var site_url = $('#site_url').val();
            (function () {
                function forgotPassword() {
                    // Reset state
                    $('#forgot-form').find('.login__input').removeClass('border-danger')
                    $('#forgot-form').find('.login__input-error').html('')

                    // Post form
                    let email = $('#email').val();

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
                    $('#btn-forgot').html(html)

                    $.ajax({
                        url: `{{ route('forgot-password.check') }}`,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "email": email
                        },
                        success: (resp) => {
                            if(resp.success) {
                                $('#btn-forgot').html('Send Reset Link')
                                $('#success-notification-content .message-content').text(resp.message);
                                Toastify({
                                    node: $("#success-notification-content")
                                        .clone()
                                        .removeClass("hidden")[0],
                                    duration: 3000,
                                    newWindow: true,
                                    close: true,
                                    gravity: "top",
                                    position: "right",
                                    stopOnFocus: true,
                                }).showToast();
                            }
                        },
                        error: (err) => {
                            $('#btn-forgot').html('Send Reset Link')
                            if (err.responseJSON.message != 'Please Enter Correct Email.') {
                                for (const [key, val] of Object.entries(err.responseJSON.errors)) {
                                    $(`#${key}`).addClass('border-danger')
                                    $(`#error-${key}`).html(val)
                                }
                            } else {
                                $(`#email`).addClass('border-danger')
                                $(`#error-email`).html('Please Enter Correct Email.');
                            }
                        }
                    });
                }

                $('#forgot-form').on('keyup', function(e) {
                    if (e.keyCode === 13) {
                        forgotPassword()
                    }
                })

                $('#btn-forgot').on('click', function() {
                    forgotPassword()
                })
            })()
        </script>
    </body>
</html>