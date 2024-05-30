window.onload = function() {
    
    // function first_to_end(objParent){
    //     var lastChild = objParent.lastElementChild;
    //     objParent.insertBefore(lastChild, objParent.firstElementChild);
    // }
    // function last_to_start(objParent){
    //     var firstChild = objParent.firstElementChild;
    //     objParent.appendChild(firstChild);
    // }

    // function goToSlide(index) {
    //     var dvizhemaia_chast = document.querySelector('.carusel_with_item');
    //     var parent = document.querySelector('.carusel_with_item');
    //     if (index == -1) {
    //         dvizhemaia_chast.style.transition = 'transform 0.5s';
    //         dvizhemaia_chast.style.transform = `translate(-255px,0px)`;
    //         dvizhemaia_chast.addEventListener('transitionend', function() {
    //             last_to_start(parent);
    //             dvizhemaia_chast.style.transition = 'none';
    //             dvizhemaia_chast.style.transform = `translate(0px,0px)`;
    //         }, { once: true });
    //     } else if (index == 1) {
    //         right_butt.style.pointerEvents = 'none';
    //         dvizhemaia_chast.style.transition = 'none';
    //         dvizhemaia_chast.style.transform = `translate(-255px,0px)`;
    //         // var parent = document.querySelector('.carusel_with_item');
    //         first_to_end(parent);
    //         setTimeout(function() {
    //             // dvizhemaia_chast = document.querySelector('.carusel_with_item');
    //             dvizhemaia_chast.style.transition = 'transform 0.5s';
    //             dvizhemaia_chast.style.transform = `translate(0px,0px)`;
    //         }, 0);  
    //         dvizhemaia_chast.addEventListener('transitionend', function() {
    //             right_butt.style.pointerEvents = 'auto';
    //         }, { once: true });
    //     }
    // }

    
    // var left_butt = document.querySelector('.slider_button_left');
    // var right_butt = document.querySelector('.slider_button_right');

    // left_butt.addEventListener('click', function() { 
    //     goToSlide(-1);
    // });
    // right_butt.addEventListener('click', function() { 
    //     goToSlide(1);
    // });

    // setInterval(goToNextSlide, 3000);

    function first_to_end(objParent){
        var lastChild = objParent.lastElementChild;
        objParent.insertBefore(lastChild, objParent.firstElementChild);
    }
    function last_to_start(objParent){
        var firstChild = objParent.firstElementChild;
        objParent.appendChild(firstChild);
    }

    function goToSlide(index, num) {
        var dvizhemaia_chast = (document.querySelectorAll('.carusel_with_item'))[num];
        var parent = (document.querySelectorAll('.carusel_with_item'))[num];
        if (index == -1) {
            left_butts[num].style.pointerEvents = 'none';
            dvizhemaia_chast.style.transition = 'transform 0.5s';
            dvizhemaia_chast.style.transform = `translate(-255px,0px)`;
            
            freez_site();
            
            dvizhemaia_chast.addEventListener('transitionend', function() {
                last_to_start(parent);
                dvizhemaia_chast.style.transition = 'none';
                dvizhemaia_chast.style.transform = `translate(0px,0px)`;
                left_butts[num].style.pointerEvents = 'auto';
            }, { once: true });

            unfreez();

        } else if (index == 1) {
            right_butts[num].style.pointerEvents = 'none';
            dvizhemaia_chast.style.transition = 'none';
            dvizhemaia_chast.style.transform = `translate(-255px,0px)`;
            // var parent = document.querySelector('.carusel_with_item');

            freez_site();

            first_to_end(parent);
            
            setTimeout(function() {
                // dvizhemaia_chast = document.querySelector('.carusel_with_item');
                dvizhemaia_chast.style.transition = 'transform 0.5s';
                dvizhemaia_chast.style.transform = `translate(0px,0px)`;
            }, 0);  
            
            dvizhemaia_chast.addEventListener('transitionend', function() {
                right_butts[num].style.pointerEvents = 'auto';
            }, { once: true });

            unfreez();
        }
    }

    
    var left_butts = document.querySelectorAll('.slider_button_left');
    var right_butts = document.querySelectorAll('.slider_button_right');

    left_butts.forEach(function(left_butt, num){
        left_butt.addEventListener('click', function() { 
            goToSlide(-1, num);
        });
        (right_butts[num]).addEventListener('click', function() { 
            goToSlide(1, num);
        });
    });
    
    function freez_site(){
        // Создаем оверлей
        var overlay = document.createElement('div');
        overlay.style.position = 'fixed';
        overlay.style.top = 0;
        overlay.style.left = 0;
        overlay.style.width = '100%';
        overlay.style.height = '100%';
        
        // Добавляем оверлей на страницу
        document.body.appendChild(overlay);
    };

    function unfreez(){
        document.body.removeChild(overlay);
    }
}