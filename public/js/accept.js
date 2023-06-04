const acceptButtons = document.querySelectorAll('button[name="accept-button"]');

function accept() {
    const requests = this;
    const container = requests.parentElement.parentElement;
    const id = container.getAttribute("id");
    const isAcceptedField = container.querySelector('p[name="isAccepted"]');
    const button = container.querySelector('button[name="accept-button"]');

    fetch(`/acceptRequest/${id}`)
        .then(function () {
            isAcceptedField.innerHTML = 'Accepted';
            button.disabled = true;
        })
}

acceptButtons.forEach(button => button.addEventListener("click", accept));
