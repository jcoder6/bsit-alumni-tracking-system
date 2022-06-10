const msg = document.querySelector('.message');
let msgType = msg.dataset.messagetype;


window.addEventListener('DOMContentLoaded', () => {
  if(msgType == 'success'){
    msg.style.backgroundColor = '#96FE8A';
    msg.style.color = '#3d3d3d';
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