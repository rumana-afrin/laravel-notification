<script src="{{ asset('assets/js/jquery.3.7.1.min.js') }}"></script>

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>


<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            center: true,
            loop: true,
            margin: 10,
            dots: false,
            autoplay: true,
            autoplayTimeout:3000,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 4,
                    nav: false
                },
                
            }
        });


    });
</script>
