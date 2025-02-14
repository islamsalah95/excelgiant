{{-- <div id="about" class="about py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 d-lg-block d-none center">
                <img src="{{asset('frontend/images/about-img.svg')}}" width="75%" height="100%" alt="img">
            </div>
            <div class="col-12 col-lg-6 text-center text-lg-end d-flex justify-content-center flex-column">
                <h2 class="fw-bold pb-3 translatable" data-ar="نعرفك علينا" data-en="Get to Know Us">نعرفك علينا
                </h2>

                <p class="fw translatable"
                    data-ar="تأسس مصنع مسير الصناعي عام 1990 في مجال الصناعات المعدنية ومنتجات التبريد المنزلية. من خلال سنوات من البحث والتطوير والتوسع، أدخلنا خطوطًا متنوعة تشمل المزيد من الصناعات المعدنية بالإضافة إلى حلول التبريد التجاري الثابت والنقل. توسعت خدمات مسير لتخدم قطاعات أكبر من العملاء لتشمل خدمات ما بعد البيع في مبيعات قطع الغيار وصيانة أنظمة التبريد التجارية ومراكز تقديم الطعام والقهوة. يقع مصنع مسير الصناعي في المدينة الصناعية الأولى بمحافظة القصيم، سلة غذاء المملكة من الخضار والتمور. نفخر بكوننا المصنع الوحيد من نوعه في المنطقة وجميع مناطق شمال المملكة، مما يجعلنا مسؤولين عن تقديم الخدمة وتلبية احتياجات ومتطلبات عملائنا لتحقيق رؤية المملكة في تأمين الغذاء وسلاسل التوريد لجميع أنحاء المملكة. يقدم مصنع مسير الصناعي مجموعة متنوعة من المنتجات والخدمات والحلول المتكاملة التي تخدم مجموعة واسعة من العملاء في العديد من القطاعات المختلفة."
                    data-en="Masir Industrial Factory was established in 1990 in the field of metal industries and household refrigeration products. Over the years of research, development, and expansion, we have introduced various production lines covering more metal industries in addition to fixed and transport commercial refrigeration solutions. Masir's services have expanded to serve a larger customer base, including after-sales services for spare parts sales, maintenance of commercial refrigeration systems, and catering and coffee service centers. Masir Industrial Factory is located in the First Industrial City of Qassim Province, the Kingdom’s food basket for vegetables and dates. We take pride in being the only factory of its kind in the region and all northern parts of the Kingdom, making us responsible for providing services and meeting our customers' needs to achieve the Kingdom’s vision in securing food and supply chains across the nation. Masir Industrial Factory offers a diverse range of products, services, and integrated solutions that serve a wide range of customers across various sectors.">
                    في شمال المملكة، وتحديداً في محافظة القصيم (سلة غذاء المملكة من الخضار والتمور) في المدينة
                    الصناعية الأولى، تأسس مصنع مسير الصناعي للصناعات المعدنية ومنتجات التبريد المنزلية عام 1990،
                    لنكون بذلك -وبكل فخر- المصنع الوحيد من نوعه في المنطقة
                    هذا الأمر جعلنا مسؤولين عن تقديم الخدمة وتلبية احتياجات العملاء، لنساهم في تحقيق رؤية المملكة في
                    تأمين الغذاء وسلاسل التوريد لجميع أنحاء المملكة
                    وبفضل الله وبعد سنوات طِوال قضيناها في البحث والتطوير والتوسع لخدمة قطاعات أكبر، أصبحنا نقدم في
                    مصنع مسير الصناعي مجموعة متنوعة من المنتجات والخدمات والحلول المتكاملة التي تخدم مجموعة واسعة من
                    العملاء في العديد من القطاعات المختلفة
                </p>
            </div>
        </div>
    </div>
</div> --}}



<div id="about" class="about py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 d-lg-block d-none center">
                {{-- <img src="{{asset('frontend/images/about-img.svg')}}" width="75%" height="100%" alt="img"> --}}
                <img src="{{ asset('frontend/images') . '/' . __('frontend/footer.content.img') }}" width="75%"
                    height="100%" alt="img">

            </div>
            <div class="col-12 col-lg-6 text-center text-lg-end d-flex justify-content-center flex-column">
                <h2 class="fw-bold pb-3 translatable">{{ __('frontend/footer.content.title') }}
                </h2>

                <p class="fw translatable">
                    {{ __('frontend/footer.content.desc') }}
                </p>
            </div>
        </div>
    </div>
</div>
