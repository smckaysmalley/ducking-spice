function findUser(person)
{
    var name = person[0].value.split(', ');
    
    var user = 
    {
        firstname : name[1],
        lastname  : name[0],
        password  : person[1].value
    };
    
    console.log(user.firstname+' '+user.lastname+' '+user.password);
}

function validate(form)
{
    console.log("yep");
    if (validName(form[0].value) && checkNull(form[1].value))
    {
        //and do valid stuff here!
        findUser(form);   
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
