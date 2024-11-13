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
    var izenaValid = /^[a-zA-ZñÑ]{2,}$/.test(izena);

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
    var wordCount = textarea.split(/\s+/).filter(function(word) {
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

// var formulario = document.getElementById('formulario');


// formulario.addEventListener('submit', function (e) {

//     e.preventDefault();

//     var izenaValid = validateIzena();
//     var pasahitzaValid = validatePassword();
//     var emailValid = validateEmail();
    
//     if ( izenaValid && pasahitzaValid && emailValid ) {
//         // Send data to server using AJAX
//         var izena = document.getElementById('izena').value;
//         var pasahitza = document.getElementById('pasahitza').value;
//         var email = document.getElementById('email').value;
//         var produktua_id = document.getElementById('produktua_id').value;
//         console.log(produktua_id);
//         $.ajax({
//             type: 'POST',
//             url: 'submit.php',
//             data: {
//                 izena: izena,
//                 pasahitza: pasahitza,
//                 email: email,
//                 produktua_id: produktua_id
//             },
//             success: function(response) {
//                 // Display the response from the server
//                 $('#response').html(response);
                
//                 console.log('Success message displayed');
            
//                 // Automatically remove the success message after 3000 milliseconds (3 seconds)
//                 setTimeout(function () {
//                     console.log('Removing success message');
//                     $('#response').html('');
//                 }, 2000);
                
//                 $('#izena').val('');
//                 $('#pasahitza').val('');
//                 $('#email').val('');
//             },
//             error: function() {
//                 $('#response').html('Error submitting form.');
//             }
//         });
//         window.location.href = 'index.php';
//     }

//     return false;
// });