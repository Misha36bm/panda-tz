<!-- Bootstrap scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<!-- jQuery scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<script>
    const CREATE_QUIZ_MODAL = document.getElementById('createQuizModal');

    const ADD_NEW_OPTION_BTN = CREATE_QUIZ_MODAL.querySelector('.modal-footer .btn-secondary');

    const CREATE_QUIZ_FORM = CREATE_QUIZ_MODAL.querySelector('#create-quiz');

    ADD_NEW_OPTION_BTN.addEventListener('click', (e) => {
        const TEMPLATE_OF_OPTION = document.createElement('div')

        TEMPLATE_OF_OPTION.innerHTML = CREATE_QUIZ_FORM.querySelector('.form-check').outerHTML

        CREATE_QUIZ_FORM.appendChild(TEMPLATE_OF_OPTION)

        let RADIO_BTNS_IN_MODAL = CREATE_QUIZ_FORM.querySelectorAll('input[type="radio"]')

        RADIO_BTNS_IN_MODAL = Array.from(RADIO_BTNS_IN_MODAL);

        RADIO_BTNS_IN_MODAL.forEach((radioBnt, index) => {
            radioBnt.value = index;
        })
    })
</script>