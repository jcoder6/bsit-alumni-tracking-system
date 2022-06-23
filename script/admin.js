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
adminBtn.addEventListener('click', () => {
  console.log("admin btn clicked");
  adminModal.classList.toggle('admin-modal-open');
})

const msg = document.querySelector('.message');
try {
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
  
} catch (e) {
  console.log(e);
}

try {
  //for editor input when adding event description
const eventDesc = document.querySelector( '#eventDesc' );
CKEDITOR.replace( eventDesc );
} catch (e) {
  console.log(e);
}

function inputPhoto(e) {
  file = e.target.files.item(0);
  var fr = new FileReader;
  fr.onloadend =(imgsrc)=>{
     imgsrc = imgsrc.target.result; // file reader
  var img = document.createElement('img');
       img.src =imgsrc;
  this.nextSibling.nextSibling.innerHTML='';
  this.nextSibling.nextSibling.appendChild(img);
  };
  fr.readAsDataURL(file);
}


