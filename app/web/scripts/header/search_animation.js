
window.onload = function() {
    var element = document.querySelector('li.header_search'); 
    var search_text_element = element.querySelector('.header_icon_and_button');
    var search_form_element = element.querySelector('form.header_search_form'); 
    var search_input = search_form_element.querySelector('input')

    search_text_element.addEventListener('click', function() {      
        // Этот код будет выполнен при наведении на элемент.
        var start = null;
        var end = 350; // Конечная ширина в пикселях
        var duration = 1000; // Длительность анимации в миллисекундах

        // timestamp - это параметр, который передается в функцию requestAnimationFrame браузером. Это метка времени, которая указывает, когда произошел текущий кадр анимации. Метка времени измеряется в миллисекундах с момента загрузки страницы.
        function animate_more_wight(timestamp) {
            if (!start) start = timestamp;
            var progress = timestamp - start;
            var currentWidth = Math.min(end * progress / duration, end);
            search_input.style.width = currentWidth + 'px';
            if (progress < duration) {
                window.requestAnimationFrame(animate_more_wight);
            }
        }

        search_text_element.style.display = 'none';
        search_form_element.style.display = 'flex';

        // search_input.style.pointerEvents = 'none'; // Отключить взаимодействия во время перехода
        search_input.focus();

        window.requestAnimationFrame(animate_more_wight);

        // search_input.style.pointerEvents = 'auto'; // Включить взаимодействия после окончания перехода
    });


    // // тут что то не так и анимция не идет
    // search_input.addEventListener('blur', function() {
    //     // Этот код будет выполнен при убирании курсора с элемента.
    //     var start = null;
    //     var end = search_input.offsetWidth; // Начальноая длина
    //     var duration = 2000; // Длительность анимации в миллисекундах

    //     function animate_less_wight(timestamp) {
    //         if (!start) start = timestamp;
    //         var progress = timestamp - start;
    //         var currentWidth = Math.max(end - (end * progress / duration), 0);
    //         search_input.style.width = currentWidth + 'px';
    //         if (progress < duration) {
    //             window.requestAnimationFrame(animate_less_wight);
    //         } 
    //     }

    //     window.requestAnimationFrame(animate_less_wight);

    //     // Возвращаем элементы в исходное состояние
    //     search_text_element.style.display = 'flex';
    //     search_form_element.style.display = 'none';
        
    // });
    
};
