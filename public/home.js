function newCreateCategory() {
    let formCategory = document.querySelector("#categoryForm");
    formCategory.style.display = "block";
}

var openModalBtn = document.getElementById("createTaskButton");
var modal = document.getElementById("taskCreateModal");
var closeBtn = modal.querySelector(".closeCreateModal");

openModalBtn.onclick = function () {
    modal.style.display = "flex";
    modal.style.position = "fixed";
    modal.style.alignItems = "center";
    modal.style.justifyContent = "center";
    modal.style.height = "100vh";
    modal.style.width = "100vw";
    modal.style.inset = "0";
};

closeBtn.onclick = function () {
    modal.style.display = "none";
};

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

var openModalEditBtn = document.getElementById("editTask");
var modalEdit = document.getElementById("taskEditModal");
var closeBtn = modal.querySelector(".close");

openModalEditBtn.onclick = function () {
    modalEdit.style.display = "flex";
    modalEdit.style.position = "fixed";
    modalEdit.style.alignItems = "center";
    modalEdit.style.justifyContent = "center";
    modalEdit.style.height = "100vh";
    modalEdit.style.width = "100vw";
    modalEdit.style.inset = "0";
};

closeBtn.onclick = function () {
    modalEdit.style.display = "none";
};

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};
