console.log('hello');
const body = document.querySelector('body');
const logIn = document.querySelector('.login-link');
const logInModalContainer = document.querySelector('.login-modal-container');
const closeBtn = document.querySelector('.close-btn');
const regCloseBtn = document.querySelector('.reg-close-btn');
const registerLink = document.querySelector('.register-link');
const registerModalContainer = document.querySelector('.registration-modal-container');

logIn.addEventListener('click', () => {
  addModal(logInModalContainer);
})

closeBtn.addEventListener('click', () => {
  removeModal(logInModalContainer);
})

registerLink.addEventListener('click', () => {
  removeModal(logInModalContainer);
  addModal(registerModalContainer);
})

regCloseBtn.addEventListener('click', () => {
  removeModal(registerModalContainer);
})


function removeModal(modal) {
  body.classList.remove('scroll-lock');
  modal.style.opacity = '0';
  modal.style.zIndex = '-10';
}

function addModal(modal) {
  body.classList.add('scroll-lock');
  modal.style.opacity = '1';
  modal.style.zIndex = '10';
}


