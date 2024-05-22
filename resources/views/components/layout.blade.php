<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link
        rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"
    />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <title>MyBlog | Ezel M. Espera</title>
</head>
<body class="mb-20">
    <nav class="bg-black p-0 w-full">
        <div class="ps-8 mx-auto flex flex-col lg:flex-row justify-between items-center">
            @auth
            <div class="text-white font-bold text-3xl mb-2 lg:mb-0 hover:text-orange-600 hover:cursor-pointer">
                <div class="lg:flex lg:flex-row lg:space-x-4 lg:mt-0 mt-2 flex flex-col items-center text-3xl">
                    <img
                        class="rounded-circle border border-dark"
                        src="{{ auth()->user()->userImage ? asset('storage/' . auth()->user()->userImage) : asset('Images/default-image.jpg') }}"
                        width="80" />
                    <a class="nav-link px-4 py-2 hover:text-orange-600" data-bs-toggle="tab" href="/" aria-selected="false" role="tab" tabindex="-1">
                        Welcome {{auth()->user()->name}}
                    </a>
                </div>
            </div>

            <div class="lg:flex lg:flex-row lg:space-x-4 lg:mt-0 mt-2 flex flex-col items-center text-2xl">
                <a class="nav-link text-white px-4 py-2 hover:text-orange-600" data-bs-toggle="tab" href="/" aria-selected="false" role="tab" tabindex="-1">
                    Home
                </a>
                <a class="nav-link text-white px-4 py-2 hover:text-orange-600" data-bs-toggle="tab" href="/listings/about" aria-selected="false" role="tab" tabindex="-1" >
                    About
                </a>
                <a href="/listings/projects" class="nav-link text-white  px-4 py-2 hover:text-orange-600" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                    Projects
                </a>
                <div class="dropdown mr-1 pe-7">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" data-offset="10,20">
                        <i class="fa-solid fa-gear"></i>
                        Settings
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/users/{{auth()->user()->id}}/edit"  data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                            <i class="fa-solid fa-gear"></i>
                            Edit Account
                        </a>
                        <a class="dropdown-item" href="/listings/manage">
                            <i class="fa-solid fa-diagram-project"></i>
                            Manage Projects
                        </a>
                        <form class="dropdown-item" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1" method="POST" action="{{url('/logout')}}">
                            @csrf
                            <button type="submit">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- </div> -->
            @else
            <div class="lg:flex lg:flex-row lg:space-x-4 lg:mt-0 mt-4 flex flex-col items-center text-2xl">
                <a href="/register" class="nav-link hover:text-laravel text-white">
                    <i class="fa-solid fa-user-plus"></i>
                    Register
                </a>
                <a href="/login" class="hover:text-laravel nav-link text-white">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login
                </a>
            </div>
            @endauth
        </div>
    </nav>

    <main>
    {{$slot}}
    </main>

    <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-dark text-white h-20 mt-8 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; {{date("Y")}}, All Rights reserved</p>
        <a href="/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">
            Post Project
        </a>
    </footer>

    <x-flash-message />

</body>
</html>
