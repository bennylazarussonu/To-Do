function strikeThrough(elem){
    if(elem.checked == true){
        const id = elem.id;
        const divElement = document.querySelector('div[strike="'+id+'"]');
        const childList = divElement.childNodes;
        const data = "<del style='color: red; height: 3px; transformation: .5s smooth'>"+childList[1].innerHTML+"</del>";
        childList[1].innerHTML = data;
    }else if(elem.checked== false){
        const id = elem.id;
        const divElement = document.querySelector('div[strike="'+id+'"]');
        const childList = divElement.childNodes;
        const childChildList = childList[1].childNodes;
        const data = childChildList[0].innerHTML;
        childList[1].innerHTML = data;
    }
}