<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

    <title>@yield('title','My Project')</title>

    <!--Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <style>
        .navbar-nav .nav-item  .nav-link.custom {
            color: #409EFF;
            font-weight: bold;
        }

        form {
            display: inline;
        }
    </style>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #c3ea9b;padding: 5px ">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    @if(request()->is('books') OR request()->is('books/*'))
                        <a class="nav-link custom " href="{{ route('books.index') }}">Book</a>
                    @else
                        <a class="nav-link " href="{{ route('books.index') }}">Book</a>
                    @endif
                </li>

                <li class="nav-item">
                    @if(request()->is('authors') OR request()->is('authors/*'))
                    <a class="nav-link custom"
                       href="{{ route('authors.index') }}">Author</a>
                    @else
                        <a class="nav-link "
                           href="{{ route('authors.index') }}">Author</a>
                    @endif
                </li>

                <li class="nav-item">
                    @if(request()->is('categories') OR request()->is('categories/*'))
                        <a class="nav-link custom"
                           href="{{ route('categories.index') }}">Category</a>
                    @else
                        <a class="nav-link "
                           href="{{ route('categories.index') }}">Category</a>
                    @endif
                </li>

                <li class="nav-item">
                    @if(request()->is('stores') OR request()->is('stores/*'))
                        <a class="nav-link custom" href="{{ route('stores.index') }}">Store</a>
                    @else
                        <a class="nav-link " href="{{ route('stores.index') }}">Store</a>
                    @endif
                </li>
            </ul>

        </div>
    </nav>

    @yield('content')

</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $('#myTable').DataTable({--}}
{{--            "bInfo" : false--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
    var type= "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>

</body>
</html>
