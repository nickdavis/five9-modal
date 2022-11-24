document.addEventListener("DOMContentLoaded", function() {
    const chat_trigger = document.querySelector('.five9-modal__trigger');

    if ( chat_trigger ) {
        chat_trigger.addEventListener('click', function (event) {
            event.preventDefault();
            const chat_target = document.getElementById( 'five9-maximize-button' );
            document.dispatchEvent(new Event("click"));
            chat_target.dispatchEvent(new Event("click"));
        });
    }
});
