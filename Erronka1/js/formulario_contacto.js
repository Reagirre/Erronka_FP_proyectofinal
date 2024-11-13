// validation.js

document.addEventListener('DOMContentLoaded', function () {
    var izenaInput = document.getElementById('izena');
    var emailInput = document.getElementById('email');
    var textareaInput = document.getElementById('deskripzioa');

    izenaInput.addEventListener('input', validateIzena);
    emailInput.addEventListener('input', validateEmail);
    textareaInput.addEventListener('input', validateTextarea);
});

function validateIzena() {
    var izena = document.getElementById('izena').value;

    // Validate Izena (at least two letters)
    // var izenaValid = /^[a-zA-ZñÑ ]{2,}$/.test(izena);
    var izenaValid = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*[a-zA-ZñÑáéíóúÁÉÍÓÚ][a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/.test(izena) && /[a-zA-ZñÑáéíóúÁÉÍÓÚ].*[a-zA-ZñÑáéíóúÁÉÍÓÚ]/.test(izena);

    // Display validation message for Izena
    displayValidationMessage('izenaValidation', izenaValid, 'Izenak gutxienez 2 letra izan behar ditu eta zenbaki gabea');
    return izenaValid;
}


function validateEmail() {
    var email = document.getElementById('email').value;

    // Validate Email (common email validation)
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var emailValid = emailRegex.test(email);

    // Display validation message for Email
    displayValidationMessage('emailValidation', emailValid, 'Ez du email formatua');
    return (emailValid);
}

function validateTextarea() {
    var textarea = document.getElementById('deskripzioa').value;

    // Validate textarea (at least 15 words)
    var wordCount = textarea.split(/\s+/).filter(function (word) {
        return word.length > 0;
    }).length;

    var textareaValid = wordCount >= 4;

    // Display validation message for textarea
    displayValidationMessage('textareaValidation', textareaValid, 'Deskripzioan beharrezkoak dira gutxienez 4 hitz');
    return textareaValid;
}

function displayValidationMessage(validationId, isValid, message) {
    var validationMessage = document.getElementById(validationId);
    if (isValid) {
        validationMessage.textContent = '';
        validationMessage.classList.remove("campo");
    } else {
        validationMessage.style.color = 'red';
        validationMessage.textContent = message;
        validationMessage.classList.add("campo");
    }
}


var formulario = document.getElementById('formulario');


formulario.addEventListener('submit', function (e) {

    e.preventDefault();

    var izenaValid = validateIzena();
    var emailValid = validateEmail();
    var textareaValid = validateTextarea();

    if (izenaValid && textareaValid && emailValid) {
        // Send data to server using AJAX
        var izena = document.getElementById('izena').value;
        var email = document.getElementById('email').value;
        var deskripzioa = document.getElementById('deskripzioa').value;

        console.log(izena);
        console.log(email);
        console.log(deskripzioa);
        var requestOptions = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                izena: izena,
                email: email,
                deskripzioa: deskripzioa,
            }),
        };

        // Realiza la solicitud fetch
        fetch('bidali.php', requestOptions)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error submitting form.');
                }
                return response.text();
            })
            .then(data => {
                // Muestra la respuesta del servidor
                $('#response').html(data);

                console.log('Success message displayed');

                // Elimina automáticamente el mensaje de éxito después de 3000 milisegundos (3 segundos)
                setTimeout(function () {
                    console.log('Removing success message');
                    $('#response').html('');
                }, 3000);

                // Limpia los valores de los campos del formulario
                $('#izena').val('');
                $('#email').val('');
                $('#deskripzioa').val('');
            })
            .catch(error => {
                // Maneja errores de la solicitud
                $('#response').html(error.message);
            });
    }

    return false;
});