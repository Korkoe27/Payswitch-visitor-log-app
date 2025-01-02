<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Visitor Log</title>
</head>

<body class="flex flex-col bg-[#f9fafb]">

    <header  class="md:grid md:grid-cols-10 gap-2 items-center w-full px-4 py-4 bg-white ">


                    <div class=" lg:p-4 col-start-1">
                        <img src="{{ asset('logo.png') }}" alt="">
                    </div>
                                    <div class="md:flex hidden col-start-2 md:px-4 md:col-span-2  justify-start">
                                        <h1 class="font-bold text-xl text-blue-900">{{ $heading }}</h1>
                                    </div>
            
                                    <div class="border border-gray-300 flex col-start-5 col-span-2 p-1 text-gray-400 rounded items-center ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                        </svg>
                                        <input type="search" placeholder="Search" class="outline-none md:p-3 w-full rounded">
                                    </div>
                                    <div class="justify-center hidden md:col-start-8 md:col-span-2 pr-16 gap-4 sm:flex md:pr-0">
                                        <a href="javascript:void(0)"
                                            class="py-3 md:text-base font-medium  md:px-2 lg:px-7 rounded-lg order text-white bg-blue-500 hover:text-primary">
                                            Log Visitor
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="py-3 text-base font-medium rounded-lg text-green-600 border border-green-600  bg-primary lg:px-7 md:px-2 hover:bg-primary/90">
                                            Log Key
                                        </a>
                                    </div>
                                                        
                                <div class="  flex items-center p-4 col-start-10 col-span-2 gap-4  rounded-lg">
                                    <span class="rounded-full bg-blue-200  p-5"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg></span>
                                    <span class="text-sm font-bold hidden lg:flex text-blue-900">User</span>
                                    <span class="">
                                    </span>
                                    </div>
                    </header>


                    <main class="md:grid md:grid-cols-10 lg:grid-cols-12">

                            <nav class="flex lg:col-span-1 md:col-span-2 bg-white fixed h-screen flex-col gap-2">
                                <ul class="flex flex-col gap-4">
                                    <li class="">
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
                                        <x-nav-link href="{{ url('staff') }}" :active="request()->is('staff')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                              </svg>
                                              
                                            <span class="hidden lg:flex">Staff</span>
                                        </x-nav-link>
                                    </li>
                                    {{-- <li class="">
                                        <x-nav-link href="{{ url('keys') }}" :active="request()->is('keys')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" /></svg>
                                            <span class="hidden lg:flex">Keys</span>
                                        </x-nav-link>
                                    </li> --}}
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
                    
                    
                    

                            </nav>
                    

                    
                        {{-- <main class="w-11/12 lg:ml-[11%] md:2/12"> --}}
                    <section class="md:col-span-10 md:col-start-2 w-full lg:col-start-2 lg:col-span-11">
                            <!-- ====== Navbar Section Start -->
                    
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
                    {{ $slot }}
                    
                    
                        </section>
                    
                    </main>
   