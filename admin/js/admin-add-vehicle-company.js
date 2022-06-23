const resultRows = document.querySelectorAll("tr");
const editBtns = document.querySelectorAll(".edit-button");
const deleteBtns = document.querySelectorAll(".delete-button");
const table = document.querySelector("table");
const addRouteForm = document.querySelector("#addRouteForm");


resultRows.forEach(row =>
    row.addEventListener("click", editOrDelete)
);

if (table) {
    table.addEventListener("click", collapseForm);
}

function collapseForm(evt) {
    if (evt.target.className.includes("btn-close")) {
        const collapseRow = evt.target.parentElement.parentElement.parentElement.parentElement;

        // enable the edit button
        const editBtn = collapseRow.previousElementSibling.children[6].children[0];
        editBtn.disabled = false;
        editBtn.classList.remove("disabled");

        // Collapse the row
        collapseRow.remove();
    }
}

function editOrDelete(evt) {

    if (evt.target.className.includes("edit-button")) {
        // Disable the button
        evt.target.disabled = true;
        evt.target.classList.add("disabled");

        const editRow = document.createElement("tr");
        editRow.innerHTML = `
        <td colspan="6">
            <form class="editRouteForm d-flex justify-content-between" action="${evt.target.dataset.link}" method="POST">
                
                <input type="hidden" name="id" value="${evt.target.dataset.id}">
                <input type="text" class="form-control" name="company-name" value="${evt.target.dataset.company}" placeholder="Vehicle Company Name" minlength="2" required>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success btn-sm" name="edit">SUBMIT</button>
                    <button type="button" class="btn-close align-self-center"></button>
                </div>
            </form>
        </td>
    `;

        this.after(editRow);
    }
    // if delete button is clicked
    else if (evt.target.className.includes("delete-button")) {
        const deleteInput = document.querySelector("#delete-id");
        deleteInput.value = evt.target.dataset.id;
    }
}



// Route element
const routesBody = document.body;
// AddRouteForm
const busJsonInput = document.querySelector("#busJson");
const busJson = busJsonInput.value;
const searchBoxes = document.querySelectorAll(".searchBus");
const searchInputs = document.querySelectorAll(".busnoInput");
const suggBoxes = document.querySelectorAll(".sugg");
// Here is the bus data to be shown in the add Modal
let data = JSON.parse(busJson);

routesBody.addEventListener("click", listenforBusSearches);
function listenforBusSearches(evt) {
    if (evt.target.className.includes("busnoInput")) {
        const searchInput = evt.target;
        const searchBox = searchInput.parentElement;
        const suggBox = searchInput.nextElementSibling;
        searchInput.addEventListener("input", showSuggestions);
        suggBox.addEventListener("click", selectSuggestion);
    }
}


$('#vehicleTable').DataTable();