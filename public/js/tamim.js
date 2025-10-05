// toggle sidebar
let sidebarToggle = document.querySelector(".toggle");
let sidebar = document.querySelector(".sidebar");
let contentWrapper = document.getElementById("content-wrapper");

sidebarToggle.addEventListener("click", function () {
    sidebar.classList.toggle("hidden");
    // if (document.documentElement.clientWidth >= 768) {
    //     contentWrapper.classList.toggle('container');
    // }
});

// Delete customer
let deleteDialog = document.getElementById("deleteDialog");
let pageOverlay = document.querySelector(".page-overlay");
let itemName = document.querySelector(".item-name");
let dialogForm = document.getElementById("dialog-form");
let cancelButton = document.querySelector(".cancel-btn");

function deleteFun(name, action) {
    dialogForm.setAttribute("action", action);
    itemName.innerHTML = name;
    deleteDialog.classList.add("show");
    pageOverlay.classList.remove("d-none");
}

function cancelFun() {
    pageOverlay.classList.add("d-none");
    deleteDialog.classList.remove("show");
}


// Collapse

document.addEventListener('click', function () {
    
});

function collapse(ariaControls) {
    const aria = document.getElementById(ariaControls);
    aria.classList.toggle('show');
}
