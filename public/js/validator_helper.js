$(document).ready(function() {
    $("#submitConvert").on('click',function(e){
        var numbersType = $("select[name='toNumber']").val();
        if(numbersType == "Arabic")
        {
            var input = $('#roman-txt').val();
            var regex = new RegExp("(?:X(?:X(?:V(?:I(?:I?I)?)?|X(?:I(?:I?I)?)?|I(?:[VX]|I?I)?)?|V(?:I(?:I?I)?)?|I(?:[VX]|I?I)?)?|V(?:I(?:I?I)?)?|I(?:[VX]|I?I)?)");
            if(regex.test(input))
            {
                $('#convertorForm').submit();
                return true;
            }
            else
            {
                errorMessage("Invalid Input. Please check it out. (Only IVXLCDM Characters are allowed in Roman Numerals).")
                return false;
            }
        }
    });


});

function errorMessage(message)
{
    document.getElementById("errorid").innerHTML = message;
    document.getElementById("errorid").style.display = 'block';
}
