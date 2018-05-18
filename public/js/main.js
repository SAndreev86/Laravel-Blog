$(function (){
    $('.js-comment').click(function (eventObject) {

        $('#js-comment-add').empty();
        $('#js-comment-add').append('Комментировать ' + $(this).data("name") + '<div id="js-clear" class="btn btn-link" ><i class="fas fa-times"></i></div> ' +
            '<input type="hidden" name="parent_id" value="' + $(this).data("id") + '">');

        var scroll_el = $(this).attr('href'); // возьмем содержимое атрибута href, должен быть селектором, т.е. например начинаться с # или .
        if ($(scroll_el).length != 0) { // проверим существование элемента чтобы избежать ошибки
            $('html, body').animate({ scrollTop: $(scroll_el).offset().top }, 500); // анимируем скроолинг к элементу scroll_el
        }


        $('#comment-text').focus();

        return false; // выключаем стандартное действие

    });
    $('#js-comment-add').on("click", "div#js-clear", function(){
        $('#js-comment-add').empty();
        $('#js-comment-add').append('<input type="hidden" name="parent_id" value="0">');

    });
});

