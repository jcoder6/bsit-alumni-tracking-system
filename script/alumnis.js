// console.log('hello world');

/* ======================================
    lOGIN AND REGISTER MODALS SCRIPTS
========================================*/
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


/* ======================================
        DYNAMIC PAGE SCRIPT
========================================*/
const mainPage = document.querySelector('.main-page');
const loc = window.location.href;

let page = "";
for(let i = 41; i < loc.length; i++){
  page += loc[i];
}

if(page !== "events"){
  mainPage.classList.add('not-home');
} else {
  mainPage.classList.remove('not-home');
}

if(page === ""){
  mainPage.classList.remove('not-home');
}


/* ======================================
    FETCH DEVELOPERS THROUGH JSON
========================================*/
const developersContainer = document.querySelector('.developers');
const developers = new XMLHttpRequest();
developers.open("GET", "./front-partials/developers.json", true);
developers.send();

developers.onload = function() {
  if(this.readyState === 4){
    const res = JSON.parse(developers.responseText);
    const devResult = res.developers;
    displayDevelopers(devResult);
  }
}

function displayDevelopers(devResult){
  let compileDevs = devResult.map((dev) => {
    return `<div class="developer">
        <div class="img-container">
          <img src="${dev.img}" alt="${dev.name}">
        </div>

        <div class="dev-name">
          ${dev.name}
        </div>

        <ul class="dev-links">
          <a href="${dev.links[0]}">
            <li><i class="fa-brands fa-facebook"></i></li>
          </a>
          <a href="${dev.links[1]}">
            <li><i class="fa-brands fa-instagram"></i></li>
          </a>
          <a href="${dev.links[2]}">
            <li><i class="fa-brands fa-twitter"></i></li>
          </a>
        </ul>
      </div>`
  }).join('');

  developersContainer.innerHTML = compileDevs;
}




