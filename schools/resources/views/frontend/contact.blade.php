@extends('layouts.frontend')

@section('content')
    <!-- Content -->

    <!-- ====== Page Banner start ====== -->
    <x-frontend.banner :title="__('frontend/contact.contact.love_to_hear_from_you')" :subTitle="__('frontend/contact.contact.contact_us')" />
    <!-- ====== Page Banner end ====== -->

    <div>
        @if (session()->has('message'))
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    Swal.fire({
                        icon: 'success',
                        title: '{{ session('message') }}',
                        showConfirmButton: false,
                        timer: 2000
                    });
                });
            </script>
        @endif
    </div>

    <!-- ====== Contact Start ====== -->
    <section id="contact" class="ud-contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-8 col-lg-7">
                    <div class="ud-contact-content-wrapper">
                        <div class="ud-contact-info-wrapper">
                            <div class="ud-single-info">
                                <div class="ud-info-icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div class="ud-info-meta">
                                    <h5>{{ __('frontend/contact.contact.our_location') }}</h5>
                                    <p>{{ $settings['contact']['address'] }}</p>
                                </div>
                            </div>
                            <div class="ud-single-info">
                                <div class="ud-info-icon">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="ud-info-meta">
                                    <h5>{{ __('frontend/contact.contact.how_can_we_help') }}</h5>
                                    <p>{{ $settings['contact']['email'] }}</p>
                                </div>
                            </div>
                        </div>
                        <iframe allowfullscreen height="415"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d906.1667465895434!2d46.682373!3d24.7039719!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f0325d1470833%3A0x280a33e18155fa75!2z2LTYsdmD2Kkg2KrZg9iz2Kgg2KfZhNmF2LPYp9mG2K_YqSDZhNmE2KrYs9mI2YrZgg!5e0!3m2!1sar!2seg!4v1552827487577https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d906.1667465895434!2d46.682373!3d24.7039719!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f0325d1470833%3A0x280a33e18155fa75!2z2LTYsdmD2Kkg2KrZg9iz2Kgg2KfZhNmF2LPYp9mG2K_YqSDZhNmE2KrYs9mI2YrZgg!5e0!3m2!1sar!2seg!4v1552827487577"
                            style="border: 0;" width="100%"></iframe>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="ud-contact-form-wrapper wow fadeInUp" data-wow-delay=".2s">
                        <h3 class="ud-contact-form-title">{{ __('frontend/contact.contact.send_us_message') }}</h3>

                        @livewire('front-end.contact')



                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Contact End ====== -->

    <!-- Content -->
@endsection

@push('css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
