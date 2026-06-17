let count = 0;

function addToCart(productName)
{
    count++;

    document.getElementById("cart-count").innerHTML =
    "Cart Items: " + count;

    let cartList =
    document.getElementById("cart-items");

    let item =
    document.createElement("li");

    item.innerHTML = productName;

    cartList.appendChild(item);
}

function placeOrder()
{
    if(count === 0)
    {
        alert("Your cart is empty!");
    }
    else
    {
        alert("Order Placed Successfully!");

        count = 0;

        document.getElementById("cart-count").innerHTML =
        "Cart Items: 0";

        document.getElementById("cart-items").innerHTML = "";
    }
}

function loginUser()
{
    let username =
    document.getElementById("username").value;

    let password =
    document.getElementById("password").value;

    if(username === "" || password === "")
    {
        alert("Please enter username and password!");
    }
    else
    {
        alert("Welcome " + username + "!");

        window.location.href = "index.html";
    }
}