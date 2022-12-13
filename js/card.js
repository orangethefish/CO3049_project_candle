window.onload = function () {

let cardnumber = document.getElementById('card-num');
let expirationdate = document.getElementById('exp');
let securitycode = document.getElementById('cvv');

    //Mask the Credit Card Number Input
    var cardnumber_mask = new IMask(cardnumber, {
        mask: '0000 0000 0000'
    });

    //Mask the security code
    var securitycode_mask = new IMask(securitycode, {
        mask: '000'
    });

    // Mask the Expiration Date
    var expirationdate_mask = new IMask(expirationdate, {
        mask: 'MM/YY',
        blocks: {
            YY:{
                mask: '00',
            },
            MM: {
                mask: IMask.MaskedRange,
                from: 1,
                to: 12
            }
        }
    });
}
