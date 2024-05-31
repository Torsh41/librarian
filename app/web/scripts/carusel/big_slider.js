// window.onload = function() {
    window.addEventListener('load', function() {
        
        function replace_children(parent, index1,index2){
            var firstChild = parent.children[index1];
            var sixthChild = parent.children[index2];

            var cloneFirstChild = firstChild.cloneNode(true);
            var cloneSixthChild = sixthChild.cloneNode(true);

            parent.replaceChild(cloneSixthChild, firstChild);
            parent.replaceChild(cloneFirstChild, sixthChild);
        }

        function first_to_end(objParent){
            var lastChild = objParent.lastElementChild;
            objParent.insertBefore(lastChild, objParent.firstElementChild);
        }
        function last_to_start(objParent){
            var firstChild = objParent.firstElementChild;
            objParent.appendChild(firstChild);
        }
    
        function goToSlide2(index) {
            var dvizhemaia_chast1 = document.querySelector('.big_carusel_with_item');
            var ch = document.querySelector('.big_carusel_with_item').children[6];//.children[0];
            var ch2 = document.querySelector('.big_carusel_with_item').children[5];//.children[0];
            var ch3 = document.querySelector('.big_carusel_with_item').children[4];//.children[0];

            ch.style.transition = 'transform 0.5s';
            ch2.style.transition = 'transform 0.5s';
            ch3.style.transition = 'transform 0.5s';
            
            if (index == 1) {
                left_butt1.style.pointerEvents = 'none';
                dvizhemaia_chast1.style.transition = 'transform 0.5s';

                ch.style.transform = 'scale('+350/300+","+490/426+")";
                ch2.style.transform = 'scale('+300/350+","+426/490+")";
                dvizhemaia_chast1.style.transform = `translate(-355px,0px)`;
                
                freez_site1();
                
                dvizhemaia_chast1.addEventListener('transitionend', function() {
                    last_to_start(dvizhemaia_chast1);
                    dvizhemaia_chast1.style.transition = 'none';
                    ch.style.transform = 'none'; ch2.style.transform = 'none';
                    ch.style.width = "350px"; ch.style.height = "490px";
                    ch2.style.width = "300px"; ch2.style.height = "426px";
                    dvizhemaia_chast1.style.transform = `translate(0px,0px)`;
                    left_butt1.style.pointerEvents = 'auto';
                }, { once: true });
    
                unfreez1();
    
            } else if (index == -1) {
                right_butt1.style.pointerEvents = 'none';
                dvizhemaia_chast1.style.transition = 'none';
                ch2.style.transform = 'none'; ch3.style.transform = 'none';
                // ch3.style.width = "350px"; ch3.style.height = "490px";
                // ch2.style.width = "300px"; ch2.style.height = "426px";
                dvizhemaia_chast1.style.transform = `translate(-355px,0px)`;
                // var parent = document.querySelector('.carusel_with_item');
    
                freez_site1();
    
                first_to_end(dvizhemaia_chast1);
                
                setTimeout(function() {
                    // dvizhemaia_chast = document.querySelector('.carusel_with_item');
                    dvizhemaia_chast1.style.transition = 'transform 0.5s';
                    ch2.style.transform = 'transform 0.5s'; ch3.style.transform = 'transform 0.5s';
                    ch3.style.transform = 'scale('+350/300+","+490/426+")";
                    ch2.style.transform = 'scale('+300/350+","+426/490+")";
                    dvizhemaia_chast1.style.transform = `translate(0px,0px)`;
                }, 0);  

                ch3.style.width = "350px"; ch3.style.height = "490px";
                ch2.style.width = "300px"; ch2.style.height = "426px";
                
                dvizhemaia_chast1.addEventListener('transitionend', function() {
                    right_butt1.style.pointerEvents = 'auto';
                }, { once: true });
    
                unfreez1();
            }
        }
        var overlay;
        function freez_site1(){
            // Создаем оверлей
            overlay = document.createElement('div');
            overlay.style.position = 'fixed';
            overlay.style.top = 0;
            overlay.style.left = 0;
            overlay.style.width = '100%';
            overlay.style.height = '100%';
            
            // Добавляем оверлей на страницу
            document.body.appendChild(overlay);
        };
    
        function unfreez1(){
            document.body.removeChild(overlay);
        }
    
        
        var left_butt1 = document.querySelector('.big_slider_button_left');
        var right_butt1 = document.querySelector('.big_slider_button_right');
    
    
        left_butt1.addEventListener('click', function() { 
            goToSlide2(-1);
        });
        right_butt1.addEventListener('click', function() { 
            goToSlide2(1);
        });
    // }
    });