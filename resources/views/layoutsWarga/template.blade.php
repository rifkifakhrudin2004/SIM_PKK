<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preload" as="style" href="https://sirawa.diy-projects.my.id/build/assets/app-CpcPcW1F.css" />
    <link rel="modulepreload" href="https://sirawa.diy-projects.my.id/build/assets/app-C9pRe2dr.js" />
    <link rel="stylesheet" href="https://sirawa.diy-projects.my.id/build/assets/app-CpcPcW1F.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script type="module" src="https://sirawa.diy-projects.my.id/build/assets/app-C9pRe2dr.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="icon" type="image/x-icon" href="{{ asset('adminlte/dist/img/VENU53.svg') }}">
    <title>Landing Page PKK</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Noto+Sans+Javanese&display=swap" rel="stylesheet">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        body {
            background-color: #023047; 
            color: white; 
        }

        nav {
            background-color: #023047; 
        }

        .image-container {
            position: relative;
            width: 100%;
            padding-bottom: 50%; 
            overflow: hidden;
        }

        .image-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper-button-next, .swiper-button-prev {
            color: white; 
        }
        .btn-login {
            padding: 0.25rem 1.25rem;
            background-color: #fb8500;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            border-radius: 1.25rem;
            font-size: 1.125rem;
            font-weight: 600;
            color: white;
            border: 2px solid #fb8500;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        .btn-login:hover {
            background-color: white;
            color: #fb8500;
            border-color: #fb8500;
        }
        
        .nav-link {
            display: block;
            padding: 0.5rem 0.75rem;
            border-radius: 0.5rem;
            text-decoration: none;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
            position: relative;
        }

        .nav-link .underline {
            position: absolute;
            height: 2.5px;
            width: 100%;
            transform: scaleX(0);
            transition: transform 0.5s ease-in-out;
        }

        .nav-link:hover .underline, .nav-link.active .underline {
            transform: scaleX(1);
        }

        .nav-link:hover {
            color: white;
        }

        .nav-link.active {
            color: white;
        }

        .home-link {
            background-color: #fb8500;
            color: white;
        }

        .home-link .underline {
            background-color: #fb8500;
        }

        .profil-link {
            color: white;
        }

        .profil-link .underline {
            background-color: white;
        }

        .profil-link:hover {
            background-color: transparent;
            color: white;
        }

        .profil-link:hover .underline {
            background-color: #fb8500;
        }

        @media (min-width: 1024px) {
            .nav-link {
                background-color: transparent;
                padding: 0;
            }

            .nav-link:hover {
                background-color: transparent;
            }

            .nav-link .underline {
                position: absolute;
            }

            .home-link {
                color: white;
            }

            .profil-link {
                color: white;
            }

            .profil-link:hover {
                color: white;
            }
            .bg-gradient-blue {
                    background: linear-gradient(to bottom, #00171f, #00a8e8);
                }
        }


    </style>
</head>

<body x-data="{'loaded': true}">
    <nav class="sticky top-0 z-[99] bg-#0b009e border-gray-200 dark:border-gray-600 border-b-2 h-fit" id="navbar" style="transition: all 0.5s">
        <div class="w-full flex flex-wrap items-center justify-between lg:px-12 sm:px-10 px-5 py-4">
            <a href="{{ route('login') }}" class="flex items-center space-x-3">
                <img src="{{ asset('adminlte/dist/img/VENU53.svg') }}" class="sm:h-12 h-9 sm:hidden block" alt="Logo" />
                <img src="{{ asset('adminlte/dist/img/VENU53.svg') }}" class="sm:h-12 h-9 hidden sm:block">
            </a>
    
            <div class="flex items-center lg:order-2 sm:space-x-3 space-x-2 lg:space-x-0 lg:gap-3" x-data="{'open': true}">
                <div class="relative hidden" x-data="{ dropdownOpen: false, notifying: true, open: true }" @click.outside="dropdownOpen = false">
                    <a class="relative flex h-9 w-9 items-center justify-center rounded-full dark:hover:bg-gray-600 hover:bg-slate-200" href="#" @click.prevent="dropdownOpen = ! dropdownOpen; notifying = false; open = false">
                        <div x-show="open" class="absolute w-3 h-3 bg-red-500 border-2 border-white rounded-full top-1 start-4 dark:border-gray-900 block hidden"></div>
                        <i class="fa-solid fa-bell text-xl text-gray-500 dark:text-white"></i>
                    </a>
    
                </div>
    
                <a href="{{ route('login') }}" class="btn-login">Login</a>

                <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden sm:w-[40%] w-[60%] lg:flex lg:w-auto lg:order-1 absolute lg:static sm:top-15 top-17 right-5" id="navbar-user">
                <ul class="flex flex-col font-bold p-4 lg:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 lg:space-x-8 rtl:space-x-reverse lg:flex-row lg:mt-0 lg:border-0 lg:bg-transparent dark:bg-[#2F363E] lg:dark:bg-transparent dark:border-gray-400">
                    <li>
                        <a href="#" class="nav-link home-link">
                            Home
                            <div class="underline"></div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profil') }}" class="nav-link profil-link">
                            Profil
                            <div class="underline"></div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        let prevScrollpos = window.pageYOffset;

        window.onscroll = function() {
            let currentScrollPos = window.pageYOffset;

            if (window.innerWidth >= 500) {
                if (prevScrollpos > currentScrollPos) {
                    document.getElementById("navbar").style.top = "0";
                } else {
                    document.getElementById("navbar").style.top = "-80px";
                }
            }

            prevScrollpos = currentScrollPos;
        }
    </script>
 
    <div class="min-h-[20vh] w-[100%] shadow-xl pb-[13vh] bg-gradient-blue">

        <div class="relative sm:h-[100vh] h-fit w-full flex flex-col lg:flex-row text-white 2xl:px-25 sm:px-20 px-5 items-center justify-center lg:justify-between py-10 sm:py-0">
            <div class="2xl:w-[58%] lg:w-[60%] w-full flex flex-col justify-center items-start sm:items-center md:items-start h-fit 2xl:pb-12 lg:pb-13 pt-5 sm:pt-0" data-aos="fade-right" data-aos-easing="ease-in-out" data-aos-duration="1000" data-aos-delay="500">
                <div class="font-bold sm:text-4xl text-3xl sm:mb-3">
                    Selamat Datang di
                </div>
                <div class="font-extrabold sm:text-6xl text-[38px] sm:mb-4">
                    SIM PKK RW 5 <BR>
                    KEL. TLOGOMAS <BR>
                    KEC. LOWOKWARU <BR>
                    KOTA MALANG
                </div>

                <div class="relative overflow-hidden w-fit">
                    <div class="font-extrabold sm:text-6xl text-[38px] sm:mb-10 mb-5 w-fit">
                        <span class="multiple-text"></span>
                    </div>
                </div>

                <p class="font-medium text-xl lg:w-[47vw] sm:w-full w-[95%] text-justify">
                    Mengenalkan Kegiatan PKK di RW 05 Tlogomas, Kecamatan Lowokwaru, Kota Malang.
                    Menyediakan Layanan bagi anggota untuk melakukan kegiatan PKK seperti Arisan dan Simpan Pinjam.
                    Serta Menyampaikan informasi mengenai kegiatan yang diselenggarakan oleh PKK RW 05 Tlogomas, Kecamatan Lowokwaru, Kota Malang.</p>
            </div>
            <div class="lg:absolute relative lg:pb-[12vh] 2xl:right-15 lg:right-10" data-aos="fade-left" data-aos-easing="ease-in-out" data-aos-duration="1000" data-aos-delay="500">
                <img src="{{ asset('adminlte/dist/img/denahkeltlogomas.jpg') }}" alt="" class="lg:h-[80vh] h-[50vh] dark:hidden block">
            </div>
        </div>
        <div class="font-bold text-white sm:text-5xl text-4xl text-center w-full py-4 uppercase">Dokumentasi Kegiatan</div>
            <div class="swiper mySwiper !xl:w-full !w-full !px-8 lg:!px-10">
                <div class="swiper-wrapper !w-full !sm:py-20 !py-12">
                    <div class="swiper-slide relative bg-[#0B3D91] rounded-2xl shadow-lg flex flex-col overflow-hidden hover:shadow-2xl transition ease-in-out duration-500 group cursor-pointer">
                        <div class="image-container">
                            <img src="{{ asset('adminlte/dist/img/PERINGATAN PKK MALANG.jpg') }}" alt="" class="group-hover:brightness-[0.4] transition ease-in-out duration-500 group-hover:scale-110">
                        </div>
                    </div>
                    <div class="swiper-slide relative bg-[#0B3D91] rounded-2xl shadow-lg flex flex-col overflow-hidden hover:shadow-2xl transition ease-in-out duration-500 group cursor-pointer">
                        <div class="image-container">
                            <img src="{{ asset('adminlte/dist/img/jb.jpg') }}" alt="" class="group-hover:brightness-[0.4] transition ease-in-out duration-500 group-hover:scale-110">
                        </div>
                    </div>
                    <div class="swiper-slide relative bg-[#0B3D91] rounded-2xl shadow-lg flex flex-col overflow-hidden hover:shadow-2xl transition ease-in-out duration-500 group cursor-pointer">
                        <div class="image-container">
                            <img src="{{ asset('adminlte/dist/img/wr.jpg') }}" alt="" class="group-hover:brightness-[0.4] transition ease-in-out duration-500 group-hover:scale-110">
                        </div>
                    </div>
                    <div class="swiper-slide relative bg-[#0B3D91] rounded-2xl shadow-lg flex flex-col overflow-hidden hover:shadow-2xl transition ease-in-out duration-500 group cursor-pointer">
                        <div class="image-container">
                            <img src="{{ asset('adminlte/dist/img/ss.jpg') }}" alt="" class="group-hover:brightness-[0.4] transition ease-in-out duration-500 group-hover:scale-110">
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next !right-5 after:!text-lg !font-extrabold !text-white !h-10 !w-10 bg-yellow-500 hover:bg-[#E2A229] rounded-full hover:scale-105 transition ease-in-out duration-300"></div>
                <div class="swiper-button-prev !left-5 after:!text-lg !font-extrabold !text-white !h-10 !w-10 bg-yellow-500 hover:bg-[#E2A229] rounded-full hover:scale-105 transition ease-in-out duration-300"></div>
            </div>
            <div class="font-bold text-white sm:text-5xl text-4xl text-center w-full py-4 uppercase">Jumlah Penduduk</div>
            <br>
            <iframe 
                width="850" 
                height="600" 
                src="https://lookerstudio.google.com/embed/reporting/d1049fe8-2fcf-4c5c-914a-e529d0048c2e/page/3X52D" 
                frameborder="0" 
                style="border:0; margin: auto; display: block; background: none;" 
                allowfullscreen 
                sandbox="allow-storage-access-by-user-activation allow-scripts allow-same-origin allow-popups allow-popups-to-escape-sandbox">
            </iframe>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.mySwiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        });
    </script>
</body>
<footer class="pt-16 w-full" style="background: linear-gradient(to bottom, #0196d1, #00171f)">
    <div style="display: flex; justify-content: space-between; margin: 0 auto; max-width: 90%; padding: 20px;">
        <div class="col-span-2 text-center lg:text-left">
            <a href="/" aria-label="Go home" title="Company" class="inline-flex items-center gap-4">
                <img src="{{ asset('adminlte/dist/img/logo_jti_baru.png') }}" height="100" width="100">
            </a>
            <a href="/" aria-label="Go home" title="Company" class="inline-flex items-center gap-4">
                <img src="{{ asset('adminlte/dist/img/VENU53.svg') }}" height="200" width="200">
            </a>
            <div class="mt-6 lg:max-w-sm"></div>
        </div>
        <div class="sm:pl-5 pl-0 lg:pl-0">
            <span class="text-base font-bold tracking-wide text-gray-900 dark:text-white" style="color: white">Sosial Media</span>
            <div class="flex items-center mt-1 space-x-3 text-xl">
                <a href="https://x.com/?lang=id" class="text-gray-500 dark:text-white transition-colors duration-300 hover:text-deep-purple-accent-400" style="color: white">
                    <i class="fa-brands fa-square-x-twitter"></i>
                </a>
                <a href="https://www.instagram.com/" class="text-gray-500 dark:text-white transition-colors duration-300 hover:text-deep-purple-accent-400" style="color: white">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/?locale=id_ID" class="text-gray-500 dark:text-white transition-colors duration-300 hover:text-deep-purple-accent-400" style="color: white">
                    <i class="fa-brands fa-square-facebook"></i>
                </a>
                <a href="https://www.youtube.com/" class="text-gray-500 dark:text-white transition-colors duration-300 hover:text-deep-purple-accent-400" style="color: white">
                    <i class="fa-brands fa-youtube"></i>
                </a>
                <a href="https://www.tiktok.com/id-ID/" class="text-gray-500 dark:text-white transition-colors duration-300 hover:text-deep-purple-accent-400" style="color: white">
                    <i class="fa-brands fa-tiktok"></i>
                </a>
            </div>
        </div>
        <div class="space-y-2 text-sm text-right lg:text-left sm:pr-5 lg:pr-0">
            <p class="text-base font-bold tracking-wide text-gray-900 dark:text-white" style="color: white">Hubungi</p>
            <div class="flex lg:justify-start justify-end">
                <i class="fa-solid fa-phone"> TELEPON : 0822-3326-7573</i>
                <p class="mr-1 text-gray-800 dark:text-white hidden sm:inline-flex" style="color: white"></p>
                <a href="tel:0822-3326-7573" aria-label="Our phone" title="Our phone" class="transition-colors duration-300 text-deep-purple-accent-400 dark:text-white hover:text-deep-purple-800"></a>
            </div>
            <div class="flex lg:justify-start justify-end">
                <i class="fa-solid fa-envelope"> EMAIL : venus53@gmail.com</i>
                <a href="mailto:venus53@gmail.com" aria-label="Our email" title="Our email" class="transition-colors duration-300 text-deep-purple-accent-400 dark:text-white hover:text-deep-purple-800"></a>
            </div>
            <div class="flex lg:justify-start justify-end">
                <i class="fa-solid fa-location-dot">  ALAMAT : Jl. Venus 53, Tlogomas, Malang</i>
                <p class="mr-1 text-gray-800 dark:text-white hidden sm:inline-flex" style="color: white"></p>
                <a href="https://www.google.com/maps" target="_blank" rel="noopener noreferrer" aria-label="Our address" title="Our address" class="transition-colors duration-300 text-deep-purple-accent-400 dark:text-white hover:text-deep-purple-800"></a>
            </div>
        </div>
    </div>
    <div class="flex flex-col-reverse justify-center items-center pt-5 pb-5 border-t lg:flex-row">
        <p class="text-sm text-gray-600 dark:text-white" style="color: white">
            Copyright © 2024 SIM PKK RW 05 TLOGOMAS. All rights reserved.
        </p>
    </div>
</footer>
</html>