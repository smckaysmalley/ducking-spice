function validate(form)
{
    console.log(form[0].value+' '+ form[1].value);
}

function checkName(name)
{
    var pattern = /\w,\s\w/;
    if (pattern.test(name.value))
        $(name).css('background-color', 'DarkSeaGreen');
    else if (name.value === '')
        $(name).css('background-color', 'white');
    else
        $(name).css('background-color', 'LightCoral');
}

function checkNull(input)
{
    if (input.value === '')
        $(input).css('background-color', 'white');
}
