const _token = "{{ csrf_token() }}";


function btnDisableHandler(button, disabled, text){
    if(disabled){
        $(button).html(`<i class="fa fa-spinner fa-spin" style="font-size:20px"></i> ${text}`);
        $(button).css({'cursor': 'not-allowed', 'opacity':'.7'});
        $(button).attr('disabled', true);
    }else{
        $(button).attr('disabled', false);
        $(button).html(text);
        $(button).css({'cursor': 'pointer','opacity':'1'});
    }
}


function sweetAlertMessage(type, message){
    const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })

    Toast.fire({
    icon: type,
    title: message
    })
}


function validateEmail(email){
    const emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test(email);
}




function reset(phone) {
    $(phone).removeClass("error");
};




function validateAgeUnder(date){
    const dateOfBirth = date;
    const arr_dateText = dateOfBirth.split("/");
    day = arr_dateText[1];
    month = arr_dateText[0];
    year = arr_dateText[2];

    const mydate = new Date();
    mydate.setFullYear(year, month - 1, day);

    const maxDate = new Date();
    maxDate.setYear(maxDate.getFullYear() - 18);

    if (maxDate < mydate) {
        return 'age can\'t be less than 18 years old';
    }

    return true;
}




function getDynamicInputValues(value){
    var dynamicArray = [];
    if($(`input[name='${value}[]']`) !== undefined){
        dynamicArray = $(`input[name='${value}[]']`).map(function(){
                return $(this).val();
        }).get();
    }
    return dynamicArray;
}
