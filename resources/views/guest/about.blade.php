@extends('layout.guest')

@section('title', 'About Us')
@section('content')

    <section class="w-screen relative left-1/2 right-1/2 -ml-[50vw] -mr-[50vw] mb-10">
        <div class="relative w-full h-[300px] md:h-[500px] overflow-hidden">
            <img src="{{ asset('img/about/about3.jpg') }}" alt="Crafted Goods" class="w-full h-full object-cover hero-img">

            <div class="absolute inset-0 bg-black/20"></div>

            <div class="absolute bottom-8 left-8 text-white">
                <p class="tracking-[0.35em] uppercase text-xs opacity-80">
                    Maternal Disaster
                </p>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-6">

        <section class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start pb-20">

            <div class="flex flex-col justify-start order-2 md:order-2">
                <h3 class="text-3xl font-medium leading-snug tracking-tight">
                    A Brand Born from the Music and Passion
                </h3>

                <p class="mt-6 text-gray-600 leading-relaxed text-sm text-justify">
                    Maternal Disaster is a gripping and unconventional clothing brand based in Bandung since 2003.
                    Represents not only a more refined and forward-thinking brand, we reflect our each issues like a
                    musical albums and every articles is like a song we write.
                    Driven by the dream-quest of demon force that bore black mass hysteria, a carnal beast, living in a
                    cosmos that is indifferent to our existence. Maternal Disaster is dangerous flame of brand that
                    seemed lost for many years and that now once again has been set loose upon everyday society & to
                    decipher the world objectively.
                    Four young devils were brought together by our passion for music. Our first love has always been and
                    will always be music, we try to give back to our roots through the products and opportunities we
                    provide through the company. We remains extremely involved in the production and direction of
                    Maternal Disaster, maintaining the respect over communities we continue to support our friends,
                    which helps us fuel and inspire our original vision. Our goal for Maternal Disaster is to evoke
                    emotions then create topics of discussion through our designs and boldly stated our idea at the hand
                    of youth culture.
                </p>
            </div>

            <div class="space-y-12 order-1 md:order-1">
                <div class="w-full h-105 overflow-hidden bg-gray-100 rounded-2xl shadow-sm group">
                    <img src="{{ asset('img/about/about1.jpg') }}" alt="Bag Flatlay"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                </div>
            </div>

        </section>

    </div>

    <style>
        @keyframes heroZoom {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.12);
            }
        }

        .animate-heroZoom {
            animation: heroZoom 15s ease-in-out forwards;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const heroImg = document.querySelector('.hero-img');

            const observer = new IntersectionObserver(
                ([entry]) => {
                    if (entry.isIntersecting) {
                        heroImg.classList.remove('animate-heroZoom');
                        void heroImg.offsetWidth;
                        heroImg.classList.add('animate-heroZoom');
                    }
                }, {
                    threshold: 0.4
                }
            );

            observer.observe(heroImg);
        });
    </script>

@endsection
