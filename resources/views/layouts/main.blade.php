<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ URL::asset('img/bursa_logo_only.ico') }}" type="image/x-icon">
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
      rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
      rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/5cedab7152.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('style.css') }}" />
    <title>Bursa Travel</title>
  </head>
  <body>
    <nav>
      <div class="nav__header">
        <div class="nav__logo">
          <img class="w-32 m-auto h-full"
            src="{{ URL::asset('img/bursa_logo.png') }}" alt="Bursa Travel Logo">
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <i class="ri-menu-line"></i>
        </div>
      </div>
      <ul class="nav__links" id="nav-links">
        <li><a href="/">BERANDA</a></li>
        <li><a href="/about-us">TENTANG KAMI</a></li>
        <li><a href="/services">LAYANAN</a></li>
        <li><a href="/activity">AKTIFITAS</a></li>
        <li><a href="/contact-us">KONTAK KAMI</a></li>
        <li><a href="#">BOOK TRIP</a></li>
      </ul>
      <div class="nav__btns">
        <button class="btn">HUBUNGI KAMI!</button>
      </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer id="contact">
      <div class="section__container footer__container">
        <div class="footer__col">
          <div class="footer__logo">
            <a href="#" class="logo">Bursa Umroh Haji</a>
          </div>
          <p class="text-justify">
            Kami adalah Bursa Umroh Haji Indonesia, sebuah 
            lembaga pertemuan (market) yang dikelola secara 
            profesional untuk memberikan kemudahan dan kenyamanan ibadah umroh dan haji.
          </p>
          <ul class="footer__socials">
            <li>
              <a href="#!"><i class="ri-facebook-fill"></i></a>
            </li>
            <li>
              <a href="#!"><i class="ri-instagram-line"></i></a>
            </li>
            <li>
              <a href="#!"><i class="ri-youtube-line"></i></a>
            </li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Quick Links</h4>
          <ul class="footer__links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Bus</a></li>
            <li><a href="#">Hotels</a></li>
            <li><a href="#">Cruise</a></li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Contact Us</h4>
          <ul class="footer__links">
            <li>
              <a href="#">
                <span><i class="ri-phone-fill"></i></span>0{{ $configs->whatsapp_num }}</a>
              </a>
            </li>
            <li>
              <a href="#">
                <span><i class="ri-record-mail-line"></i></span>
                {{ $configs->gmail }}
              </a>
            </li>
            <li>
              <a href="#">
                <span><i class="ri-map-pin-2-fill"></i></span> {{ $configs->address }}
              </a>
            </li>
          </ul>
        </div>
        <div class="footer__col">
          <h4>Subscribe</h4>
          <form action="#!">
            <input type="text" placeholder="Enter your email" />
            <button class="btn">Subscribe</button>
          </form>
        </div>
      </div>
      <div class="footer__bar">
        Copyright © 2025 Bursa. All rights reserved.
      </div>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="{{ asset('main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  </body>
</html>
