import{Validator} from './js-form-validator.min';
if (document.querySelector('#form')){
// Get form handle
    let formHandle = document.querySelector('#form');

// Got to validation
    new Validator(formHandle, function (err, res) {

        // some code of success of validation
        return res;
    }, {
        // set auto tracking forcibly
        autoTracking: true
    });
}