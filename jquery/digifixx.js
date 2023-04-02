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

    // // Get the select element
    // const selectElement = document.getElementById('KortingSelect');
    // // Add event listener for the change event
    // selectElement.addEventListener('change', (event) => {
    // // Get the selected option
    // const selectedOption = event.target.value;

    // // Do something with the selected option
    // console.log(selectedOption);
    // });

    //let num = document.querySelector('#quantity');

    // num.addEventListener('input', function () {
    //     let valAsNumber = parseFloat(num.value);
    //     console.log(valAsNumber);
    // });

    // Initialize counters
    // var totalItems = 0;
    // var totalPrice = 0;
    
    // // Loop through the cart items and update the counters
    // for (var i = 0; i < cartItems.length; i++) {
    //     var item = cartItems[i];
    //     totalItems += parseFloat(item.quantity);
    //     totalPrice += item.quantity * item.price;
    // }

    // var elements = document.querySelectorAll('#totalPrice');
    // var total = 0;
    // for (var i = 0; i < elements.length; i++) {
    //     total += parseFloat(elements[i].textContent);
    // }

    // // Assuming you have an array of shopping cart items with a quantity and price for each item
    // var products = document.querySelectorAll('#showProducts');
    // var items = products.length;
    // for (var i = 0; i < products.length; i++) {
    //     var prijsFiets = document.querySelectorAll('#totalPrice');
    //     var naamFiets = document.querySelectorAll('#title');
    //     var quantityFiets = document.querySelectorAll('#quantity');
    // }
    // console.log(items);

    // var cartItems = [];
    // for (let i = 0; i < items; i++) {
    //     cartItems.push({name: naamFiets[i].textContent, quantity: quantityFiets[i].textContent, price: prijsFiets[i].textContent});
    // }
    // console.log(cartItems);
    
    // // Display the counters
    // console.log('Total items: ' + totalItems);
    // console.log('Total price: ' + totalPrice.toFixed(2));

    var products = document.querySelectorAll('#showProducts');
    var items = products.length;

    var cartItems = [];
    var totalPrice = 0;

    // Loop through the products and add them to the cart
    for (var i = 0; i < products.length; i++) {
    var prijsFiets = products[i].querySelectorAll('#totalPrice');
    var naamFiets = products[i].querySelectorAll('#title');
    var quantityFiets = products[i].querySelectorAll('#quantity');

    var itemPrice = parseFloat(prijsFiets[0].textContent);
    var itemQuantity = parseInt(quantityFiets[0].value);
    cartItems.push({ name: naamFiets[0].textContent, quantity: itemQuantity, price: itemPrice });

    totalPrice += itemPrice * itemQuantity;
    }

    // Update the total price display
    var updateTotalPrice = totalPrice.toFixed(2);
    var totalEl = document.getElementById('TotalAlleProducten');
    totalEl.textContent = updateTotalPrice;

    var verzendBedrag = 29.50;
    var bedragPlusVerzend = parseFloat(updateTotalPrice) + verzendBedrag;

    var winkelmandElement = document.getElementById('TotalWinkelmand');
    winkelmandElement.textContent = bedragPlusVerzend.toFixed(2);

    console.log(cartItems);

    // Define an event listener function for quantity changes
    function updateCart(event) {
    var index = parseInt(event.target.dataset.index);
    var quantity = parseInt(event.target.value);

    cartItems[index].quantity = quantity;

    // Recalculate the total price
    var newTotalPrice = 0;
    for (var i = 0; i < cartItems.length; i++) {
        newTotalPrice += cartItems[i].quantity * cartItems[i].price;
    }
    var newbedragPlusVerzend = parseFloat(newTotalPrice) + verzendBedrag;

    // Update the total price display
    totalEl.textContent = newTotalPrice.toFixed(2);
    winkelmandElement.textContent = newbedragPlusVerzend.toFixed(2);

    console.log(cartItems);
    }

    // Loop through the products again and add event listeners to their quantity input elements
    for (var i = 0; i < products.length; i++) {
    var quantityFiets = products[i].querySelectorAll('#quantity');

    quantityFiets[0].addEventListener('change', updateCart);
    quantityFiets[0].dataset.index = i;
    }

    

    var formattedTotal = totalPrice.toFixed(2);
    var totalElement = document.getElementById('TotalAlleProducten');
    totalElement.innerHTML = formattedTotal;

    var verzendBedrag = 29.50;
    var bedragPlusVerzend = parseFloat(formattedTotal) + verzendBedrag;

    var verzendElement = document.getElementById('verzendkosten');
    verzendElement.innerHTML = verzendBedrag.toFixed(2);

    var winkelmandElement = document.getElementById('TotalWinkelmand');
    winkelmandElement.innerHTML = bedragPlusVerzend.toFixed(2);
});