<div id="form" class="form py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 d-lg-block d-none">
                <div class="container">
                    <img class="w-100" src="{{ asset('frontend/images/pic.svg') }}" alt="img" style="height: 80%;">
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="container">
                    <div class="py-2 text-center translatable reverse-text fw-bold text-white"
                        data-ar="تواصل معنا عبر واتساب" data-en="Contact us on WhatsApp">
                        <h2 class="fw-bold text-white" id="langText">تواصل معنا عبر واتساب</h2>
                    </div>
                    
                    
                   @livewire('front-end.contact')
               
               
                </div>
            </div>
        </div>
    </div>
</div>
