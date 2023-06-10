function acceptRequest(id) {
    const query = 'div[id="'.concat(id,'"]')
    const container = document.querySelector(query);
    const isAcceptedField = container.querySelector('p[name="isAccepted"]');
    const button = container.querySelector('input[name="accept-button"]');

    fetch(`/acceptRequest/${id}`)
        .then(function () {
            isAcceptedField.innerHTML = 'Accepted';
            button.disabled = true;
        })
}
