$(document).ready(function() {
    $('#slick').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    const swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        autoplay: {
            delay: 3000,
        },
        
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      
        // Navigation arrows
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
      
      });
    
    const swiperReviews = new Swiper('#reviews', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,
        slidesPerView: 3,
        spaceBetween: 10,
        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 500px
            500: {
            slidesPerView: 1,
            spaceBetween: 30
            },
            // when window width is >= 976px
            976: {
            slidesPerView: 2,
            spaceBetween: 10
            }
        },
        
        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true,
        },
        
        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    // Get the select element
    const selectElement = document.getElementById('KortingSelect');
    // Add event listener for the change event
    selectElement.addEventListener('change', (event) => {
    // Get the selected option
    const selectedOption = event.target.value;

    // Do something with the selected option
    console.log(selectedOption);
    });
});