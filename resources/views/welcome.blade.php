@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            button  {
                color: #636b6f;
                padding: 0 25px;
                position: center;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-transform: uppercase;
            }

            .text-but1 {
                display:inline-block;
                float: left;
            }
            .text-but2 {
                display:inline-block;
                position: center;
            }

            .text-but3 {
                display:inline-block;
                float: right;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <form action="{{ route('login') }}">
                            <button class="btn btn-outline-success d-block mr-auto">Login</button>
                        </form>
{{--                        <a href="{{ route('login') }}">Login</a>--}}

                        @if (Route::has('register'))
                            <form action="{{ route('register') }}">
                                <button class="btn btn-outline-danger d-block mr-auto">Register</button>
                            </form>
{{--                            <a href="{{ route('register') }}">Register</a>--}}
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel's forum
                </div>

                <div class="text-but1">
                    <form action="http://127.0.0.1:8000/admin/blog/categories">
                        <button class="btn btn-outline-dark d-block mr-auto">Categories</button>
                    </form>
                </div>
                <div class="text-but2">
                    <form action="http://127.0.0.1:8000/admin/blog/posts">
                        <button class="btn btn-outline-dark">Posts</button>
                    </form>
                </div>
                <div class="text-but3">
                    <form action="https://github.com/JiggaRin/forum">
                        <button class="btn btn-outline-primary d-block ml-auto">GitHub</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
