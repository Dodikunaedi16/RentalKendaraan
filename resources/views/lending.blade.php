<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Car Rental</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
      <style>
        body {
          font-family: 'Inter', sans-serif;
        }
        .text-shadow {
          text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);
        }
        .slider-container {
            position: relative;
            width: 100%;
            max-height: 400px;
            overflow: hidden;
        }
        .slide-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
        .text-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            z-index: 10;
            width: 80%;
        }
        .text-overlay h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .text-overlay p {
            font-size: 1.2rem;
        }
        .menu-icon {
            display: none;
            font-size: 24px;
            cursor: pointer;
            background: white;
            color: black;
            padding: 10px;
            border-radius: 5px;
        }
        @media (max-width: 768px) {
            .text-overlay {
                width: 90%;
                padding: 15px;
            }
            .text-overlay h1 {
                font-size: 1.8rem;
            }
            .text-overlay p {
                font-size: 1rem;
            }
            .nav-links {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 60px;
                left: 0;
                background-color: white;
                width: 100%;
                text-align: center;
                padding: 10px 0;
            }
            .nav-links.active {
                display: flex;
            }
            .menu-icon {
                display: block;
            }
        }
    </style>
    <body class="bg-gray-100">
      <!-- Header -->
      <header class="bg-white shadow sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
          <div class="text-2xl font-bold text-blue-600"> <i class="fa fa-car me-2"></i> Rental</div>
          <div class="menu-icon" onclick="toggleMenu()">☰</div>
          <nav class="nav-links space-x-4 hidden md:flex">
            <a href="#" class="text-gray-700 hover:text-blue-600 transition">HOME</a>
            <a href="{{route('mobil')}}" class="text-gray-700 hover:text-blue-600 transition">Mobil</a>
            <a href="{{route('transaksi')}}" class="text-gray-700 hover:text-blue-600 transition">Transaksi</a>
            <a href="{{route('laporan')}}" class="text-gray-700 hover:text-blue-600 transition">Laporan Transaksi</a>
          </nav>
          <a href="{{route('login')}}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Login</a>
        </div>
      </header>

  <main>
    <section class="slider-container">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('lending/images/home1.jpg') }}" alt="Mobil di Indonesia" class="slide-image" />
                    <div class="text-overlay">
                        <h1>Rent a Car in Indonesia</h1>
                        <p>Pesan langsung dari pemasok lokal. Tanpa komisi, tanpa mark-up. Harga terbaik untuk merek ternama.</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('lending/images/home2.jpg') }}" alt="Rental Mobil Terbaik" class="slide-image" />
                    <div class="text-overlay">
                        <h1>Drive with Confidence</h1>
                        <p>Temukan mobil terbaik untuk perjalanan Anda dengan harga terbaik di pasar.</p>
                    </div>
                </div>
            </div>
            <!-- Navigasi -->
            <div class="swiper-button-next" aria-hidden="true"></div>
            <div class="swiper-button-prev" aria-hidden="true"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>




    <!-- Top Brands Section -->
    <section class="container mx-auto px-4 py-16">
      <h2 class="text-3xl font-bold text-center mb-4">Rent a Car from Top Brands</h2>
      <p class="text-center text-gray-600 mb-8">
        Dapatkan akses ke berbagai macam kendaraan dari merek ternama dan nikmati penawaran eksklusif.
      </p>
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mt-8 place-items-center">
        @foreach ([
          ['src' => 'lending/images/mercedes.png', 'name' => 'Mercedes Benz'],
          ['src' => 'lending/images/bmw.png', 'name' => 'BMW'],
          ['src' => 'lending/images/ferari.png', 'name' => 'Ferrari'],
          ['src' => 'lending/images/Lamborghini.png', 'name' => 'Lamborghini'],
          ['src' => 'lending/images/tesla.png', 'name' => 'Tesla']
        ] as $brand)
          <div class="text-center">
            <div class="overflow-hidden flex justify-center items-center h-32 w-32 rounded-full shadow-md transition-transform transform hover:scale-110">
              <img src="{{ asset($brand['src']) }}" class="h-full w-full object-contain" />
            </div>
            <p class="mt-2 font-semibold text-lg">{{ $brand['name'] }}</p>
          </div>
        @endforeach
      </div>
      <div class="text-center mt-8">
        <a href="{{route('mobil')}}" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition">
          View All Brands
        </a>
      </div>
    </section>

    <!-- Mobil Bulanan untuk Disewa Section -->
    <section class="bg-white py-16">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-4">Mobil Bulanan untuk Disewa</h2>
        <p class="text-center text-gray-600 mb-8">
          Pilih dari beragam kendaraan dengan 200+ sewa bulanan dari pemasok tepercaya.
        </p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-8">
          @foreach ([
            ['src' => 'lending/images/civic.jpg', 'name' => 'Red Car'],
            ['src' => 'lending/images/Toyota Raize.jpeg', 'name' => 'White Car'],
            ['src' => 'lending/images/mustang.jpg', 'name' => 'Grey Car'],
            ['src' => 'lending/images/musang.jpg', 'name' => 'Black Car']
          ] as $car)
            <div class="text-center">
              <div class="overflow-hidden rounded-lg shadow-lg transition-transform transform hover:scale-105">
                <img src="{{ asset($car['src']) }}" class="w-full h-40 object-cover rounded-lg" />
              </div>
              <p class="mt-2 font-semibold text-lg">{{ $car['name'] }}</p>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- Special Offers & Latest Rental Offers Section -->
    <section class="container mx-auto px-4 py-16">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
        <!-- Promo Section -->
        <div class="bg-blue-100 p-8 rounded-lg shadow-lg">
          <h3 class="text-3xl font-bold mb-4">Special offers up to 25% off</h3>
          <div class="overflow-hidden rounded-lg">
            <img src="{{ asset('lending/images/alphard.png') }}" class="w-full h-[250px] object-cover rounded-lg transition-transform transform hover:scale-105" />
          </div>
        </div>
        <!-- Latest Rental Offers -->
        <div>
          <h3 class="text-3xl font-bold mb-6">Penawaran Sewa Mobil Terbaru</h3>
          <div class="space-y-6">
            @foreach ([
              ['src' => 'lending/images/model1.png', 'name' => 'Model 1', 'price' => '$50/day'],
              ['src' => 'lending/images/model2.png', 'name' => 'Model 2', 'price' => '$50/day'],
              ['src' => 'lending/images/model3.png', 'name' => 'Model 3', 'price' => '$50/day']
            ] as $car)
              <div class="flex items-center gap-4 bg-gray-100 p-4 rounded-lg shadow-sm transition-transform transform hover:scale-105">
                <img src="{{ asset($car['src']) }}" class="w-24 h-16 object-cover rounded-lg" />
                <div>
                  <h4 class="font-bold text-lg">{{ $car['name'] }}</h4>
                  <p class="text-gray-600">{{ $car['price'] }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>

    <!-- Luxury & Sports Cars Section -->
    <section class="container mx-auto px-4 py-16">
      <h3 class="text-3xl font-bold text-center mb-8">Rent a Luxury & Sports Cars</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ([
          ['src' => 'lending/images/mewah1.jpg', 'name' => 'Mobil Mewah 1', 'price' => '$100/day'],
          ['src' => 'lending/images/mewah2.jpg', 'name' => 'Mobil Mewah 2', 'price' => '$120/day'],
          ['src' => 'lending/images/mewah3.jpg', 'name' => 'Mobil Mewah 3', 'price' => '$150/day']
        ] as $car)
          <div class="bg-white p-4 rounded-2xl shadow-lg transition-transform transform hover:scale-105">
            <div class="overflow-hidden rounded-lg">
              <img src="{{ asset($car['src']) }}" alt="{{ $car['name'] }}" class="w-full h-[200px] object-cover rounded-lg" />
            </div>
            <h4 class="font-bold mt-4 text-xl">{{ $car['name'] }}</h4>
            <p class="text-gray-600 text-lg">{{ $car['price'] }}</p>
          </div>
        @endforeach
      </div>
    </section>

    <!-- Kelompok-->
    <section class="container mx-auto px-4 py-16">
        <h3 class="text-3xl font-bold text-center mb-8">Daftar Kelompok Cuy University</h3>

        <div class="relative w-full overflow-hidden group">
            <div class="flex w-full space-x-6 transition-transform duration-500 ease-in-out" id="slider">
                <div class="w-1/3 flex-none bg-white shadow-lg rounded-lg p-6 text-center">
                    <img src="{{asset('kelompok/img/Home1.jpg')}}" alt="Kelompok 1" class="rounded-full mx-auto w-32 h-32 object-cover">
                    <h4 class="font-bold mt-4">DODI KUNAEDI</h4>
                    <p class="text-gray-600">43230224</p>
                    <p class="text-gray-600">SI-2023-KIP-P1</p>
                    <p class="text-gray-600">SISTEM INFORMASI</p>
                </div>
                <div class="w-1/3 flex-none bg-white shadow-lg rounded-lg p-6 text-center">
                    <img src="{{asset('kelompok/img/Adis.jpg')}}" alt="Kelompok 2" class="rounded-full mx-auto w-32 h-32 object-cover">
                    <h4 class="font-bold mt-4">Aulia Adisty Hervianne</h4>
                    <p class="text-gray-600">43230240</p>
                    <p class="text-gray-600">SI-2023-KIP-P1</p>
                    <p class="text-gray-600">SISTEM INFORMASI</p>
                </div>
                <div class="w-1/3 flex-none bg-white shadow-lg rounded-lg p-6 text-center">
                    <img src="{{asset('kelompok/img/Andin.jpg')}}" alt="Kelompok 3" class="rounded-full mx-auto w-32 h-32 object-cover">
                    <h4 class="font-bold mt-4">Andini Sarifatul Salsabilla</h4>
                    <p class="text-gray-600">43230233</p>
                    <p class="text-gray-600">SI-2023-KIP-P1</p>
                    <p class="text-gray-600">SISTEM INFORMASI</p>
                </div>
                <div class="w-1/3 flex-none bg-white shadow-lg rounded-lg p-6 text-center">
                    <img src="{{asset('kelompok/img/Ansur.jpg')}}" alt="Kelompok 4" class="rounded-full mx-auto w-32 h-32 object-cover">
                    <h4 class="font-bold mt-4">Andini Surya Putri</h4>
                    <p class="text-gray-600">43230230</p>
                    <p class="text-gray-600">SI-2023-KIP-P1</p>
                    <p class="text-gray-600">SISTEM INFORMASI</p>
                </div>
                <div class="w-1/3 flex-none bg-white shadow-lg rounded-lg p-6 text-center">
                    <img src="{{asset('kelompok/img/Ayes.jpg')}}" alt="Kelompok 5" class="rounded-full mx-auto w-32 h-32 object-cover">
                    <h4 class="font-bold mt-4">Ayesha Gading Cempaka</h4>
                    <p class="text-gray-600">43230241</p>
                    <p class="text-gray-600">SI-2023-KIP-P1</p>
                    <p class="text-gray-600">SISTEM INFORMASI</p>
                </div>
                <div class="w-1/3 flex-none bg-white shadow-lg rounded-lg p-6 text-center">
                    <img src="{{asset('kelompok/img/Dhea.jpg')}}" alt="Kelompok 6" class="rounded-full mx-auto w-32 h-32 object-cover">
                    <h4 class="font-bold mt-4">Dhea Indriyani</h4>
                    <p class="text-gray-600">43230245</p>
                    <p class="text-gray-600">SI-2023-KIP-P1</p>
                    <p class="text-gray-600">SISTEM INFORMASI</p>
                </div>
                <div class="w-1/3 flex-none bg-white shadow-lg rounded-lg p-6 text-center">
                    <img src="{{asset('kelompok/img/firja.jpg')}}" alt="Kelompok 7" class="rounded-full mx-auto w-32 h-32 object-cover">
                    <h4 class="font-bold mt-4">ANANDA MAALIKAL FIRJATULLAH</h4>
                    <p class="text-gray-600">43230230</p>
                    <p class="text-gray-600">SI-2023-KIP-P1</p>
                    <p class="text-gray-600">SISTEM INFORMASI</p>
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-6 space-x-4">
            <button onclick="prevSlide()" class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-600">‹</button>
            <button onclick="nextSlide()" class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-600">›</button>
        </div>
    </section>


  </main>

  <!-- Footer -->
  <footer class="bg-white py-8">
    <div class="container mx-auto px-4 text-center">
      <p class="text-gray-600">&copy; 2023 CARRENTAL. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
  crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script>
    let currentIndex = 0;
    const slider = document.getElementById('slider');
    const slides = slider.children;
    const slideWidth = slides[0].clientWidth + 24; // 24px untuk gap
    let autoSlideInterval;

    function updateSlider() {
        slider.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
    }

    function nextSlide() {
        if (currentIndex < slides.length - 3) {
            currentIndex++;
        } else {
            currentIndex = 0; // Reset ke awal jika sudah di akhir
        }
        updateSlider();
    }

    function prevSlide() {
        if (currentIndex > 0) {
            currentIndex--;
        } else {
            currentIndex = slides.length - 3; // Kembali ke akhir jika di awal
        }
        updateSlider();
    }

    function startAutoSlide() {
        autoSlideInterval = setInterval(nextSlide, 3000);
    }

    function stopAutoSlide() {
        clearInterval(autoSlideInterval);
    }

    // Mulai otomatis saat halaman dimuat
    startAutoSlide();

    // Pause saat hover
    slider.addEventListener('mouseenter', stopAutoSlide);
    slider.addEventListener('mouseleave', startAutoSlide);
    var swiper = new Swiper(".mySwiper", {
      loop: true,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
    function toggleMenu() {
        document.querySelector('.nav-links').classList.toggle('active');
    }
  </script>
</body>
</html>
