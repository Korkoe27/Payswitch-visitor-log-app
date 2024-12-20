<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Visitor Log</title>
</head>

<body class="flex md:flex-row flex-col md:gap-4 bg-[#f9fafb]">

    <aside class="md:fixed  lg:w-[12%] bg-white h-screen flex gap-4  flex-col">
        <div class="p-8">
            <img src="{{ asset('logo.png') }}" alt="">
        </div>
        <nav class="flex flex-col gap-2">
            <ul class="flex flex-col p-0 gap-4">
                <li class="p-0">
                    <x-nav-link href="{{ url('/') }}" :active="request()->is('/')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                        </svg>

                        <span class="hidden lg:flex">Dashboard</span>
                    </x-nav-link>
                </li>
                <li class="">
                    <x-nav-link href="{{ url('visitors') }}" :active="request()->is('visitors')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                        <span class="hidden lg:flex">Visitors</span>
                    </x-nav-link>
                </li>
                <li class="">
                    <x-nav-link href="{{ url('records') }}" :active="request()->is('records')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                        </svg>

                        <span class="hidden lg:flex">Records</span>
                    </x-nav-link>
                </li>
                <li class="">
                    <x-nav-link href="{{ url('settings') }}" :active="request()->is('settings')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>


                        <span class="hidden lg:flex">Settings</span>
                    </x-nav-link>
                </li>
            </ul>




            <div class=" bottom-0 absolute flex items-center justify-center gap-4 p-8 rounded-lg w-fit m-auto bg-gray-200">
               <span class="rounded-full bg-blue-200  p-5"></span>
               <span class="text-sm font-bold text-blue-900">User</span>
               <span class=""><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
                </span>
            </div>
        </nav>

        {{-- <div class=""></div> --}}
    </aside>

    <main class="w-11/12 lg:ml-[11%]">

        <!-- ====== Navbar Section Start -->
        <header x-data="{
            navbarOpen: false
        }" class="flex items-center w-full px-4 py-4 bg-white ">
            <div class="container">
                <div class="flex items-center justify-between mx-4">

                    <div class="flex items-center justify-between w-full px-4">
                        {{-- <div>
            <button
               @click="navbarOpen = !navbarOpen"
               :class="navbarOpen && 'navbarTogglerActive' "
               id="navbarToggler"
               class="absolute right-4 top-1/2 block -translate-y-1/2 rounded-lg px-3 py-[6px] ring-primary focus:ring-2 lg:hidden"
               >
            <span
               class="relative my-[6px] block h-[2px] w-[30px] bg-body-color dark:bg-white"
               ></span>
            <span
               class="relative my-[6px] block h-[2px] w-[30px] bg-body-color dark:bg-white"
               ></span>
            <span
               class="relative my-[6px] block h-[2px] w-[30px] bg-body-color dark:bg-white"
               ></span>
            </button>
            <nav
               :class="!navbarOpen && 'hidden' "
               id="navbarCollapse"
               class="w-fit rounded-lg bg-white py-5 px-6 shadow lg:static lg:block lg:w-full lg:max-w-full lg:shadow-none lg:dark:bg-transparent"
               >

            </nav>
         </div> --}}
                        <div class="flex">
                            <h1 class="font-bold text-lgxl">{{ $heading }}</h1>
                        </div>

                        <div class="border ">
                            <input type="search" class="">
                        </div>
                        <div class="justify-end hidden pr-16 sm:flex lg:pr-0">
                            <a href="javascript:void(0)"
                                class="py-3 text-base font-medium px-7 text-black hover:text-primary">
                                Log Visitor
                            </a>
                            <a href="javascript:void(0)"
                                class="py-3 text-base font-medium text-black rounded-md bg-primary px-7 hover:bg-primary/90">
                                Sign Up
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ====== Navbar Section End -->
        <section class="bg-[rgba(0,0,0,_0.4)]">
            {{ $slot }}
        </section>
    </main>
