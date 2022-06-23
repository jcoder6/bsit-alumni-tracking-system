const featureLinks = document.querySelectorAll('.feature-link');
const loc = window.location.href;

let page = "";
for(let i = 47; i < loc.length; i++){
  page += loc[i];
}
/* ======================================
        DYNAMIC DISPLAYING
========================================*/
featureLinks.forEach(featureLink => {
  let feature = featureLink.dataset.feature;
  if(feature === page){
    featureLink.classList.add('feature-link-active');
  }
})

/* ======================================
        DROP FUNCTION
========================================*/

const adminModal = document.querySelector('.admin-modal');
const adminBtn = document.querySelector('.admin');
adminBtn.addEventListener('click', () => {
  console.log("admin btn clicked");
  adminModal.classList.toggle('admin-modal-open');
})

/* ======================================
        FOR MESSAGING MODAL
========================================*/

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

/* ======================================
        DISPLAYING CKEDITOR
========================================*/

try {
  //for editor input when adding event description
const eventDesc = document.querySelector( '#eventDesc' );
CKEDITOR.replace( eventDesc );
} catch (e) {
  console.log(e);
}

/* ======================================
  DISPLAYING INPUT PHOTO IN ADD EVENTS
========================================*/
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


/* ======================================
        FOR GRAPHS IN DASHBOARD
========================================*/
const employs = parseInt(document.querySelector('.employ1').textContent);
const unemploys = parseInt(document.querySelector('.employ2').textContent);
let ems = [employs, unemploys];
let myChart = document.getElementById('myChart').getContext('2d');
Chart.defaults.font.family = 'Josefin Sans';
let bastaChart = new Chart(myChart, {
  type: 'bar',
  data: {
    labels: ['employed', 'Unemployed'],
    datasets: [{
      label: 'Employment Status',
      data: ems,
      backgroundColor: ['#5ED1FF', '#FFD33D'],
      borderWidth: 2,
      borderColor: '#777',
      hoverBorderWidth: 5,
      hoverBorderColor: '#000'
    }]
  },
  options: {
    plugins: {
      legend: {
          labels: {
              // This more specific font property overrides the global property
              font: {
                  size: 20
              }
          }
      }
  }
  }
})

const salary1 = parseInt(document.querySelector('.salary1').textContent);
const salary2 = parseInt(document.querySelector('.salary2').textContent);
const salary3 = parseInt(document.querySelector('.salary3').textContent);
const salary4 = parseInt(document.querySelector('.salary4').textContent);
const salary5 = parseInt(document.querySelector('.salary5').textContent);
const salaryData = [salary1, salary2, salary3, salary4, salary5];
let myBarChart = document.getElementById('myBarGraph').getContext('2d');
let barChart = new Chart(myBarChart, {
  type: 'pie',
  data: {
    labels: ['0-10,000', '10,001-50,000', '50,001-100,000', '100,001-200,000', '200,000 and above'],
    datasets: [{
      label: 'Population',
      data: salaryData,
      backgroundColor: ['#5ED1FF', '#FFD33D', '#5E56F0', '#F23360', '#337ED3'],
      borderWidth: 2,
      borderColor: '#777',
      hoverBorderWidth: 5,
      hoverBorderColor: '#000'
    }]
  }
})


