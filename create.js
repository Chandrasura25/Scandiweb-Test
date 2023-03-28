const bookBx = document.querySelector('#bookBx');
let selected = null;
let selectClass = bookBx;
const navigate = () => {
    window.location.href = './index.php';
};
const form = document.querySelector('.pro__form');
const skuInput = document.querySelector('#sku');
const nameInput = document.querySelector('#name');
const priceInput = document.querySelector('#price');
const productTypeInput = document.querySelector('#productType');
const weightInput = document.querySelector('#weight');
const heightInput = document.querySelector('#height');
const widthInput = document.querySelector('#width');
const lengthInput = document.querySelector('#length');
const sizeInput = document.querySelector('#size');
window.onload = function () {
    selectClass = bookBx;
};
function showDiv(select) {
    selected = select.value;
    if (selected) {
        const children = selectClass.querySelectorAll('.Book, .DVD, .Furniture');
        children.forEach((child) => {
            if (child.classList.contains(selected)) {
                child.style.display = 'block';
            } else {
                child.style.display = 'none';
            }
        });
    }
}
function validate(input) {
    const errors = {};
    if (!input.value) {
        errors[input.name] = "Please submit required data";
    }
    return errors;
}
const Validated = () => {
    const errors = {};
    if (!nameInput.value) {
        errors[nameInput.name] = "Please submit required data";
    }
    if (selected === 'Furniture' && (!heightInput.value || !widthInput.value || !lengthInput.value)) {
        errors[productTypeInput.name] = 'Please, provide dimensions';
    }
}

let inputArray = [skuInput, nameInput, priceInput, productTypeInput];
inputArray.forEach((input) => {
    input.addEventListener('blur', () => {
        const errors = validate(input);
        if (errors[input.name]) {
            input.classList.add('is-invalid');
            input.nextElementSibling.textContent = errors[input.name];
        } else {
            input.classList.remove('is-invalid');
            input.nextElementSibling.textContent = '';
        }
    });
});
productTypeInput.addEventListener('change', () => {
    showDiv(productTypeInput);

    if (productTypeInput.value == 'Furniture') {
        let inputArray = [heightInput, widthInput, lengthInput];
        function validate(input) {
            const errors = {};
            if (!heightInput.value || !widthInput.value || !lengthInput.value) {
                errors[productTypeInput.name] = "Please provide dimensions";
            }
            if (!input.value) {
                errors[input.name] = "Please submit required data";
            }

            return errors;
        }

        inputArray.forEach((input) => {
            input.addEventListener('blur', () => {
                const errors = validate(input);
                if (errors[input.name]) {
                    input.classList.add('is-invalid');
                    input.nextElementSibling.textContent = errors[input.name];
                } else {
                    input.classList.remove('is-invalid');
                    input.nextElementSibling.textContent = '';
                }
            });
        });
    }

    if (productTypeInput.value == 'Book') {
        let inputArray = [weightInput];

        function validate(input) {
            const errors = {};
            if (!weightInput.value) {
                errors[weightInput.name] = "Please provide weight";
            }
            if (!input.value) {
                errors[input.name] = "Please submit required data";
            }
            else if (isNaN(input.value)) {
                errors[input.name] = "Please provide a value of number type";
            }

            return errors;
        }
        inputArray.forEach((input) => {
            input.addEventListener('blur', () => {
                const errors = validate(input);
                if (errors[input.name]) {
                    input.classList.add('is-invalid');
                    input.nextElementSibling.textContent = errors[input.name];
                } else {
                    input.classList.remove('is-invalid');
                    input.nextElementSibling.textContent = '';
                }
            });
        });
    }

    if (productTypeInput.value == 'DVD') {
        const inputArray = [sizeInput];
        function validate(input) {
            const errors = {};
            if (!input.value) {
                errors[sizeInput.name] = "Please provide size";
            }
            else if (isNaN(input.value)) {
                errors[input.name] = "Please provide a value of number type";
            }
            return errors;
        }

        inputArray.forEach((input) => {
            input.addEventListener('blur', () => {
                const errors = validate(input);
                if (errors[input.name]) {
                    input.classList.add('is-invalid');
                    input.nextElementSibling.textContent = errors[input.name];
                } else {
                    input.classList.remove('is-invalid');
                    input.nextElementSibling.textContent = '';
                }
            });
        });
    }
});
