    <!-- swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- js srcipt -->
    <script href="{{asset('frontend/src.js')}}"></script>
<script>
    // Function to handle language change from dropdown
    function changeLanguage(element) {
    // Get the 'hreflang' attribute value
    const hreflangValue = element.getAttribute('hreflang');
        window.location.href = `?lang=${hreflangValue}`;
    }

</script>