let toggle = false;
const dot = document.querySelector('#dot');
const body = document.body;
document.querySelector('#switch').addEventListener('click', function(){
    if(!toggle){
        dot.classList.remove('backwardDot');
        body.classList.remove('backwardBg');
        dot.classList.add('forwardDot');
        body.classList.add('forwardBg');
        
    }
    else{
        dot.classList.remove('forwardDot');
        body.classList.remove('forwardBg');
        dot.classList.add('backwardDot');
        body.classList.add('backwardBg');
    }
    toggle = !toggle;
    console.log('dupa')
})