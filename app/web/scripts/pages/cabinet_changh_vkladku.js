window.addEventListener('load', function() {


    let favorit_img = document.querySelector('div.favorit_img');
    let favorit_cabinet = document.querySelector('div.favorit_cabinet');


    let user_img = document.querySelector('div.user_img');
    let info_about_user_cabinet = document.querySelector('div.info_about_user_cabinet');


    let setting_img = document.querySelector('div.setting_img');
    let settings_cabinet = document.querySelector('div.settings_cabinet');


    favorit_img.addEventListener('click', function() {
        favorit_cabinet.style.display = 'flex';
        favorit_img.style.backgroundColor = "#FFFFFF";
        

        info_about_user_cabinet.style.display = 'none';
        user_img.style.backgroundColor = "#082C63";
        user_img.querySelector('div.user_icon_cover').style.borderColor = "#FFFFFF";
        user_img.querySelector('img.user_img').style.filter = "invert(1)";

        settings_cabinet.style.display = 'none';
        setting_img.style.backgroundColor = "#082C63";
        setting_img.querySelector('img.setting_img').style.filter="invert(1)";
    });

    user_img.addEventListener('click', function() {
        info_about_user_cabinet.style.display = 'flex';
        user_img.style.backgroundColor = "#FFFFFF";
        user_img.querySelector('div.user_icon_cover').style.borderColor = "#082C63";
        user_img.querySelector('img.user_img').style.filter = "none";

        favorit_cabinet.style.display = 'none';
        favorit_img.style.backgroundColor = "#082C63";
        

        settings_cabinet.style.display = 'none';
        setting_img.style.backgroundColor = "#082C63";
        setting_img.querySelector('img.setting_img').style.filter="invert(1)";
    });

    setting_img.addEventListener('click', function() {
        settings_cabinet.style.display = 'flex';
        setting_img.style.backgroundColor = "#FFFFFF";
        setting_img.querySelector('img.setting_img').style.filter="none";

        favorit_cabinet.style.display = 'none';
        favorit_img.style.backgroundColor = "#082C63";
        

        info_about_user_cabinet.style.display = 'none';
        user_img.style.backgroundColor = "#082C63";
        user_img.querySelector('div.user_icon_cover').style.borderColor = "#FFFFFF";
        user_img.querySelector('img.user_img').style.filter = "invert(1)";
    });

    // function change_in_min_opasity(element){
    //     let opacity = 1; // Начальное значение прозрачности
    //     element.style.opacity = opacity;
    //     // Функция setInterval() в JavaScript используется для выполнения указанной функции или кода через равные промежутки времени. Эти промежутки времени задаются в миллисекундах.
    //     // Функция setInterval() возвращает идентификатор интервала, который можно использовать для остановки выполнения функции с помощью функции clearInterval().
    //     let timer = setInterval(function() {
    //         if (opacity <= 0.025){
    //             clearInterval(timer);
    //             element.style.display = 'none'; // Скрываем элемент, когда он становится полностью прозрачным
    //         }
    //         element.style.opacity = opacity;
    //         // element.style.filter = 'alpha(opacity=' + opacity * 100 + ")";
    //         opacity -= 0.025;
    //     }, 50); // Задаем интервал изменения прозрачности (50 мс * 40 = 2 секунды)
    // };

    // function change_in_max_opasity(element){
    //     element.style.display = 'block';
    //     let opacity = 0; // Начальное значение прозрачности
    //     element.style.opacity = opacity;

    //     let timer = setInterval(function() {
    //         if (opacity >= 0.975){
    //             clearInterval(timer);
    //             element.style.opacity = 1;
    //         }
    //         element.style.opacity = opacity;
    //         // element.style.filter = 'alpha(opacity=' + opacity * 100 + ")";
    //         opacity += 0.025;
    //     }, 50); // Задаем интервал изменения прозрачности (50 мс * 40 = 2 секунды)
    // };

    // function rgbToHex(rgb) {
    //     let sep = rgb.indexOf(",") > -1 ? "," : " ";
    //     rgb = rgb.substr(4).split(")")[0].split(sep);
    //     let r = (+rgb[0]).toString(16).toUpperCase(),
    //         g = (+rgb[1]).toString(16).toUpperCase(),
    //         b = (+rgb[2]).toString(16).toUpperCase();
    //     if (r.length == 1)
    //         r = "0" + r;
    //     if (g.length == 1)
    //         g = "0" + g;
    //     if (b.length == 1)
    //         b = "0" + b;
    //     return "#" + r + g + b;
    // }

    // function rgbToHex(rgb) {
    //     rgb = rgb.match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)\)$/);
    //     if (!rgb) return "#000000"; // если цвет не найден, возвращает черный
    //     function hex(x) {
    //         return ("0" + parseInt(x).toString(16)).slice(-2).toUpperCase();
    //     }
    //     return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
    // }



    // favorit_img.addEventListener('click', function() {
    //     if(arr[0] === 0){
    //         favorit_cabinet.style.display = 'none';
    //         arr[0]=1;
    //         if(arr[1] === 1){
    //             info_about_user_cabinet.style.display = 'block';
    //             user_img.style.backgroundColor = "#082C63";
    //             arr[1]=0;
    //         }
    //         else if(arr[2] === 1){
    //             settings_cabinet.style.display = 'block';
    //             setting_img.style.backgroundColor = "#082C63";
    //             arr[2]=0;
    //         }
    //         favorit_img.style.backgroundColor = "#FFFFFF";
    //     }
    // });
    // user_img.addEventListener('click', function() {
    //     if(arr[1] === 0){
    //         info_about_user_cabinet.style.display = 'none';
    //         arr[1]=1;
    //         if(arr[0] === 1){
    //             favorit_cabinet.style.display = 'block';
    //             favorit_img.style.backgroundColor = "#082C63";
    //             arr[0]=0;
    //         }
    //         else if(arr[2] === 1){
    //             settings_cabinet.style.display = 'block';
    //             setting_img.style.backgroundColor = "#082C63";
    //             arr[2]=0;
    //         }
    //         user_img.style.backgroundColor = "#FFFFFF";
    //     }
    // });
    // setting_img.addEventListener('click', function() {
    //     if(arr[2] === 0){
    //         settings_cabinet.style.display = 'none';
    //         setting_img.style.backgroundColor = "#FFFFFF";
    //         arr[2]=1;
    //         if(arr[0] === 1){
    //             favorit_cabinet.style.display = 'block';
    //             favorit_img.style.backgroundColor = "#082C63";
    //             arr[0]=0;
    //         }
    //         else if(arr[1] === 1){
    //             info_about_user_cabinet.style.display = 'block';
    //             user_img.style.backgroundColor = "#082C63";
    //             arr[1]=0;
    //         }
    //     }
    // });

    // function change_in_min_opasity1(element){
    //     element.style.display = 'none';
    // };
    // function change_in_max_opasity1(element){
    //     element.style.display = 'block';
    // };

    // favorit_img.addEventListener('click', function() {
    //     // rgbToHex(color)
    //     // alert(rgbToHex(favorit_img_style.backgroundColor));
    //     if(rgbToHex(favorit_img.style.backgroundColor) !== "#FFFFFF"){
    //         // change_in_min_opasity1(favorit_cabinet);
    //         favorit_cabinet.style.display = 'none';
    //         alert("Цвет профиль: "+rgbToHex(user_img.style.backgroundColor));
    //         if(rgbToHex(user_img.style.backgroundColor) === "#FFFFFF"){
    //             // change_in_max_opasity1(info_about_user_cabinet);
    //             info_about_user_cabinet.style.display = 'block';
    //             user_img.style.backgroundColor = "#082C63";
    //         }
    //         else if(rgbToHex(setting_img.style.backgroundColor) === "#FFFFFF"){
    //             // change_in_max_opasity1(settings_cabinet);
    //             settings_cabinet.style.display = 'block';
    //             setting_img.style.backgroundColor = "#082C63";
    //         }

    //         favorit_img.style.backgroundColor = "#FFFFFF";
    //     }
    //     // else{
    //     //     alert("что то не так");
    //     // }
    // });
    // user_img.addEventListener('click', function() {
    //     if(rgbToHex(user_img.style.backgroundColor) != "#FFFFFF"){
    //         // change_in_min_opasity1(info_about_user_cabinet);
    //         info_about_user_cabinet.style.display = 'none';
    //         alert("Цвет избр: "+rgbToHex(favorit_img.style.backgroundColor));
    //         alert("Цвет избр: "+favorit_img.style.backgroundColor);
    //         if(rgbToHex(favorit_img.style.backgroundColor) === "#FFFFFF"){
    //             // change_in_max_opasity1(favorit_cabinet);
    //             favorit_cabinet.style.display = 'block';
    //             favorit_img.style.backgroundColor = "#082C63";
    //         }
    //         else if(rgbToHex(setting_img.style.backgroundColor) === "#FFFFFF"){
    //             // change_in_max_opasity1(settings_cabinet);
    //             settings_cabinet.style.display = 'block';
    //             setting_img.style.backgroundColor = "#082C63";
    //         }

    //         user_img.style.backgroundColor = "#FFFFFF";
    //     }
    //     // else{alert("что то не так");}
    // });
    // setting_img.addEventListener('click', function() {
    //     if(rgbToHex(setting_img.style.backgroundColor) !== "#FFFFFF"){
    //         // change_in_min_opasity1(settings_cabinet);
    //         settings_cabinet.style.display = 'none';
            
    //         setting_img.style.backgroundColor = "#FFFFFF";
    //         // alert("что то не так дальше");

    //         alert("Цвет избр: "+rgbToHex(favorit_img.style.backgroundColor));
    //         alert("Цвет избр: "+favorit_img.style.backgroundColor);
    //         if(rgbToHex(favorit_img.style.backgroundColor) === "#FFFFFF"){
    //             // change_in_max_opasity1(favorit_cabinet);
    //             favorit_cabinet.style.display = 'block';
    //             favorit_img.style.backgroundColor = "#082C63";
    //         }
    //         else if(rgbToHex(user_img.style.backgroundColor) === "#FFFFFF"){
    //             // change_in_max_opasity1(info_about_user_cabinet);
    //             info_about_user_cabinet.style.display = 'block';
    //             user_img.style.backgroundColor = "#082C63";
    //         }
    //     }//else{alert("что то не так");}
    // });
});