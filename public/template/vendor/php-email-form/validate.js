(function () {
    "use strict";

    let forms = document.querySelectorAll('.php-email-formm');

    forms.forEach(function (e) {
      e.addEventListener('submit', function (event) {
        event.preventDefault();

        let thisForm = this;

        // Update the action attribute to point to the Laravel route
        let action = "/store"; // Assuming your Laravel route is named 'store'

        let recaptcha = thisForm.getAttribute('data-recaptcha-site-key');

        if (!action) {
          displayError(thisForm, 'The form action property is not set!');
          return;
        }
        thisForm.querySelector('.loading').classList.add('d-block');
        thisForm.querySelector('.error-message').classList.remove('d-block');
        thisForm.querySelector('.sent-message').classList.remove('d-block');

        // Append CSRF token to form data
        let formData = new FormData(thisForm);
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

        if (recaptcha) {
          if (typeof grecaptcha !== "undefined") {
            grecaptcha.ready(function () {
              try {
                grecaptcha.execute(recaptcha, { action: 'php_email_form_submit' })
                  .then(token => {
                    formData.set('recaptcha-response', token);
                    php_email_form_submit(thisForm, action, formData);
                  })
                  .catch(error => {
                    displayError(thisForm, 'reCaptcha execution error: ' + error);
                  });
              } catch (error) {
                displayError(thisForm, 'reCaptcha error: ' + error);
              }
            });
          } else {
            displayError(thisForm, 'The reCaptcha javascript API url is not loaded!')
          }
        } else {
          php_email_form_submit(thisForm, action, formData);
        }
      });
    });
    function php_email_form_submit(thisForm, action, formData) {
        fetch(action, {
          method: 'POST',
          body: formData,
          headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => {
          if (response.ok) {
            return response.text();
          } else {
            throw new Error(`${response.status} ${response.statusText} ${response.url}`);
          }
        })
        .then(data => {
          thisForm.querySelector('.loading').classList.remove('d-block');
          if (data.trim() == 'OK') {
            thisForm.querySelector('.sent-message').classList.add('d-block');
            thisForm.querySelector('.error-message').classList.remove('d-block'); // Remove any existing error message
            thisForm.reset();
          } else {
            throw new Error(data ? data : 'Form submission failed and no error message returned from: ' + action);
          }
        })
        .catch((error) => {
          thisForm.querySelector('.loading').classList.remove('d-block');
          thisForm.querySelector('.error-message').innerHTML = 'Form submission failed: ' + error;
          thisForm.querySelector('.error-message').classList.add('d-block');
          thisForm.querySelector('.sent-message').classList.remove('d-block'); // Remove any existing success message
        });
      }


    function displayError(thisForm, error) {
      thisForm.querySelector('.loading').classList.remove('d-block');
      thisForm.querySelector('.error-message').innerHTML = error;
      thisForm.querySelector('.error-message').classList.add('d-block');
    }

  })();
