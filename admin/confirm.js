


let btn = document.querySelectorAll("button")
btn.forEach((el) => {
    el.addEventListener("click", (ev) => {
        
        ev.preventDefault()

        const email = el.parentElement.parentElement.childNodes[3].textContent;
        const firstName = el.parentElement.parentElement.childNodes[1].textContent;
        const id = el.parentElement.parentElement.childNodes[0].textContent;
        const Sentdata = {
            id,
            email, 
            firstName
        } 
        fetch("confirm.php", {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify(Sentdata)
        })
        .then(res => res.json())
        .then(data => {
            console.log(data)
        }) 
        .catch(error => console.error("error", error));
    })


})






