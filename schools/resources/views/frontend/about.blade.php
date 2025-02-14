@extends('layouts.frontend')

@section('content')
    <!-- Content -->

    <!-- ====== Page Banner start ====== -->
    <x-frontend.banner :title="__('frontend/about.about.main_title_2')" :subTitle="__('frontend/about.about.main_title_1')" />

    <!-- ====== Page Banner end ====== -->

    <!-- ====== About Section Start -->
    <section class="overflow-hidden ud-about bg-white">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 mb-4 mb-lg-0 d-flex align-items-center d-flex align-items-center  ">
                    <div class="image-wrapper wow fadeInLeft" data-wow-delay=".5s" data-wow-duration="1.3s">
                        <img alt="Service 1" src="{{ asset_front_url('images/services/call-center-5.jpg') }}">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 ud-about-content">
                    <!--<span class="d-block mb-4 h5 text-primary wow fadeInUp text-secondary" data-wow-delay=".1s">Techsup Business</span>-->
                    <h2 class="display-4 font-weight-bold text-dark">
                        {{-- Your partner in outsourcing solutions. --}}
                        {{ __('frontend/about.about.about_text') }}

                    </h2>
                    <div class="text-section wow fadeInUp" data-wow-delay=".2s">
                        <span class="sub-title">
                            <svg height="32" viewBox="0 0 24 24" width="32" xmlns="http://www.w3.org/2000/svg">
                                <g fill="currentColor">
                                    <path d="M17 15h2v2h-2zm2-4h-2v2h2z" />
                                    <path clip-rule="evenodd"
                                        d="M13 7h10v14H1V3h12zM8 5h3v2H8zm3 14v-2H8v2zm0-4v-2H8v2zm0-4V9H8v2zm10 8V9h-8v2h2v2h-2v2h2v2h-2v2zM3 19v-2h3v2zm0-4h3v-2H3zm3-4V9H3v2zM3 7h3V5H3z"
                                        fill-rule="evenodd" />
                                </g>
                            </svg>
                            {{-- Who we are --}}
                            {{ __('frontend/about.about.title') }}

                        </span>
                        {{-- <p class="mb-3 text-body">
              Techsup Business aims to empower small and medium enterprises by providing high quality outsourcing services solutions. As part of Techsup Holding Group and a sister company Techsup Support, we specialize in providing outsourcing services that allow small and medium enterprises to focus on their core operations while we take care of the stability of your business cycle.
            </p> --}}
                        <p class="mb-3 text-body">{{ __('frontend/about.about.subtitle') }}</p>

                    </div>
                    <div class="text-section wow fadeInUp" data-wow-delay=".25s">
                        <span class="sub-title">
                            <svg height="32" viewBox="0 0 24 24" width="32" xmlns="http://www.w3.org/2000/svg">
                                <g color="currentColor" fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1.5">
                                    <path
                                        d="M2.5 8.187c.104-2.1.415-3.41 1.347-4.34c.93-.932 2.24-1.243 4.34-1.347M21.5 8.187c-.104-2.1-.415-3.41-1.347-4.34c-.93-.932-2.24-1.243-4.34-1.347m0 19c2.1-.104 3.41-.415 4.34-1.347c.932-.93 1.243-2.24 1.347-4.34M8.187 21.5c-2.1-.104-3.41-.415-4.34-1.347c-.932-.93-1.243-2.24-1.347-4.34m17.135-4.495c.243.304.365.457.365.682s-.122.378-.365.682C18.542 14.05 15.751 17 12 17s-6.542-2.95-7.635-4.318C4.122 12.378 4 12.225 4 12s.122-.378.365-.682C5.458 9.95 8.249 7 12 7s6.542 2.95 7.635 4.318" />
                                    <path d="M14 12a2 2 0 1 0-4 0a2 2 0 0 0 4 0" />
                                </g>
                            </svg>
                            {{-- Our Vision --}}
                            {{ __('frontend/about.about.vision_title') }}

                        </span>
                        <p class="mb-3 text-body">
                            {{-- At Techsup Business, our vision is to be the leading provider of outsourcing solutions for SMEs in the region. We are committed to building long-term partnerships with our clients by delivering sustainable value through our expertise. --}}
                        <p class="mb-3 text-body">{{ __('frontend/about.about.vision_text') }}</p>

                        </p>
                    </div>

                    <div class="text-section wow fadeInUp" data-wow-delay=".3s">
                        <span class="sub-title">
                            <svg height="32" viewBox="0 0 24 24" width="32" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.107 18.251a2.063 2.063 0 1 0 0-4.126a2.063 2.063 0 0 0 0 4.126m3.656 4.874a3.656 3.656 0 0 0-7.312 0m10.902-7.481a2.017 2.017 0 1 0 0-4.034a2.017 2.017 0 0 0 0 4.034m3.576 4.767A3.575 3.575 0 0 0 17 17.719M4.647 15.644a2.017 2.017 0 1 0 0-4.034a2.017 2.017 0 0 0 0 4.034m-3.576 4.767A3.575 3.575 0 0 1 7 17.719m5-8.594a3 3 0 1 0 0-6a3 3 0 0 0 0 6m-.5-8.25h1m-.5 0v2.25m3.359-1.066l.707.707m-.354-.353l-1.591 1.591m3.129 1.621v1m0-.5H15m1.066 3.359l-.707.707m.353-.354l-1.591-1.591M12.5 11.375h-1m.5 0v-2.25m-3.359 1.066l-.707-.707m.354.353l1.591-1.591M6.75 6.625v-1m0 .5H9M7.934 2.766l.707-.707m-.353.354l1.591 1.591"
                                    fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5" />
                            </svg>
                            {{-- Our Mission --}}
                            {{ __('frontend/about.about.mission_title') }}

                        </span>
                        <p class="mb-3 text-body">
                            {{ __('frontend/about.about.mission_text') }}
                            {{-- Providing systems support services (financial, human resources, technical) for small and medium-sized companies, enabling you to focus on your core business and growth, increase efficiency and reduce operational burdens. --}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== About Section End -->
    {{-- <x-frontend.services-component/> --}}


    <x-frontend.service />


    <!-- Content -->
@endsection
