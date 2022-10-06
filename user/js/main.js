let Sidebar = document.querySelector(".Sidebar");
let btnOpne = document.getElementById("btn-opne");
let navbar = document.querySelector(".navbar");
let navClose = document.getElementById("nav-toggle-close");



btnOpne.addEventListener("click", () => {
    Sidebar.style.display = "block";
    navClose.style.display = "flex";
});

navClose.addEventListener("click", () => {
    Sidebar.style.display = "none";
    navClose.style.display = "none";
});

// ========================== start login =====================


let sign_in_btn = document.getElementById("sign-in-btn");
let signup_btn = document.getElementById("sign-up-btn");
let container= document.getElementById("container");

signup_btn.addEventListener("click", ()=> {
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", ()=> {
    container.classList.remove("sign-up-mode");
});
// ========================== end login =====================