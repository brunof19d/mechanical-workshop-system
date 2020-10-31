const formFilter = document.querySelector("#filter-table");

formFilter.addEventListener("input", function() {

    const clients = document.querySelectorAll(".client");

    if (this.value.length > 0) {

        for (var i = 0; i < clients.length; i++) {
            const client = clients[i];
            const tdName = client.querySelector(".info-name");
            const name = tdName.textContent;
            const tdId = client.querySelector(".info-id");
            const id = tdId.textContent;
            const expression = new RegExp(this.value, "i");

            if (!expression.test(name) && !expression.test(id) ) {
                client.classList.add("invisible");
            } else {
                client.classList.remove("invisible");
            }
        }
    } else {
        for (let i = 0; i < clients.length; i++) {
            const client = clients[i];
            client.classList.remove("invisible");
        }
    }
});