$(document).ready(function() {
   $("#submitConvert").on('click',function(e){
        var numbersType = $("select[name='toNumber']").val();
        if(numbersType == "Arabic")
        {
            var input = $('#roman-txt').val();
            var regex = new RegExp("^M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$");
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
