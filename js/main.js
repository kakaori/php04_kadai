function popup(){
    document.addEventListener("DOMContentLoaded", function() {
        const popAlert = document.getElementById("popalert");
        const popClose = document.getElementById("popclose");

        popAlert.style.display = "block";
        popAlert.style.opacity = 1; //初期状態の透明度
        popAlert.style.transition = "opacity 0.5s"; //透明度の変化にかかる時間

        setTimeout(function() {
            popAlert.style.opacity = 0; //フェードアウト
        }, 2000);

        popAlert.addEventListener('transitionend', function() {
            if (popAlert.style.opacity == 0) {
                popAlert.style.display = 'none'; //透明度が0になったら非表示
            }
        });

        popClose.addEventListener('click', function() {
            popAlert.style.display = 'none'; //popcloseがクリックされたら非表示
        });
    });
}