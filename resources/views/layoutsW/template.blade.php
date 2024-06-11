
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

        <title>ABOUT</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    
    <!-- Primary Meta Tags -->
    <meta name="title" content="Laravel - The PHP Framework For Web Artisans">
    <meta name="description" content="Laravel is a PHP web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.">

    {{-- <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://laravel.com/">
    <meta property="og:title" content="Laravel - The PHP Framework For Web Artisans">
    <meta property="og:description" content="Laravel is a PHP web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.">
    <meta property="og:image" content="https://laravel.com/img/og-image.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://laravel.com/">
    <meta property="twitter:title" content="Laravel - The PHP Framework For Web Artisans">
    <meta property="twitter:description" content="Laravel is a PHP web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.">
    <meta property="twitter:image" content="https://laravel.com/img/og-image.jpg">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#ff2d20">
    <link rel="shortcut icon" href="/img/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#ff2d20">
    <meta name="msapplication-config" content="/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <meta name="color-scheme" content="light"> --}}

    <link rel="preconnect" href="https://E3MIRNPJH5-dsn.algolia.net" crossorigin />

    <link rel="stylesheet" href="https://use.typekit.net/ins2wgm.css">
    <link rel="preload" as="style" href="https://laravel.com/build/assets/app-409e9bd3.css" /><link rel="modulepreload" href="https://laravel.com/build/assets/app-2c9b9d45.js" /><link rel="stylesheet" href="https://laravel.com/build/assets/app-409e9bd3.css" /><script type="module" src="https://laravel.com/build/assets/app-2c9b9d45.js"></script>
            <!-- Fathom - beautiful, simple website analytics -->
        <script src="https://cdn.usefathom.com/script.js" data-site="DVMEKBYF" defer></script>
        <!-- / Fathom -->

        <!-- Clearbit -->
        <script async src="https://tag.clearbitscripts.com/v1/pk_97d2bf69f817feb07be42fcda1460119/tags.js" referrerpolicy="strict-origin-when-cross-origin"></script>
    
    
    <script>
        const alwaysLightMode = true;
    </script>

    <script>
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
        if (localStorage.theme === 'system') {
            if (e.matches) {
                document.documentElement.classList.add('dark');
                document.documentElement.setAttribute('data-theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                document.documentElement.setAttribute('data-theme', 'light');
            }
        }

        updateThemeAndSchemeColor();
    });

    function updateTheme() {
        if (!('theme' in localStorage)) {
            localStorage.theme = 'system';
        }

        switch (localStorage.theme) {
            case 'system':
                if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.classList.add('dark');
                    document.documentElement.setAttribute('data-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    document.documentElement.setAttribute('data-theme', 'light');
                }

                document.documentElement.setAttribute('color-theme', 'system');
                break;

            case 'dark':
                document.documentElement.classList.add('dark');
                document.documentElement.setAttribute('color-theme', 'dark');
                document.documentElement.setAttribute('data-theme', 'dark');
                break;

            case 'light':
                document.documentElement.classList.remove('dark');
                document.documentElement.setAttribute('color-theme', 'light');
                document.documentElement.setAttribute('data-theme', 'light');
                break;
        }

        updateThemeAndSchemeColor();
    }

    function updateThemeAndSchemeColor() {
        if (! alwaysLightMode) {
            if (document.documentElement.classList.contains('dark')) {
                document.querySelector('meta[name="color-scheme"]').setAttribute('content', 'dark');
                document.querySelector('meta[name="theme-color"]').setAttribute('content', '#171923');

                return;
            }

            document.querySelector('meta[name="color-scheme"]').setAttribute('content', 'light');
            document.querySelector('meta[name="theme-color"]').setAttribute('content', '#ffffff');
        }
    }

    updateTheme();
</script>
</head>
<body
    x-data="{
        navIsOpen: false,
    }"
    class="w-full h-full font-sans antialiased text-gray-900 language-php"
>

    <div class="absolute top-0 w-full">
        <header
    x-trap.inert.noscroll="navIsOpen"
    class="main-header relative z-50 text-gray-700"
    @keydown.window.escape="navIsOpen = false"
    @click.away="navIsOpen = false"
>
    <div class="hidden lg:flex items-center justify-center bg-gradient-to-b from-red-500 to-red-600 p-2 text-center text-white text-sm">
            <div><svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                </svg></div>

                <div class="hujanbahasa" style="display: flex; justify-content: space-between; align-items: center;">
                    <div class="hujan">
                      <a href="http://localhost/SIM_PKK/public/" style="margin-right: 10px;">Back   </a>
                    </div>
                    <div class="tentang-kami">
                      <a href="#">Tentang Kami</a>
                    </div>
                  </div>
    </div>

</a>
                <button
                    class="ml-2 relative w-10 h-10 inline-flex items-center justify-center p-2 text-gray-700 lg:hidden"
                    aria-label="Toggle Menu"
                    @click.prevent="navIsOpen = !navIsOpen"
                >
                    <svg x-show="! navIsOpen" class="w-6" viewBox="0 0 28 12" fill="none" xmlns="http://www.w3.org/2000/svg"><line y1="1" x2="28" y2="1" stroke="currentColor" stroke-width="2"/><line y1="11" x2="28" y2="11" stroke="currentColor" stroke-width="2"/></svg>
                    <svg x-show="navIsOpen" x-cloak class="absolute inset-0 mt-2.5 ml-2.5 w-5" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg"><rect y="1.41406" width="2" height="24" transform="rotate(-45 0 1.41406)" fill="currentColor"/><rect width="2" height="24" transform="matrix(0.707107 0.707107 0.707107 -0.707107 0.192383 16.9707)" fill="currentColor"/></svg>
                </button>
            </div>
        </div>
    </div>
</header>
    </div>

    <div>
        <section class="relative overflow-hidden pt-48 pb-20 lg:pt-48 xl:pt-56 xl:pb-28">
            <span class="hidden absolute bg-radial-gradient opacity-[.15] pointer-events-none lg:inline-flex left-[-20%] -top-24 w-[640px] h-[640px]"></span>
            <div class="relative max-w-screen-xl px-5 mx-auto">
                <div class="absolute -left-2 -translate-y-12 pointer-events-none md:left-[12%]">
                    <svg
    x-data="{
        initializeAnimation: false,
        init() {
            setTimeout(() => {
                this.initializeAnimation = true;
            }, 0);
        },
    }"
    :class="initializeAnimation ? 'animate-cube' : ''"
    class="text-red-600"
    width="46"
    height="53"
    viewBox="0 0 46 53"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
>
    <path d="m23.102 1 22.1 12.704v25.404M23.101 1l-22.1 12.704v25.404" stroke="currentColor" stroke-width="1.435" stroke-linejoin="bevel"/><path d="m45.202 39.105-22.1 12.702L1 39.105" stroke="currentColor" stroke-width="1.435" stroke-linejoin="bevel"/><path transform="matrix(.86698 .49834 .00003 1 1 13.699)" stroke="currentColor" stroke-width="1.435" stroke-linejoin="bevel" d="M0 0h25.491v25.405H0z"/><path transform="matrix(.86698 -.49834 -.00003 1 23.102 26.402)" stroke="currentColor" stroke-width="1.435" stroke-linejoin="bevel" d="M0 0h25.491v25.405H0z"/><path transform="matrix(.86701 -.49829 .86701 .49829 1 13.702)" stroke="currentColor" stroke-width="1.435" stroke-linejoin="bevel" d="M0 0h25.491v25.491H0z"/>
</svg>
                </div>
                <div class="absolute -right-2 -translate-y-20 pointer-events-none md:right-1/4">
                    <svg
    x-data="{
        initializeAnimation: false,
        init() {
            setTimeout(() => {
                this.initializeAnimation = true;
            }, 2000);
        },
    }"
    :class="initializeAnimation ? 'animate-cube' : ''"
    class="text-red-600"
    width="46"
    height="53"
    viewBox="0 0 46 53"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
>
    <path d="m23.102 1 22.1 12.704v25.404M23.101 1l-22.1 12.704v25.404" stroke="currentColor" stroke-width="1.435" stroke-linejoin="bevel"/><path d="m45.202 39.105-22.1 12.702L1 39.105" stroke="currentColor" stroke-width="1.435" stroke-linejoin="bevel"/><path transform="matrix(.86698 .49834 .00003 1 1 13.699)" stroke="currentColor" stroke-width="1.435" stroke-linejoin="bevel" d="M0 0h25.491v25.405H0z"/><path transform="matrix(.86698 -.49834 -.00003 1 23.102 26.402)" stroke="currentColor" stroke-width="1.435" stroke-linejoin="bevel" d="M0 0h25.491v25.405H0z"/><path transform="matrix(.86701 -.49829 .86701 .49829 1 13.702)" stroke="currentColor" stroke-width="1.435" stroke-linejoin="bevel" d="M0 0h25.491v25.491H0z"/>
</svg>
                </div>
                <div class="absolute bottom-0 right-6 -translate-y-20 pointer-events-none md:right-[12%]">
                    <svg
    x-data="{
        initializeAnimation: false,
        init() {
            setTimeout(() => {
                this.initializeAnimation = true;
            }, 1000);
        },
    }"
    :class="initializeAnimation ? 'animate-cube' : ''"
    class="text-red-600"
    width="46"
    height="53"
    viewBox="0 0 46 53"
    fill="none"
    xmlns="http://www.w3.org/2000/svg"
>
    <path d="m23.102 1 22.1 12.704v25.404M23.101 1l-22.1 12.704v25.404" stroke="currentColor" stroke-width="1.435" stroke-linejoin="bevel"/><path d="m45.202 39.105-22.1 12.702L1 39.105" stroke="currentColor" stroke-width="1.435" stroke-linejoin="bevel"/><path transform="matrix(.86698 .49834 .00003 1 1 13.699)" stroke="currentColor" stroke-width="1.435" stroke-linejoin="bevel" d="M0 0h25.491v25.405H0z"/><path transform="matrix(.86698 -.49834 -.00003 1 23.102 26.402)" stroke="currentColor" stroke-width="1.435" stroke-linejoin="bevel" d="M0 0h25.491v25.405H0z"/><path transform="matrix(.86701 -.49829 .86701 .49829 1 13.702)" stroke="currentColor" stroke-width="1.435" stroke-linejoin="bevel" d="M0 0h25.491v25.491H0z"/>
</svg>
                </div>
                <div class="relative">
                    <h1 class="max-w-3xl mx-auto text-5xl font-bold text-center md:text-6xl lg:text-7xl">Sistem Informasi PKK VENUS
                        <br class="hidden lg:inline"><span class="text-red-500"></span></h1>
                    <p
                        class="mt-6 max-w-xl mx-auto text-center text-gray-700 text-md leading-relaxed md:mt-8 md:text-lg lg:mt-10">
                         Mengenalkan Kegiatan PKK di RW 05 Tlogomas ,Kecamatan Lowokwaru , Kota Malang.
                         Menyediakan Layanan untuk anggota untuk melakukan kegiatan PKK seperti Arisan dan Simpan Pinjam.
                         Menyampaikan informasi mengenai kegiatan yang diselenggarakan di PKK RW 05 Tlogomas ,Kecamatan Lowokwaru , Kota Malang.
                    </p>
                    
                    <div
                        class="mt-6 max-w-sm mx-auto flex flex-col justify-center items-center gap-4 sm:flex-row md:mt-8 lg:mt-10">
                        <a class="group relative inline-flex border border-red-500 focus:outline-none w-full sm:w-auto" href="/docs"></a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="relative overflow-hidden pt-12 pb-16 md:pt-24 lg:pt-48">
        <div class="max-w-screen-xl w-full mx-auto px-5 grid gap-12 lg:grid-cols-2">
            <div class="flex justify-center items-center">
            </div>
        </div>
    </div>


