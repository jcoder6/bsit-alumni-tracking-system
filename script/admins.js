const featureLinks = document.querySelectorAll('.feature-link');
const loc = window.location.href;

let page = "";
for(let i = 47; i < loc.length; i++){
  page += loc[i];
}

featureLinks.forEach(featureLink => {
  let feature = featureLink.dataset.feature;
  if(feature === page){
    featureLink.classList.add('feature-link-active');
  }
})

const adminModal = document.querySelector('.admin-modal');
const adminBtn = document.querySelector('.admin');

console.log(adminModal);
adminBtn.addEventListener('click', () => {
  console.log("admin btn clicked");
  adminModal.classList.toggle('admin-modal-open');
})

const msg = document.querySelector('.message');
let msgType = msg.dataset.messagetype;


window.addEventListener('DOMContentLoaded', () => {
  console.log(msg);
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


