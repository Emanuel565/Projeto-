function typeWriter(text, elementId, delay = 100, deleteDelay = 500) {
    let index = 0;
    const element = document.getElementById(elementId);

    function type() {
        if (index < text.length) {
            element.innerHTML += text.charAt(index);
            index++;
            setTimeout(type, delay);
        } else {
            setTimeout(deleteText, deleteDelay);
        }
    }

    function deleteText() {
        if (index > 0) {
            index--;
            element.innerHTML = text.slice(0, index);
            setTimeout(deleteText, delay);
        }
    }

    type();
}
