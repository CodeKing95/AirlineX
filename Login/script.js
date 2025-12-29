const loginBtn = document.querySelector(".login-btn");
const registerBtn = document.querySelector(".register-btn");
const container = document.querySelector(".container");

registerBtn.addEventListener("click", () => {
  container.classList.add("active");
});

loginBtn.addEventListener("click", () => {
  container.classList.remove("active");
});
