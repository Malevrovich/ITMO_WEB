function validate(value) {
    const num = Number(value)
    value = value.trim();
    let msg = ''
    if(!value) {
        msg = "Заполните поле."
    }
    if(isNaN(value)) {
        msg = "Введите число"
    }
    if(!isFinite(value)) {
        msg = "Введите конечное число"
    }
    if(num >= 5 || num <= -5) {
        msg = "Введите число от -5 до 5, не включительно"
    }
    return {
        status: !msg,
        msg: msg
    }
}

function checkField(inputField) {
    const checkButton = document.getElementById('check-button')

    const validStatus = validate(inputField.value)

    if(!validStatus.status){
        inputField.style.backgroundColor = "#9D0000"
        
        inputField.setCustomValidity(validStatus.msg)
    } else {
        inputField.style.backgroundColor = "#171717"
        inputField.style.border = "none"

        inputField.setCustomValidity("")
    }
}

const inputField = document.getElementById('y-input')
inputField.oninput = () => checkField(inputField);