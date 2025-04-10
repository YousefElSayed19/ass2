const closeCart = document.querySelector(".delete");

const cart  = document.querySelector(".cart");

const cards  = document.querySelector(".cards");

const checkOut  = document.querySelector(".checkOut");

const shodow  = document.querySelector(".shodow");

const cartIcon  = document.querySelector(".cartIcon");

const numberOfProduct  = document.querySelector(".numberOfProduct");


let arr = []

if (localStorage.getItem("products") == "[]"){
    cards.innerHTML = `
        <h1 class="noItem"> No Item To Show </h1>
    `
}else{
    if (localStorage.getItem("products") != null  ){
        let array=JSON.parse(localStorage.getItem("products"))
        arr=array.map((el)=>{
            return el;
        })
        additem(arr);
        console.log(localStorage.getItem("products") != "[]");
    }
}


numberOfProduct.innerHTML = arr.length;

closeCart.onclick=()=>{
    cart.classList.add("close");
    cart.classList.remove("open");
    shodow.style.left="-1700px";
}
cartIcon.onclick=()=>{
    cart.classList.remove("close");
    cart.classList.add("open");
    shodow.style.left="0";
}
function error(){
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "This Served not available now In This Website",
        footer: '<a href="#">Why do I have this issue?</a>'
    });
}

function additem(arr){
    cards.innerHTML='';
    numberOfProduct.innerHTML = 0;
    arr.map((product,ind)=>{
        cards.innerHTML+= `
                <div class="card" id="${ind}"> 
                <div class="img">
                    <img src=${product.img} alt="">
                </div>
                <div class="text">
                    <p class="name">${product.name}</p>
                    <p>
                        $<s>${product.price1}</s>
                        $<span>${product.price1}</span>
                    </p>
                    <div class="icons">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <i class="fa-solid fa-trash" onclick='deletItem(${ind})'></i>
                    </div>
                </div>
            </div>
        `
    })
    cards.innerHTML += `
    <h1 class='totalPrice'> Total = $ ${getTotalPrice(arr)}  <button class='checkOut' onclick='error()'> CheckOut </button> </h1>
    `
    numberOfProduct.innerHTML = arr.length;
}

function getProducts(id){
    let card    = document.getElementById(id) ;
    let img     = card.children[0].children[0].src ;
    let name    = card.children[1].children[0].innerHTML ;
    let price1  = card.children[1].children[1].children[0].innerHTML ;
    let price2  = card.children[1].children[1].children[1].innerHTML ;
    let product={
        img,
        name,
        price1,
        price2,
    }
    arr.push(product)
    localStorage.setItem("products",JSON.stringify(arr))
    additem(arr)
    done()
}
function getTotalPrice(arr){
    let total=0;
    arr.map((product)=>{
        total +=  parseFloat(product.price2)
    })
    return total.toFixed(3)
}

function deletItem(id){
    let newArr=[]
    console.log(id);
    arr.map((product,ind)=>{
        return id != ind ? newArr.push(product) : null
    })
    localStorage.setItem("products",JSON.stringify(newArr))
    let array=JSON.parse(localStorage.getItem("products"))
        arr=array.map((el)=>{
            return el;
        })
    additem(arr)
    noItem()
}

function noItem(){
    if(localStorage.getItem("products") == "[]"){
        cards.innerHTML = `
            <h1 class="noItem"> No Item To Show </h1>
        `
    }
}

function done(){
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1000,
        timerProgressBar: true,
        didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
    });
    Toast.fire({
    icon: "success",
    title: "Signed in successfully"
    });
}