<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://bootswatch.com/5/quartz/bootstrap.min.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous">

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" 
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
        crossorigin="anonymous"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>MyBlog | Ezel M. Espera</title>
</head>
<body class="mb-48">
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a href="/"
                ><img class="w-24" src="{{asset('images/Ezel-logo.png')}}" alt="" class="logo"
            /></a>
            <ul class="nav nav-tabs" role="tablist">
                @auth
                <li class="nav-item" role="presentation">
                    <span class="nav-link" data-bs-toggle="tab" href="/" aria-selected="false" role="tab" tabindex="-1">
                    Welcome {{auth()->user()->name}}
                    </span>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="/" aria-selected="false" role="tab" tabindex="-1">
                    Home
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="tab" href="/listings/about" aria-selected="false" role="tab" tabindex="-1" >
                    About
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="/listings/experience" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1"
                        >
                        Experience</a
                    >
                </li>
                <li class="nav-item" role="presentation">
                    <a href="/listings/projects" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1""
                        >
                        Projects</a
                    >
                </li>
                
                <li class="nav-item" role="presentation">
                    <a href="/listings/manage" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1"
                        ><i class="fa-solid fa-gear"></i>
                        Manage Listings</a
                    >
                </li>
                <li class="nav-item" role="presentation">
                    <form class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1" method="POST" action="{{url('/logout')}}">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-door-closed"></i> Logout

                    </button>
                    </form>
                </li>
                @else
                <li>
                    <a href="/register" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
                @endauth
            </ul>
        </div>
    </nav>      

    <main>
    {{$slot}}
    </main>

    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
    >
        <p class="ml-2">Copyright &copy; 2023, All Rights reserved</p>

        <a
            href="/create"
            class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
            >Post Project</a
        >
    </footer>

    <x-flash-message />

</body>
</html>
