document.addEventListener("DOMContentLoaded", function() {
    const chat_triggers = document.querySelectorAll('.five9-modal__trigger');

    if (chat_triggers.length > 0) {
        chat_triggers.forEach(trigger => {
            trigger.addEventListener('click', function (event) {
                event.preventDefault();
                const chat_target = document.getElementById('five9-maximize-button');
                document.dispatchEvent(new Event("click"));
                if (chat_target) {
                    chat_target.dispatchEvent(new Event("click"));
                }
            });
        });
    }
});
