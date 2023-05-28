const search = document.querySelector('input[placeholder="Search requests"]');
const requestContainer = document.querySelector(".requests");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (serviceRequests) {
            requestContainer.innerHTML = "";
            loadRequests(serviceRequests)
        });
    }
});

function loadRequests(requests) {
    requests.forEach(request => {
        createRequest(request);
    });
}

function createRequest(request) {
    const template = document.querySelector("#request-template");
    const clone = template.content.cloneNode(true);

    const div = clone.querySelector("div");
    div.id = request.id;
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${request.file_name}`;

    const title = clone.querySelector("h2");
    title.innerHTML = request.bike_name;

    const description = clone.querySelector('p[name="description"]');
    console.log(description);
    description.innerHTML = request.description;

    const priceFiled = clone.querySelector('p[name="price"]');
    const price = "Price: ";
    priceFiled.innerHTML = price.concat(request.price, ' zł');

    const dateField = clone.querySelector('p[name="date"]');
    const date = "Created at: ";
    dateField.innerHTML = date.concat(request.date);

    const isAcceptedField = clone.querySelector('p[name="isAccepted"]');
    const isAccepted = request.is_accepted;
    if (isAccepted == 'true') {
        isAcceptedField.innerHTML = 'Accepted';
    } else {
        isAcceptedField.innerHTML = 'Not yet accepted';
    }

    requestContainer.appendChild(clone);
}