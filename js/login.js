function validate(form)
{
    if (validName(form[0].value) && checkNull(form[1].value))
    {
        alert("VALID");
        //and do valid stuff here
    }
}

function validName(name)
{
    var pattern = /\w,\s\w/;
    return (pattern.test(name));
    
}

function checkName(name)
{
    if (validName(name.value))
        $(name).css('background-color', 'DarkSeaGreen');
    else if (name.value === '')
        $(name).css('background-color', 'white');
    else
        $(name).css('background-color', 'LightCoral');
        
    return false;
}

function checkNull(input)
{
    if (input.value === '')
        $(input).css('background-color', 'white');
}
