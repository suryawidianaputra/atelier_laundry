<style>
    .bg-image {
        background-image: linear-gradient(rgba(50, 50, 50, 0.75),
                rgba(50, 50, 50, 0.75)),
            url("/assets/images/bg-image.jpg");
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>

<x-layout>
    <x-navbar></x-navbar>

    <div class="bg-image h-screen w-full flex items-center">
        <div class="pl-[8%] pr-[5%] w-full sm:w-[60%]">
            <h1 class="text-white text-[33px] sm:text-[40px] md:text-[55px] font-bold" id="title"></h1>
            <div data-aos="fade-right" data-aos-duration="1200" data-aos-delay="400">
                <p class="text-white text-[14px] sm:text-[18px]">
                    Layanan laundry Express, Leguler, hingga EX-Tra dengan hasil bersih,
                    wangi, dan rapi. Antar-jemup gratis, harga terjangkau! Percayakan pada tangan ahli kami. Pesan
                    sekarang,
                    kami yang urus!
                </p>
                <div
                    class="flex bg-green-600 py-1 px-3 mt-4 w-max items-center 
            rounded-[10px] cursor-pointer hover:bg-green-700">
                    <img src="./assets/icons/whatsapp.svg" alt="" class="sm:w-[50px] w-[25px] h-auto">
                    <p class="text-white sm:text-[18px] text-[13px]">Hubungi Kami</p>
                </div>
            </div>
        </div>
    </div>

    {{-- about page --}}
    <div
        class="min-h-[75vh] flex justify-center items-center md:my-12 lg:my-24 bg-center bg-contain bg-no-repeat bg-[url({{ asset('./assets/images/RectangleGreen.png') }})]">
        <div class="sm:w-[86%] sm:min-h-[70vh] md:flex md:items-center justify-center">
            <div class="w-full md:w-[50%] flex justify-center md::justify-end items-center" data-aos='fade-right'
                data-aos-duration='1500' data-aos-delay="200" data-aos-one="true">
                <div>
                    <img src="./assets/images/laundry-services.png" alt="" class="h-auto p-4 rounded-[7px]">
                </div>
            </div>
            <div class="w-full flex md:w-[50%] min-h-full pl-3 justify-center " data-aos='fade-left'
                data-aos-duration='1000' data-aos-delay='500' data-aos-one="true">
                <div class="w-[90%] sm:w-[90%]">
                    <h1 class="font-bold text-[20px] sm:text-[40px] pb-2">Atelier Laundry Konoha</h1>
                    <p class="text-[15px] sm:text-[20px] py-3">Seringkah Anda terjebak situasi darurat: pakaian kotor
                        menumpuk sebelum
                        acara
                        penting, atau harus
                        menghadiri meeting bisnis tapi baju andal belum siap dicuci? Ini masalah nyata bagi keluarga
                        sibuk, pelancong dinas, atau tamu hotel yang butuh solusi cepat.</p>
                    <p class="text-[15px] sm:text-[20px]">Altelier Laundry Konoha hadir sebagai jawaban</p>
                    <p class="text-[15px] sm:text-[20px] pb-2">Kami menyediakan layanan Express 24 jam</p>
                    <ul>
                        <div class="flex space-x-4 mt-3">
                            <div class="px-4 py-2 bg-gray-200 rounded-lg text-center text-[15px] sm:text-[20px] 
                              transition duration-300 ease-in-out transform hover:shadow-lg hover:-translate-y-1 hover:cursor-pointer"
                                data-aos="zoom-in" data-aos-duration='1000' data-aos-delay="800">
                                4 Jam <br> (EX-Tra)
                            </div>
                            <div class="px-4 py-2 bg-gray-200 rounded-lg text-center text-[15px] sm:text-[20px] 
                              transition duration-300 ease-in-out transform hover:shadow-lg hover:-translate-y-1 hover:cursor-pointer"
                                data-aos="zoom-in" data-aos-duration='1000' data-aos-delay="1000">
                                12 Jam <br> (Express)
                            </div>
                            <div class="px-4 py-2 bg-gray-200 rounded-lg text-center text-[15px] sm:text-[20px] 
                               transition duration-300 ease-in-out transform hover:shadow-lg hover:-translate-y-1 hover:cursor-pointer"
                                data-aos="zoom-in" data-aos-duration='1000' data-aos-delay="1200">
                                24 Jam <br> (Leguler)
                            </div>
                        </div>
                    </ul>
                    <p class="text-[15px] sm:text-[20px] pt-4">Tak perlu khawatir jadwal padat atau waktu terbatas.
                        Antar-jemput
                        GRATIS,
                        proses profesional, dan
                        garansi kebersihan maksimal. Percayakan krisis laundry Anda pada kami—kami pastikan pakaian siap
                        dipakai tepat saat dibutuhkan!</p>
                </div>
            </div>
        </div>
    </div>

    {{-- value page --}}
    <div
        class="flex md:flex-row flex-col w-full min-h-[60vh] justify-center md:justify-end bg-center bg-contain bg-no-repeat bg-gray-50 my-10 bg-[url({{ asset('./assets/images/g.png') }})]">
        <div class="md:w-[50%] w-full h-auto grid place-items-center pl-3">
            <div class="w-[89%]">
                <h1 class="font-bold text-[18px] py-2 text-green-500" data-aos='fade-right' data-aos-duration='1000'
                    data-aos-delay='200'>Our Values</h1>
                <h1 class="text-3xl font-bold mb-7" id="value_tagline"></h1>
                <p data-aos="fade-right" data-aos-duration='1000' data-aos-delay='400'>Kami menyediakan berbagai layanan
                    yang dirancang untuk
                    membantu Anda dalam
                    memenuhi kebutuhan dengan
                    lebih mudah dan nyaman. Dengan layanan yang kami tawarkan, Anda dapat menikmati kemudahan
                    dalam berbagai aspek</p>
            </div>
        </div>
        <div class="md:w-[50%] w-full h-auto grid place-items-center my-7 md:my-0">
            <div class="grid grid-cols-3 gap-8 md:w-[80%] w-[90%] mt-10 md:mt-0">
                @foreach ($values as $i => $value)
                    <div class="flex justify-center items-center relative group container-values-card"
                        data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="{{ 300 + 300 * $i }}">

                        <div
                            class="flex flex-col items-center justify-center bg-white px-5 py-3 shadow-2xl w-[150px] aspect-square rounded-[10px] cursor-pointer relative z-10">
                            <img src="{{ asset($value['icon']) }}" alt="" class="aspect-square h-[40px] mb-2">
                            <h1 class="text-center text-[15px]">{{ $value['name'] }}</h1>
                        </div>

                        <div
                            class="absolute w-[200px] sm:w-[230px] aspect-square scale-0 bg-white shadow-2xl transition-all duration-700 ease-in-out rounded-[10px] 
                          overflow-hidden flex justify-center items-center flex-col p-2
                          cursor-pointer opacity-0 group-hover:opacity-100 z-[50] group-hover:scale-100
                          @if ($i % 3 === 0) left-0 @endif @if ($i % 3 === 2) right-0 @endif sm:left-auto sm:right-auto">
                            <img src="{{ asset($value['icon']) }}" alt="" class="aspect-square h-[40px]">
                            <h1 class="text-center text-[18px] sm:text-[18px]">{{ $value['name'] }}</h1>
                            <p class="text-center text-[12px] sm:text-[15px]">{{ $value['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- maps --}}
    <div class="w-full flex justify-center">
        <div class="w-[90%] h-[80vh]">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3872.748515094321!2d115.17399807492936!3d-8.628954991417277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd238cfa9704293%3A0xb90785bd6a37c482!2sSMK%20Wira%20Harapan!5e1!3m2!1sid!2sid!4v1740379003485!5m2!1sid!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="true" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" class="w-full h-[80vh]"></iframe>
        </div>
    </div>

    {{-- footer --}}
    <footer
        class="w-full h-auto mt-5 bg-gray-300 text-black py-10 px-5 md:px-10 flex flex-wrap gap-8 md:gap-0 justify-between">
        <div class="w-full md:w-1/4 space-y-3">
            <img src="./assets/icons/logo.svg" alt="Logo" class="w-[200px]">
            <div class="w-[50%] md:w-[70%] ">
                <p class="text-[10px] text-justify">{{ $footer['description'] }}</p>
            </div>
        </div>

        <div class="w-full md:w-1/4 space-y-3">
            <p class="font-semibold text-lg">Social</p>
            <div class="space-y-2">
                @foreach ($footer['social'] as $data)
                    <div class="flex items-center gap-3">
                        <img src="{{ $data['icon'] }}" alt="{{ $data['name'] }}" class="w-5 h-5">
                        <p class="text-black text-sm">{{ $data['name'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="w-full md:w-1/4 space-y-3">
            <p class="font-semibold text-lg">Menu</p>
            <div class="flex flex-col space-y-2 text-black text-sm">
                @foreach ($footer['menus'] as $data)
                    <div class="flex gap-2">
                        <img src="{{ $data['icon'] }}" alt="" class="w-[20px]">
                        <a href="{{ $data['url'] }}" class="hover:underline transition">{{ $data['name'] }}</a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="w-full md:w-1/4 space-y-3">
            <p class="font-semibold text-lg">Contact</p>
            <div class="text-black text-sm space-y-2">
                @foreach ($footer['contact'] as $data)
                    <p>{{ $data }}</p>
                @endforeach
            </div>
        </div>
    </footer>
</x-layout>
