function menuToggle() 
{
    document.getElementById("dropDownMenu").classList.toggle("show");
}
window.onclick = function(e) 
{
    if (!e.target.matches('.dropbtn')) 
    {
        var myDropdown = document.getElementById("dropDownMenu");
        if (myDropdown.classList.contains('show')) 
        {
            myDropdown.classList.remove('show');
        }
    }
}