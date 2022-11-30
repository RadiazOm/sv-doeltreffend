window.addEventListener('load', init)

let container
let button1
let button2
let button3
let buttons = []

function init() {
    container = document.getElementById('radiobuttons');
    button1 = document.getElementById('rad1');
    button2 = document.getElementById('rad2');
    button3 = document.getElementById('rad3');
    buttons.push(button1)
    buttons.push(button2)
    buttons.push(button3)
    container.addEventListener('click', buttonClicker);
}


function buttonClicker(e) {

    let element = e.target;
    console.log(element);


    if (element.nodeName === 'LABEL' || element.nodeName === 'INPUT') {
        let buttonId = element.id;
        for (let button of buttons) {
            button.parentElement.classList.remove('is-link')
            if (button.id === buttonId) {
                button.parentElement.classList.add('is-link')
            }
        }
    }
}