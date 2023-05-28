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
        // console.log(request);
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
    const description = clone.querySelector("p");
    description.innerHTML = request.description;

    requestContainer.appendChild(clone);
}