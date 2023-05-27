<!-- Bootstrap scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<!-- jQuery scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<script>
    (function() {
        const CREATE_QUIZ_MODAL = $('#createQuizModal')
        const ADD_NEW_OPTION_BTN = CREATE_QUIZ_MODAL.find('.modal-footer .btn-secondary')
        const CREATE_QUIZ_FORM = CREATE_QUIZ_MODAL.find('form#create-quiz')

        ADD_NEW_OPTION_BTN.on('click', (e) => {
            const TEMPLATE_OF_OPTION = CREATE_QUIZ_FORM.find('.input-template').prop('outerHTML')

            CREATE_QUIZ_FORM.append(TEMPLATE_OF_OPTION)

            const RADIO_BTNS_IN_MODAL = CREATE_QUIZ_FORM.find('input[type="radio"]')

            RADIO_BTNS_IN_MODAL.each((index, radioBnt) => {
                $(radioBnt).val(index)
            })
        })
    })()
</script>