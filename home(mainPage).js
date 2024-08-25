let slideIndex = 0;
let iconCart=document.querySelector('.icon-cart');
let body=document.querySelector('body');
let closeCart=document.querySelector('.close');
let listProductHTML=document.querySelector('.product-container');
let listCartHTML=document.querySelector('.listCart');
let iconCartSpan=document.querySelector('icon-cart span');




let listProducts=[];      
let carts=[];
showSlides();

// cart
iconCart.addEventListener('click',()=>{
     body.classList.toggle('showCart')
});
closeCart.addEventListener('click',()=>{
    body.classList.toggle('showCart')
});
//making and then showing information of products in html 
// const addDataToHTML=()=>{
//     listProductHTML.innerHTML='';
//     if(listProducts.length>0){
//         listProducts.forEach(product=>{
//             let newProduct=document.createElement('div');
//             newProduct.classList.add('item');
//             newProduct.dataset.id=product.id;
//             newProduct.innerHTML= `
//             <img src="${product.image}" alt="">
//             <h2>${product.name}</h2>
//            <div class="price">${product.price}</div>
//             <button class="addCart">
//                افزودن به سبد خرید
//             </button>`;
//             listProductHTML.appendChild(newProduct);
//         })
//     }
// }

//function that will add products by clicking button add to cart
listProductHTML.addEventListener('click',(event)=>{
    let positionClick=event.target;
    if(positionClick.classList.contains('card-btn')){
        let product_id=positionClick.parentElement.dataset.id;
        addToCart(product_id);
    }
})

const addToCart=()=>{
    let positionThisProductInCart=carts.findIndex((value)=> value.product_id==product_id);
    if(carts.length<=0){
        carts=[
            {
                product_id:product_id,
                quantity:1,
            }
        ]
    }else if(positionThisProductInCart<0){
        carts.push({
            prodect_id:prodect_id,
            quantity:1
        })
    }else{
        carts(positionThisProductInCar).quantity=carts(positionThisProductInCar).quantity+1;
    }
    addCartToHTML();
    addCartToMemory();
}
//when we refresh the page , datas also stay and don't destroy.
const addCartToMemory=()=>{
    localStorage.getItem('cart',JSON.stringify(carts));
}
const addCartToHTML=()=>{
    listCartHTML.innerHTML='';
    let totalQuantity=0;
    if(carts.length>0){
        carts.forEach(cart=>{
            totalQuantity= totalQuantity + cart.quantity;
            let newCart=document.createElement('div');
            newCart.classList.add('item');
            newCart.dataset.id = cart.prodect_id;
            let positionProduct=listProducts.findIndex((value)=>value.id==cart.prodect_id);
            let info=listProducts[positionProduct];
            newCart.innerHTML=`
            <div class="image">
               <img src="${info.image}" alt="">
            </div>
           <div class="name">
            ${info.name} 
            </div>
           <div class="totalPrice">
            ${info.price * cart.quantity}
            </div>
           <div class="quantity">
               <span class="minus"><</span>
               <span>${cart.quantity}</span>
               <span class="plus">></span>
           </div>` ;
            listCartHTML.appendChild(newCart);
        })
    }
    iconCartSpan.innerText=totalQuantity;
}
listCartHTML.addEventListener('click',(event)=>{
    let positionClick=event.target;
    if(positionClick.classList.contains('minus') || positionClick.classList.contains('plus')){
        let product_id = positionClick.parentElement.dataset.id;
        let type = 'minus';
        if(positionClick.classList.contains('plus')){
            type = 'plus';
        }
        changeQuantity(product_id, type);
    }
})
const changeQuantity=(product_id, type)=>{
    let positionItemInCart = carts.findIndex((value)=> value.prodect_id == product_id);
    if(positionItemInCart>=0){
        switch (type) {
            case 'plus':
                carts[positionItemInCart].quantity = carts[positionItemInCart].quantity + 1;
                break;
        
            default:
                let valueChange = carts[positionItemInCart].quantity - 1;
                if(valueChange>0){
                    carts[positionItemInCart].quantity = valueChange; 
                }else{
                    carts.splice(positionItemInCart,1);
                }
                break;
        }
    }
    addCartToMemory();
    addCartToHTML();
}
const initApp=()=>{
    //get data from json file
    fetch('products.json')
    .then(response => response.json())
    .then(data => {
        listProducts= data;
        addDataToHTML();

        //get data from memory
        if(localStorage.getItem('cart')){
            carts=JSON.parse(localStorage.getItem('cart'));
            addCartToHTML();
        }
    })

}

initApp();




//slide show of meno products (man , woman and childich clothes)
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function functionMeno(){
    document.getElementById("Slideshow-meno-products").classList.toggle("show");
      
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.classification1')) {
      var dropdowns = document.getElementsByClassName("Slideshow-meno-products");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }









// slide show of pictures (man & woman)
function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}