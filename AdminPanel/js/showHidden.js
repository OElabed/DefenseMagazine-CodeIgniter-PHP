function showHideDiv()
    {
        var divstyle = new String();
        divstyle = document.getElementById("div1").style.visibility;
        if(divstyle.toLowerCase()=="visible" || divstyle == "")
        {
            document.getElementById("div1").style.visibility = "hidden";
        }
        else
        {
            document.getElementById("div1").style.visibility = "visible";
        }
    } 