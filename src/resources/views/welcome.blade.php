<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>

<body class="antialiased">
    <nav
        class="top-0 fixed z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg bg-white shadow">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"><a
                    class="text-blueGray-700 text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase"
                    href="#/">Nexa Code</a><button id="toggleBtn"
                    class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                    type="button"><i class="fas fa-bars"></i></button></div>
            <div id="targetDiv" class="lg:flex flex-grow items-center bg-white lg:bg-opacity-0 lg:shadow-none hidden"
                id="example-navbar-warning">
                {{-- <ul class="flex flex-col lg:flex-row list-none mr-auto">
                    <li class="flex items-center"><a
                            class="hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="https://www.creative-tim.com/learning-lab/tailwind/react/overview/notus?ref=nr-index-navbar"><i
                                class="text-blueGray-400 far fa-file-alt text-lg leading-lg mr-2"></i> Docs</a></li>
                </ul> --}}
                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                    {{-- <li class="flex items-center"><a
                            class="hover:text-blueGray-500 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="#pablo">Demo Pages</a> --}}
                        <div
                            class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48">
                            <span
                                class="text-sm pt-2 pb-0 px-4 font-bold block w-full whitespace-nowrap bg-transparent text-blueGray-400">Admin
                                Layout</span><a
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                                href="#/admin/dashboard">Dashboard</a><a
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                                href="#/admin/settings">Settings</a><a
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                                href="#/admin/tables">Tables</a><a
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                                href="#/admin/maps">Maps</a>
                            <div class="h-0 mx-4 my-2 border border-solid border-blueGray-100"></div><span
                                class="text-sm pt-2 pb-0 px-4 font-bold block w-full whitespace-nowrap bg-transparent text-blueGray-400">Auth
                                Layout</span><a
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                                href="#/auth/login">Login</a><a
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                                href="#/auth/register">Register</a>
                            <div class="h-0 mx-4 my-2 border border-solid border-blueGray-100"></div><span
                                class="text-sm pt-2 pb-0 px-4 font-bold block w-full whitespace-nowrap bg-transparent text-blueGray-400">No
                                Layout</span><a
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                                href="#/landing">Landing</a><a
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                                href="#/profile">Profile</a>
                        </div>
                    </li>
                    @if (Route::has('login'))

                    @auth
                    <li class="flex items-center"><a
                            class="bg-blue-400 hover:bg-blue-70 text-white  active:bg-lightBlue-600 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3 ease-linear transition-all duration-150"
                            href="{{ url('/dashboard') }}"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
                    </li>
                    @else
                    <li class="flex items-center"><a
                            class="bg-blue-400 hover:bg-blue-70 text-white  active:bg-lightBlue-600 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3 ease-linear transition-all duration-150"
                            href="{{ route('login') }}"><i class="fa-solid fa-right-to-bracket"></i> Log in</a></li>

                    @if (Route::has('register'))
                    <li class="flex items-center"><a
                            class="bg-blue-400 hover:bg-blue-70 text-white  active:bg-lightBlue-600 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3 ease-linear transition-all duration-150"
                            href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i> Register</a>
                    </li>
                    @endif
                    @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div
        class="relative sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-white-100 dark:bg-dots-lighter dark:bg-white-900 selection:bg-red-500 selection">
        @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            @auth
            <a href="{{ url('/dashboard') }}"
                class="font-semibold-600 hover-900 dark-400 dark:hover focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
            <a href="{{ route('login') }}"
                class="font-semibold-600 hover-900 dark-400 dark:hover focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="ml-4 font-semibold-600 hover-900 dark-400 dark:hover focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
            @endauth
        </div>
        @endif
        <div class="">
            <div id="__next" data-reactroot="">

                <main>
                    <div class="relative pt-16 pb-32 flex content-center items-center justify-center"
                        style="min-height:75vh">
                        <div class="absolute top-0 w-full h-full bg-center bg-cover"
                            style="background-image:url('https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1267&amp;q=80')">
                            <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-black"></span>
                        </div>
                        <div class="container relative mx-auto">
                            <div class="items-center flex flex-wrap">
                                <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                                        <h1 class="text-white font-semibold text-5xl">Your story starts with us.</h1>
                                        <p class="mt-4 text-lg text-slate-200">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit. Sit aliquam, animi amet vel mollitia aspernatur in
                                            laboriosam nihil modi rem. Accusamus animi doloribus at obcaecati suscipit
                                            eos hic! Animi, blanditiis.</p>
                                </div>
                            </div>
                        </div>
                        <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
                            style="height:70px"><svg class="absolute bottom-0 overflow-hidden"
                                xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1"
                                viewBox="0 0 2560 100" x="0" y="0">
                                <polygon class="text-slate-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
                            </svg></div>
                    </div>
                    <section class="pb-20 bg-slate-200 -mt-24">
                        <div class="container mx-auto px-4">
                            <div class="flex flex-wrap">
                                <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
                                    <div
                                        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                                        <div class="px-4 py-5 flex-auto">
                                            <div
                                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                                                <i class="fas fa-award"></i>
                                            </div>
                                            <h6 class="text-xl font-semibold">Agency</h6>
                                            <p class="mt-2 mb-4 text-slate-500">Lorem ipsum dolor sit amet consectetur
                                                adipisicing elit. Porro necessitatibus quam mollitia at, nihil ad
                                                deleniti magni ipsa facilis provident earum velit molestias laboriosam
                                                iure architecto nostrum voluptatibus minus voluptates!
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full md:w-4/12 px-4 text-center">
                                    <div
                                        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                                        <div class="px-4 py-5 flex-auto">
                                            <div
                                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-sky-400">
                                                <i class="fas fa-retweet"></i>
                                            </div>
                                            <h6 class="text-xl font-semibold">Revisions</h6>
                                            <p class="mt-2 mb-4 text-slate-500">Lorem ipsum dolor sit amet consectetur
                                                adipisicing elit. Eius perferendis assumenda placeat est quae, nemo
                                                minus velit, iusto nesciunt totam, mollitia facilis ad expedita. Fuga
                                                quos corporis ullam quas porro?
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-6 w-full md:w-4/12 px-4 text-center">
                                    <div
                                        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                                        <div class="px-4 py-5 flex-auto">
                                            <div
                                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-emerald-400">
                                                <i class="fas fa-fingerprint"></i>
                                            </div>
                                            <h6 class="text-xl font-semibold">Verified</h6>
                                            <p class="mt-2 mb-4 text-slate-500">Lorem ipsum dolor sit amet consectetur
                                                adipisicing elit. Accusantium, porro at. A voluptate culpa, hic maxime
                                                voluptatibus exercitationem rerum iusto eos ratione ipsa eligendi.
                                                Saepe, cupiditate. Iure, hic tenetur? Odit.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap items-center mt-32">
                                <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                                    <div
                                        class="text-slate-500 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-slate-50">
                                        <i class="fas fa-user-friends text-xl"></i>
                                    </div>
                                    <h3 class="text-3xl mb-2 font-semibold leading-normal">Working with us is a pleasure
                                    </h3>
                                    <p class="text-lg font-light leading-relaxed mt-4 mb-4 text-slate-600">Lorem ipsum
                                        dolor sit, amet consectetur adipisicing elit. Voluptates impedit nobis odio
                                        dolores voluptatem vitae possimus fuga enim obcaecati sapiente quibusdam natus,
                                        porro, distinctio aut dolorum cumque? Commodi, aliquam quos.</p>
                                    <p class="text-lg font-light leading-relaxed mt-0 mb-4 text-slate-600">Lorem ipsum
                                        dolor sit amet consectetur adipisicing elit. Excepturi unde odio eos omnis
                                        doloremque animi dicta. Provident amet autem officiis exercitationem tempore
                                        ipsum dolorum aliquid ea non, nihil maxime rerum.</p>
                                </div>
                                <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
                                    <div
                                        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg ">
                                        <img alt="..."
                                            src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1051&amp;q=80"
                                            class="w-full align-middle rounded-t-lg">
                                        <blockquote class="relative p-8 mb-4"><svg preserveAspectRatio="none"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95"
                                                class="absolute left-0 w-full block" style="height:95px;top:-94px">
                                                <polygon points="-30,95 583,95 583,65"
                                                    class="text-green-600 fill-current"></polygon>
                                            </svg>
                                            <h4 class="text-xl font-bold ">Top Notch Services</h4>
                                            <p class="text-md font-light mt-2">Lorem ipsum dolor sit amet consectetur
                                                adipisicing elit. Est totam quas maiores dolor iure, deserunt eos
                                                aperiam magni! Necessitatibus possimus earum ducimus labore odit sint
                                                consequuntur, cum aliquid nam soluta.</p>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="relative py-20">
                        <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
                            style="height:80px"><svg class="absolute bottom-0 overflow-hidden"
                                xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1"
                                viewBox="0 0 2560 100" x="0" y="0">
                                <polygon class="text-white fill-current" points="2560 0 2560 100 0 100"></polygon>
                            </svg></div>
                        <div class="container mx-auto px-4">
                            <div class="items-center flex flex-wrap">
                                <div class="w-full md:w-4/12 ml-auto mr-auto px-4"><img alt="..."
                                        class="max-w-full rounded-lg shadow-lg"
                                        src="https://images.unsplash.com/photo-1555212697-194d092e3b8f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=634&amp;q=80">
                                </div>
                                <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
                                    <div class="md:pr-12">
                                        <div
                                            class="text-green-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-green-300">
                                            <i class="fas fa-rocket text-xl"></i>
                                        </div>
                                        <h3 class="text-3xl font-semibold">Growing company</h3>
                                        <p class="mt-4 text-lg leading-relaxed text-slate-500">Lorem ipsum dolor sit
                                            amet consectetur, adipisicing elit. Quae obcaecati consectetur sit illo
                                            labore doloribus, quo sequi aut, ipsa eum tenetur facere ipsum, consequuntur
                                            temporibus corporis? Dolore eligendi explicabo repellat.</p>
                                        <ul class="list-none mt-6">
                                            <li class="py-2">
                                                <div class="flex items-center">
                                                    <div><span
                                                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200 mr-3"><i
                                                                class="fas fa-fingerprint"></i></span></div>
                                                    <div>
                                                        <h4 class="text-slate-500">Carefully crafted components</h4>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="py-2">
                                                <div class="flex items-center">
                                                    <div><span
                                                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200 mr-3"><i
                                                                class="fab fa-html5"></i></span></div>
                                                    <div>
                                                        <h4 class="text-slate-500">Amazing page examples</h4>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="py-2">
                                                <div class="flex items-center">
                                                    <div><span
                                                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200 mr-3"><i
                                                                class="far fa-paper-plane"></i></span></div>
                                                    <div>
                                                        <h4 class="text-slate-500">Dynamic components</h4>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="pt-20 pb-48">
                        <div class="container mx-auto px-4">
                            <div class="flex flex-wrap justify-center text-center mb-24">
                                <div class="w-full lg:w-6/12 px-4">
                                    <h2 class="text-4xl font-semibold">Here are our heroes</h2>
                                    <p class="text-lg leading-relaxed m-4 text-slate-500">Lorem ipsum dolor sit amet
                                        consectetur adipisicing elit. Atque molestiae cupiditate expedita obcaecati
                                        nulla deserunt, ex culpa ipsum hic enim tempore laborum delectus doloremque sunt
                                        iste unde illo impedit dolore?</p>
                                </div>
                            </div>
                            <div class="flex flex-wrap">
                                <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
                                    <div class="px-6"><img alt="..."
                                            src="https://www.creative-tim.com/learning-lab/tailwind-starter-kit/img/team-1-800x800.jpg"
                                            class="shadow-lg rounded-full max-w-full mx-auto" style="max-width:120px">
                                        <div class="pt-6 text-center">
                                            <h5 class="text-xl font-bold">Ryan Tompson</h5>
                                            <p class="mt-1 text-sm text-slate-400 uppercase font-semibold">Web Developer
                                            </p>
                                            <div class="mt-6"><button
                                                    class="bg-sky-400 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                                    type="button"><i class="fab fa-twitter"></i></button><button
                                                    class="bg-sky-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                                    type="button"><i class="fab fa-facebook-square"></i></button><button
                                                    class="bg-green-500 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                                    type="button"><i class="fab fa-dribbble"></i></button></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
                                    <div class="px-6"><img alt="..."
                                            src="https://www.creative-tim.com/learning-lab/tailwind-starter-kit/img/team-2-800x800.jpg"
                                            class="shadow-lg rounded-full max-w-full mx-auto" style="max-width:120px">
                                        <div class="pt-6 text-center">
                                            <h5 class="text-xl font-bold">Romina Hadid</h5>
                                            <p class="mt-1 text-sm text-slate-400 uppercase font-semibold">Marketing
                                                Specialist</p>
                                            <div class="mt-6"><button
                                                    class="bg-red-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                                    type="button"><i class="fab fa-google"></i></button><button
                                                    class="bg-sky-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                                    type="button"><i class="fab fa-facebook-square"></i></button></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
                                    <div class="px-6"><img alt="..."
                                            src="https://www.creative-tim.com/learning-lab/tailwind-starter-kit/img/team-3-800x800.jpg"
                                            class="shadow-lg rounded-full max-w-full mx-auto" style="max-width:120px">
                                        <div class="pt-6 text-center">
                                            <h5 class="text-xl font-bold">Alexa Smith</h5>
                                            <p class="mt-1 text-sm text-slate-400 uppercase font-semibold">UI/UX
                                                Designer</p>
                                            <div class="mt-6"><button
                                                    class="bg-red-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                                    type="button"><i class="fab fa-google"></i></button><button
                                                    class="bg-sky-400 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                                    type="button"><i class="fab fa-twitter"></i></button><button
                                                    class="bg-slate-700 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                                    type="button"><i class="fab fa-instagram"></i></button></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
                                    <div class="px-6"><img alt="..."
                                            src="https://www.creative-tim.com/learning-lab/tailwind-starter-kit/img/team-4-470x470.png"
                                            class="shadow-lg rounded-full max-w-full mx-auto" style="max-width:120px">
                                        <div class="pt-6 text-center">
                                            <h5 class="text-xl font-bold">Jenna Kardi</h5>
                                            <p class="mt-1 text-sm text-slate-400 uppercase font-semibold">Founder and
                                                CEO</p>
                                            <div class="mt-6"><button
                                                    class="bg-green-500 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                                    type="button"><i class="fab fa-dribbble"></i></button><button
                                                    class="bg-red-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                                    type="button"><i class="fab fa-google"></i></button><button
                                                    class="bg-sky-400 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                                    type="button"><i class="fab fa-twitter"></i></button><button
                                                    class="bg-slate-700 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                                    type="button"><i class="fab fa-instagram"></i></button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="pb-20 relative block bg-slate-800">
                        <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
                            style="height:80px"><svg class="absolute bottom-0 overflow-hidden"
                                xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1"
                                viewBox="0 0 2560 100" x="0" y="0">
                                <polygon class="text-slate-800 fill-current" points="2560 0 2560 100 0 100"></polygon>
                            </svg></div>
                        <div class="container mx-auto px-4 lg:pt-24 lg:pb-64">
                            <div class="flex flex-wrap text-center justify-center">
                                <div class="w-full lg:w-6/12 px-4">
                                    <h2 class="text-4xl font-semibold text-white">Build something</h2>
                                    <p class="text-lg leading-relaxed mt-4 mb-4 text-slate-400">Lorem ipsum, dolor sit
                                        amet consectetur adipisicing elit. Sapiente repellendus inventore libero
                                        repellat quibusdam blanditiis laborum animi distinctio, ipsa alias eveniet, hic
                                        debitis exercitationem, minus fugit nemo similique. Assumenda, qui?</p>
                                </div>
                            </div>
                            <div class="flex flex-wrap mt-12 justify-center">
                                <div class="w-full lg:w-3/12 px-4 text-center">
                                    <div
                                        class="text-slate-800 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                                        <i class="fas fa-medal text-xl"></i>
                                    </div>
                                    <h6 class="text-xl mt-5 font-semibold text-white">Excelent Services</h6>
                                    <p class="mt-2 mb-4 text-slate-400">Lorem ipsum dolor sit amet consectetur,
                                        adipisicing elit. Expedita corrupti odit dolor hic porro sunt suscipit iure,
                                        quaerat enim dolore delectus aut consequuntur repellendus pariatur, dolorem
                                        minima possimus ratione maxime?</p>
                                </div>
                                <div class="w-full lg:w-3/12 px-4 text-center">
                                    <div
                                        class="text-slate-800 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                                        <i class="fas fa-poll text-xl"></i>
                                    </div>
                                    <h5 class="text-xl mt-5 font-semibold text-white">Grow your market</h5>
                                    <p class="mt-2 mb-4 text-slate-400">Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. Reprehenderit sed excepturi suscipit deleniti neque,
                                        temporibus quo corrupti. Sint, harum quo, qui reprehenderit eum soluta maxime,
                                        repellendus voluptatibus veritatis laborum sit.</p>
                                </div>
                                <div class="w-full lg:w-3/12 px-4 text-center">
                                    <div
                                        class="text-slate-800 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                                        <i class="fas fa-lightbulb text-xl"></i>
                                    </div>
                                    <h5 class="text-xl mt-5 font-semibold text-white">Launch time</h5>
                                    <p class="mt-2 mb-4 text-slate-400">Lorem ipsum dolor, sit amet consectetur
                                        adipisicing elit. Modi, quidem voluptates dignissimos perferendis animi,
                                        quibusdam beatae ipsa consequatur earum voluptas, quod iste doloremque.
                                        Doloribus quod dolore incidunt iure placeat? Dicta?</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="relative block py-24 lg:pt-0 bg-slate-800">
                        <div class="container mx-auto px-4">
                            <div class="flex flex-wrap justify-center lg:-mt-64 -mt-48">
                                <div class="w-full lg:w-6/12 px-4">
                                    <div
                                        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-slate-200">
                                        <div class="flex-auto p-5 lg:p-10">
                                            <h4 class="text-2xl font-semibold">Want to work with us?</h4>
                                            <p class="leading-relaxed mt-1 mb-4 text-slate-500">Complete this form and
                                                we will get back to you in 24 hours.</p>
                                            <div class="relative w-full mb-3 mt-8"><label
                                                    class="block uppercase text-slate-600 text-xs font-bold mb-2"
                                                    for="full-name">Full Name</label><input type="text"
                                                    class="border-0 px-3 py-3 placeholder-slate-300 text-slate-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    placeholder="Full Name"></div>
                                            <div class="relative w-full mb-3"><label
                                                    class="block uppercase text-slate-600 text-xs font-bold mb-2"
                                                    for="email">Email</label><input type="email"
                                                    class="border-0 px-3 py-3 placeholder-slate-300 text-slate-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                    placeholder="Email"></div>
                                            <div class="relative w-full mb-3"><label
                                                    class="block uppercase text-slate-600 text-xs font-bold mb-2"
                                                    for="message">Message</label><textarea rows="4" cols="80"
                                                    class="border-0 px-3 py-3 placeholder-slate-300 text-slate-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                                    placeholder="Type a message..."></textarea></div>
                                            <div class="text-center mt-6"><button
                                                    class="bg-lightBlue-500  active:bg-lightBlue-600 font-bold  px-4 py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3 ease-linear transition-all duration-150"
                                                    type="button">Send Message</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>
                <footer class="relative bg-slate-200 pt-8 pb-6">
                    <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
                        style="height:80px"><svg class="absolute bottom-0 overflow-hidden"
                            xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1"
                            viewBox="0 0 2560 100" x="0" y="0">
                            <polygon class="text-slate-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
                        </svg></div>
                    <div class="container mx-auto px-4">
                        <div class="flex flex-wrap">
                            <div class="w-full md:w-6/12 px-4">
                                <h4 class="text-3xl font-semibold">Let's keep in touch!</h4>
                                <h5 class="text-lg mt-0 mb-2 text-slate-600">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Libero molestiae aperiam eligendi possimus repellat corporis,
                                    aliquam dignissimos ducimus dolores dolore vero iusto iure ipsam, optio iste
                                    recusandae in nemo? Odio?</h5>
                                <div class="mt-6"><a href="https://www.twitter.com/creativetim" target="_blank"><i
                                            class="fab fa-twitter bg-white text-sky-400 shadow-lg font-lg p-3 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 inline-block text-center"></i></a><a
                                        href="https://www.facebook.com/creativetim" target="_blank"><i
                                            class="fab fa-facebook-square bg-white text-sky-600 shadow-lg font-lg p-3 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 inline-block text-center"></i></a><a
                                        href="https://www.dribbble.com/creativetim" target="_blank"><i
                                            class="fab fa-dribbble bg-white text-green-400 shadow-lg font-lg p-3 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 inline-block text-center"></i></a><a
                                        href="https://www.github.com/creativetimofficial" target="_blank"><i
                                            class="fab fa-github bg-white text-slate-800 shadow-lg font-lg p-3 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 inline-block text-center"></i></a>
                                </div>

                            </div>
                            <div class="w-full md:w-6/12 px-4">
                                <div class="flex flex-wrap items-top mb-6">
                                    <div class="w-full md:w-6/12 xl:w-4/12 pt-6 md:pt-0 md:px-4 ml-auto"><span
                                            class="block uppercase text-slate-500 text-sm font-semibold mb-2">Useful
                                            Links</span>
                                        <ul class="list-unstyled">
                                            <li><a class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
                                                    href="https://www.creative-tim.com/presentation"
                                                    target="_blank">About Us</a></li>
                                            <li><a class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
                                                    href="https://creative-tim.com/blog" target="_blank">Blog</a></li>
                                            <li><a class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
                                                    href="https://www.github.com/creativetimofficial/tailwind-starter-kit"
                                                    target="_blank">Github</a></li>
                                            <li><a class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
                                                    href="https://www.creative-tim.com/bootstrap-themes/free"
                                                    target="_blank">Free Products</a></li>
                                        </ul>
                                    </div>
                                    <div class="w-full md:w-6/12 xl:w-4/12 pt-6 md:pt-0 md:px-4 ml-auto"><span
                                            class="block uppercase text-slate-500 text-sm font-semibold mb-2">Other
                                            Resources</span>
                                        <ul class="list-unstyled">
                                            <li><a class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
                                                    href="https://github.com/creativetimofficial/tailwind-starter-kit/blob/master/LICENSE.md"
                                                    target="_blank">MIT License</a></li>
                                            <li><a class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
                                                    href="https://creative-tim.com/terms" target="_blank">Terms &amp;
                                                    Conditions</a></li>
                                            <li><a class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
                                                    href="https://creative-tim.com/privacy" target="_blank">Privacy
                                                    Policy</a></li>
                                            <li><a class="text-slate-600 hover:text-slate-800 font-semibold block pb-2 text-sm"
                                                    href="https://creative-tim.com/contact-us" target="_blank">Contact
                                                    Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-6 border-slate-300">
                        <div class="flex flex-wrap items-center md:justify-between justify-center">
                            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                                <div class="text-sm text-slate-500 font-semibold py-1">Copyright ©
                                    Nexacode
                                </div>
                            </div>
                        </div>
                </footer>
            </div>
        </div>
    </div>
</body>
<script>
    const toggleBtn = document.querySelector('#toggleBtn');
    const targetDiv = document.querySelector('#targetDiv');
    
    toggleBtn.addEventListener('click', () => {
      targetDiv.classList.toggle('hidden');
    });
  </script>
</html>