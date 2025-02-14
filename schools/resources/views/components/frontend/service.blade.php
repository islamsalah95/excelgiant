<section class="ud-services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ud-section-title mx-auto text-center">
                    <span class="text-secondary">{{ __('frontend/home.services_section.subtitle') }}</span>
                    <h2>{{ __('frontend/home.services_section.title') }}</h2>
                    <p>{{ __('frontend/home.services_section.description') }}</p>
                </div>
            </div>
        </div>
        @foreach ($services as $index => $service)
            <div class="row service">
                @if ($index % 2 == 0)
                    <div class="col-xl-6 col-lg-6 mb-4 mb-lg-0 d-flex align-items-center">
                        <div class="image-wrapper wow fadeInLeft" data-wow-delay=".5s" data-wow-duration="1.3s">
                            <img alt="Service 1" src="{{ $service->getFirstMediaUrl('services') ?? '' }}">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 ud-about-content">
                        <span class="d-block mb-4 h5 text-primary wow fadeInUp text-secondary" data-wow-delay=".1s">
                            {{ json_decode($service->name, true)[getCurrentLocale()] }}
                        </span>
                        {!! json_decode($service->blog['desc'], true)[getCurrentLocale()] !!}

                        <a class="btn btn-primary wow fadeInUp" data-wow-delay=".5s"
                            href="{{ router('service.index', ['service' => $service->id]) }}">{{ __('frontend/home.services_section.learn_more') }}</a>


                        @php
                            $countPricingPlans = [];
                            foreach ($service->pricingPlans as $pricingPlan) {
                                if ($pricingPlan->pricingPlan->status == 'active') {
                                    $countPricingPlans[] = $pricingPlan->pricingPlan;
                                }
                            }
                        @endphp
                        @if (count($countPricingPlans) > 0)
                            <a class="btn buy-btn wow fadeInUp flex-grow-1 d-inline-flex gap-3 align-items-center
                            justify-content-center"
                                data-wow-delay=".5s"
                                href="{{ route('pricing.index', [
                                    'id' => $service->id,
                                    'model' => 'Services',
                                ]) }}">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="text">
                                    {{ __('frontend/service.service.pricingPage') }}
                                </span>

                            </a>
                        @endif

                    </div>
                @else
                    <div class="col-xl-6 col-lg-6 col-md-12 ud-about-content order-2 order-lg-1">
                        <span class="d-block mb-4 h5 text-primary wow fadeInUp text-secondary" data-wow-delay=".1s">
                            {{ json_decode($service->name, true)[getCurrentLocale()] }}
                        </span>
                        {!! json_decode($service->blog['desc'], true)[getCurrentLocale()] !!}
                        <a class="btn btn-primary wow fadeInUp" data-wow-delay=".5s"
                            href="{{ router('service.index', ['service' => $service->id]) }}">{{ __('frontend/home.services_section.learn_more') }}</a>
                            @php
                            $countPricingPlans = [];
                            foreach ($service->pricingPlans as $pricingPlan) {
                                if ($pricingPlan->pricingPlan->status == 'active') {
                                    $countPricingPlans[] = $pricingPlan->pricingPlan;
                                }
                            }
                           @endphp
                            @if (count($countPricingPlans) > 0)
                            <a class="btn buy-btn wow fadeInUp flex-grow-1 d-inline-flex gap-3 align-items-center
                            justify-content-center"
                                data-wow-delay=".5s"
                                href="{{ route('pricing.index', [
                                    'id' => $service->id,
                                    'model' => 'Services',
                                ]) }}">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="text">
                                    {{ __('frontend/service.service.pricingPage') }}
                                </span>

                            </a>
                        @endif

                    </div>
                    <div class="col-xl-6 col-lg-6 mb-4 mb-lg-0 d-flex align-items-center order-1 order-lg-2 justify-content-end">
                        <div class="image-wrapper right wow fadeInLeft text-end" data-wow-delay=".5s"
                            data-wow-duration="1.3s">
                            <img alt="Service 1" src="{{ $service->getFirstMediaUrl('services') ?? '' }}">
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</section>
