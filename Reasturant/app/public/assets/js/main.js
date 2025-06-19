$(document).ready(function() {
    // Фиксация меню при скролле
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.navbar').addClass('navbar-scrolled');
            $('#logo').addClass('logo-small');
        } else {
            $('.navbar').removeClass('navbar-scrolled');
            $('#logo').removeClass('logo-small');
        }
    });

    // Плавный скролл для якорных ссылок
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top - 70
        }, 800);
    });

    // Инициализация слайдера специальных блюд
    $('.specialities-slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 3000
    });

    // Фильтрация меню
    $('.menu-filter button').on('click', function() {
        $('.menu-filter button').removeClass('active');
        $(this).addClass('active');
        
        const category = $(this).data('category');
        $('.menu-item').hide();
        
        if (category === 'all') {
            $('.menu-item').show();
        } else {
            $(`.menu-item[data-category="${category}"]`).show();
        }
    });

    // Загрузка элементов меню (имитация AJAX запроса)
    const menuItems = [
        { title: 'Margherita Pizza', category: 'pizza', price: 12.99, image: 'pizza1.jpg' },
        { title: 'Chicken Soup', category: 'soupe', price: 8.99, image: 'soup1.jpg' },
        // Добавьте другие элементы меню
    ];

    const menuContainer = $('.menu-items');
    menuItems.forEach(item => {
        menuContainer.append(`
            <div class="col-md-4 menu-item" data-category="${item.category}">
                <div class="card">
                    <img src="assets/images/${item.image}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">${item.title}</h5>
                        <p class="price">$${item.price.toFixed(2)}</p>
                    </div>
                </div>
            </div>
        `);
    });

    // Показать все элементы меню при первой загрузке
    $('.menu-item').show();

    // Обработка формы бронирования
    $('#bookingForm').on('submit', function(e) {
        e.preventDefault();
        alert('Booking form submitted!');
        // Здесь будет AJAX запрос
    });

    // Обработка формы контактов
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        alert('Contact form submitted!');
        // Здесь будет AJAX запрос
    });

    // Обработка формы авторизации
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        alert('Login form submitted!');
        // Здесь будет AJAX запрос
    });

    // Обработка формы регистрации
    $('#registerForm').on('submit', function(e) {
        e.preventDefault();
        alert('Register form submitted!');
        // Здесь будет AJAX запрос
    });

    // Инициализация Яндекс карты
    if (typeof ymaps !== 'undefined') {
        ymaps.ready(initMap);
    }

    function initMap() {
        const map = new ymaps.Map('map', {
            center: [55.76, 37.64], // Координаты ресторана
            zoom: 15
        });

        // Добавление метки
        const placemark = new ymaps.Placemark([55.76, 37.64], {
            hintContent: 'Наш ресторан',
            balloonContent: 'Приходите к нам!'
        });

        map.geoObjects.add(placemark);
    }
});