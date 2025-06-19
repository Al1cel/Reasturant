$(document).ready(function() {

    const header = $('.navbar');
    const logo = $('#logo');
    const scrollOffset = 100;
    
    $(window).on('scroll', function() {
        if($(window).scrollTop() > scrollOffset) {
            header.addClass('scrolled');
            logo.css('height', '60px');
        } else {
            header.removeClass('scrolled');
            logo.css('height', '80px');
        }
    });
    
 
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        
        const target = $(this).attr('href');
        if(target === '#') return;
        
        if($(target).length) {
            $('html, body').animate({
                scrollTop: $(target).offset().top - 70
            }, 800);
        }
    });
    
   
    $('.specialties__slider').slick({
        dots: true,
        arrows: false,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 3000
    });
    

    $('#bookingForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = {
            name: $('#bookingName').val(),
            email: $('#bookingEmail').val(),
            phone: $('#bookingPhone').val(),
            people: $('#bookingPeople').val(),
            date: $('#bookingDate').val(),
            time: $('#bookingTime').val()
        };
        
      
        console.log('Booking form submitted:', formData);
        alert('Table booking request received! We will contact you shortly.');
        $('#bookingForm')[0].reset();
    });
    
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = {
            name: $('#contactName').val(),
            email: $('#contactEmail').val(),
            phone: $('#contactPhone').val(),
            message: $('#contactMessage').val()
        };
        
      
        console.log('Contact form submitted:', formData);
        alert('Thank you for your message! We will contact you soon.');
        $('#contactForm')[0].reset();
    });
    

    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = {
            email: $('#loginEmail').val(),
            password: $('#loginPassword').val()
        };
        
       
        console.log('Login attempt:', formData);
        alert('Login functionality will be implemented soon!');
        $('#authModal').modal('hide');
    });
    

    $('#registerForm').on('submit', function(e) {
        e.preventDefault();
        
        const password = $('#registerPassword').val();
        const confirmPassword = $('#confirmPassword').val();
        
        if(password !== confirmPassword) {
            alert('Passwords do not match');
            return;
        }
        
        const formData = {
            email: $('#registerEmail').val(),
            password: password
        };
        

        console.log('Registration attempt:', formData);
        alert('Registration successful! You can now login.');
        $('#authTabs .nav-link').removeClass('active');
        $('#login-tab').addClass('active');
        $('#authTabsContent .tab-pane').removeClass('show active');
        $('#login').addClass('show active');
        $('#registerForm')[0].reset();
    });
    
  
    $('#menuTabs button').on('click', function(e) {
        e.preventDefault();
        const category = $(this).attr('id').replace('-tab', '');
        
       
        const menuData = {
            pizza: [
                {title: "PIZZA MARGHERITA", price: "12.99", description: "Classic tomato and mozzarella"},
                {title: "PIZZA PEPPERONI", price: "14.99", description: "Tomato sauce, mozzarella and pepperoni"},
                {title: "PIZZA QUATRO STAGIONI", price: "16.99", description: "Four seasons pizza"},
                {title: "PIZZA VEGETARIAN", price: "13.99", description: "Fresh vegetables and mozzarella"},
                {title: "PIZZA HAWAIIAN", price: "15.99", description: "Ham, pineapple and mozzarella"}
            ],
            soupe: [
                {title: "TOMATO SOUP", price: "5.99", description: "Fresh tomato soup with basil"},
                {title: "MUSHROOM SOUP", price: "6.99", description: "Creamy mushroom soup"},
                {title: "CHICKEN NOODLE", price: "7.99", description: "Classic chicken noodle soup"}
            ],
            pasta: [
                {title: "SPAGHETTI CARBONARA", price: "11.99", description: "Classic Italian pasta"},
                {title: "PENNE ARRABBIATA", price: "10.99", description: "Spicy tomato sauce"},
                {title: "FETTUCCINE ALFREDO", price: "12.99", description: "Creamy Alfredo sauce"}
            ],
            desert: [
                {title: "TIRAMISU", price: "6.99", description: "Classic Italian dessert"},
                {title: "CHOCOLATE CAKE", price: "5.99", description: "Rich chocolate cake"},
                {title: "CHEESECAKE", price: "6.99", description: "Creamy New York style"}
            ],
            wine: [
                {title: "HOUSE RED WINE", price: "8.99", description: "Glass of our finest red"},
                {title: "HOUSE WHITE WINE", price: "7.99", description: "Glass of our finest white"},
                {title: "CHAMPAGNE", price: "12.99", description: "French champagne"}
            ],
            beer: [
                {title: "LOCAL DRAFT", price: "4.99", description: "500ml of local craft beer"},
                {title: "IMPORTED BEER", price: "5.99", description: "330ml bottle"},
                {title: "WHEAT BEER", price: "5.49", description: "German style wheat beer"}
            ],
            drinks: [
                {title: "COLA", price: "2.99", description: "330ml can"},
                {title: "LEMONADE", price: "3.49", description: "Homemade lemonade"},
                {title: "ICED TEA", price: "3.29", description: "Fresh brewed iced tea"}
            ]
        };
        
        renderMenuItems(menuData[category] || [], category);
    });
    
  
    function renderMenuItems(items, category) {
        const $menuItems = $('.menu__items');
        $menuItems.empty();
        
        if (items.length === 0) {
            $menuItems.html('<div class="col-12 text-center"><p>No items available in this category</p></div>');
            return;
        }
        
        items.forEach(item => {
            $menuItems.append(`
                <div class="col-md-4 menu__item">
                    <div class="menu__item-content">
                        <h4 class="menu__item-title">${item.title} <span class="menu__item-dots"></span> <span class="menu__item-price">${item.price} USD</span></h4>
                        <p class="menu__item-subtitle">${item.description}</p>
                    </div>
                </div>
            `);
        });
    }
    

    function initYandexMap() {
      
        if (typeof ymaps !== 'undefined') {
            ymaps.ready(function() {
               
                const restaurantLocation = [51.507351, -0.127758];
                
           
                const map = new ymaps.Map('yandexMap', {
                    center: restaurantLocation,
                    zoom: 15
                });
                
              
                const placemark = new ymaps.Placemark(restaurantLocation, {
                    hintContent: 'Hunger Restaurant',
                    balloonContent: 'Hunger Restaurant<br>5th London Boulevard, U.K.'
                });
                
                map.geoObjects.add(placemark);
            });
        } else {
            console.error('Yandex Maps API failed to load');
        }
    }
    
  
    function loadYandexMaps() {
        if ($('#yandexMap').length) {
            const script = document.createElement('script');
            script.src = 'https://api-maps.yandex.ru/2.1/?lang=en_US&onload=initYandexMap';
            script.async = true;
            document.head.appendChild(script);
        }
    }
    

    function loadDefaultMenuItems() {
        const defaultMenu = [
            {title: "PIZZA MARGHERITA", price: "12.99", description: "Classic tomato and mozzarella"},
            {title: "PIZZA PEPPERONI", price: "14.99", description: "Tomato sauce, mozzarella and pepperoni"},
            {title: "PIZZA QUATRO STAGIONI", price: "16.99", description: "Four seasons pizza"},
            {title: "PIZZA VEGETARIAN", price: "13.99", description: "Fresh vegetables and mozzarella"},
            {title: "PIZZA HAWAIIAN", price: "15.99", description: "Ham, pineapple and mozzarella"},
            {title: "PIZZA BBQ CHICKEN", price: "15.99", description: "BBQ sauce, chicken and onions"},
            {title: "PIZZA MEXICANA", price: "15.99", description: "Spicy beef, jalapeños and peppers"},
            {title: "PIZZA SEAFOOD", price: "17.99", description: "Mixed seafood delight"},
            {title: "PIZZA FUNGHI", price: "14.99", description: "Mushrooms and truffle oil"},
            {title: "PIZZA CAPRICCIOSA", price: "16.99", description: "Ham, mushrooms and artichokes"},
            {title: "PIZZA DIABLO", price: "15.99", description: "Spicy salami and chili"},
            {title: "PIZZA PROSCIUTTO", price: "16.99", description: "Italian ham and arugula"},
            {title: "PIZZA QUATTRO FORMAGGI", price: "16.99", description: "Four cheese blend"},
            {title: "PIZZA RUSTICA", price: "15.99", description: "Farmhouse style pizza"},
            {title: "PIZZA CALZONE", price: "14.99", description: "Folded pizza with ricotta"}
        ];
        
        renderMenuItems(defaultMenu, 'pizza');
    }
    
 
    loadYandexMaps();
    loadDefaultMenuItems();
    
  
    $('#pizza-tab').tab('show');
});