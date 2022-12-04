const msgDiv = document.querySelector(".msg");

// $msgDiv.style.display = "block";
if(msgDiv)
{
    if(!msgDiv.classList.contains("imp"))
{
    $msgOpacityInterval = setInterval(() => {
        msgDiv.style.opacity= "60%";
        clearInterval($msgOpacityInterval);
    }, 5000);
    
    $msgCloseInterval = setInterval(() => {
        msgDiv.style.display = "none";
        msgDiv.style.opacity= "100%";
        clearInterval($msgCloseInterval);
    }, 8000);
}
}

// remove regional office pop-up msg
const office = document.querySelectorAll(".remove-btn");
const popMsg = document.querySelector(".pop-up");

popMsg.children[1].children[0].addEventListener('click' , (evt)=>{
    popMsg.style.display = "none";
})

popMsg.children[2].addEventListener('click' , (evt)=>{
    popMsg.style.display = "none";
    popMsg.children[1].children[0].value = "cancle";
})

office.forEach((value , index)=>{
    value.children[1].addEventListener('click' , (evt) =>{
        popMsg.children[1].children[0].value = value.children[0].value;
        popMsg.style.display = "flex";
    })
});
