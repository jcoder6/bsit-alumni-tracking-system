console.log('hell0 world');

/* ======================================
    lOGIN AND REGISTER MODALS SCRIPTS
========================================*/
const body = document.querySelector('body');
const logIn = document.querySelector('.login-link');
const logInModalContainer = document.querySelector('.login-modal-container');
const closeBtn = document.querySelector('.close-btn');
const caCloseBtn = document.querySelector('.ca-close-btn');
const regCloseBtn = document.querySelector('.reg-close-btn');
const registerLink = document.querySelector('.register-link');
const caLink = document.querySelector('.ca-link');
const registerModalContainer = document.querySelector('.registration-modal-container');
const createAcctModalContainer = document.querySelector('.createAcct-modal-container');

logIn.addEventListener('click', () => {
  addModal(logInModalContainer);
})

caLink.addEventListener('click', () => {
  removeModal(logInModalContainer);
  addModal(createAcctModalContainer);
})

closeBtn.addEventListener('click', () => {
  removeModal(logInModalContainer);
})

regCloseBtn.addEventListener('click', () => {
  console.log('tfdsfdseg');
  removeModal(registerModalContainer);
})

caCloseBtn.addEventListener('click', () => {
  console.log('tfdsfdseg');
  removeModal(createAcctModalContainer);
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
      EMPLOYMENT FORM SCRIPT
========================================*/

const checkbox = document.getElementById('employCB')
const companyName = document.querySelector('.company_name');
const position = document.querySelector('.position');
const salRange = document.querySelector('.salary-range');
checkbox.addEventListener('change', (event) => {
  let cbValue = (event.currentTarget.checked) ? 'employed' : 'unemployed'; 
  
  if(cbValue !== 'employed'){
    companyName.classList.add('disabled');
    position.classList.add('disabled');
    salRange.classList.add('disabled');
  }

  if(cbValue === 'employed'){
    companyName.classList.remove('disabled');
    position.classList.remove('disabled');
    salRange.classList.remove('disabled');
  }
})

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
// console.log(page);
if(page === "" || page === "events#"){
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

  try {
    developersContainer.innerHTML = compileDevs;
  } catch (error) {
    console.log(error);
  }
}

/* ======================================
        MESSAGE ALERTS
========================================*/
try {
  const msg = document.querySelector('.message');
  let msgType = msg.dataset.messagetype;


  document.addEventListener('DOMContentLoaded', () => {
    console.log(msg);
    console.log('hello');
    if(msgType == 'success'){
      msg.style.color = '#3d3d3d';
      msg.style.backgroundColor = '#96FE8A';
      msg.classList.add('message-active');
    }

    if(msgType == 'error'){
      msg.style.backgroundColor = '#F96F6F';
      msg.classList.add('message-active');
    }

    setTimeout(() => {
      msg.classList.remove('message-active');
    }, 2000);
  })
} catch (e) {
  console.log(e);
}




