<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="wO1mPRYhAVrttL8HuBWT3v9PLycEeilNH9cBTyrD">

    <title>Laravel</title>



    <!-- Styles -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/app.css">

    <!-- Scripts -->
    <script src="http://127.0.0.1:8000/js/app.js" defer></script>
</head>

<body>
    @component('components.header')
    @endcomponent

    <div class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>

            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="
    padding-bottom: 1.5em;
    padding-right: 0px;
    padding-left: 0px;
    padding-top: 0px;
    margin-top: 0px;
">
                <!-- Validation Errors -->
                <div class="title">
                    Registration
                </div>

                <form method="POST" action="http://127.0.0.1:8000/register">
                    @csrf
                    <!-- Name -->
                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="name">
                            Username
                        </label>

                        <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="name" type="text" name="name" required="required" autofocus="autofocus">
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="email">
                            Email
                        </label>

                        <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="email" type="email" name="email" required="required">
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="password">
                            Password
                        </label>

                        <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="password" type="password" name="password" required="required" autocomplete="new-password">
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700" for="password_confirmation">
                            Confirm Password
                        </label>

                        <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="password_confirmation" type="password" name="password_confirmation" required="required">
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="http://127.0.0.1:8000/login">
                            ログインする
                        </a>

                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-4">
                            登録
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<style scoped>
    .title {
        background-color: blue;
        color: white;
        width: 100%;
        padding: 1.2em 1.5em;
        font-weight: bold;
        font-size: 1.5em;
    }

    .mt-4 {
        margin-right: 1rem;
        margin-left: 1rem;
    }
</style>