$(document).ready(function () {
    const stripe = Stripe($('#stripe_pub_key').val());
    const elements = stripe.elements();

    const card = elements.create("card", {
        style: {
            base: {
                fontSize: "16px",
                color: "#32325d",
            },
        },
    });
    card.mount("#card-element");
    card.on("change", (event) => {
        const displayError = $("#card-errors");
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = "";
        }
    });
    $('#register-user').on('submit', paymentForm);
    function paymentForm(e) {
        e.preventDefault();
        const $form = $(this);
        $form.find('button').prop('disabled', true);
        stripe.createToken(card).then((result) => {
            if (result.error) {
                const errorElement = $("#card-errors");
                errorElement.textContent = result.error.message;
                $form.find('button').prop('disabled', false);
            } else {
                stripeTokenHandler(result.token);
            }
        });
    }

    function stripeTokenHandler(token) {
        const $form = $('#register-user');
        $form.append($('<input type="hidden" name="stripeToken">').val(token.id));
        $form.get(0).submit();
    }
});