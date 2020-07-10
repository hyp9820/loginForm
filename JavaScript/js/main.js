var t
$(document).ready(function(){
    $("#Add").click(function(){
        var num1 = document.getElementById("num1").value;
        var num2 = document.getElementById("num2").value;
        document.getElementById("result").value = parseFloat(num1) + parseFloat(num2);
    });
    $("#Sub").click(function(){
        var num1 = document.getElementById("num1").value;
        var num2 = document.getElementById("num2").value;
        document.getElementById("result").value = parseFloat(num1) - parseFloat(num2);
    });
    $("#Mul").click(function(){
        var num1 = document.getElementById("num1").value;
        var num2 = document.getElementById("num2").value;
        document.getElementById("result").value = parseFloat(num1) * parseFloat(num2);
    });
    $("#Div").click(function(){
        var num1 = document.getElementById("num1").value;
        var num2 = document.getElementById("num2").value;
        document.getElementById("result").value = parseFloat(num1) / parseFloat(num2);
    });
    $("#email").keyup(function(){
        const format = /\S+@\S+\.\S+/;
        var em = document.getElementById("email")
        if(format.test(em.value)){
            em.style.backgroundColor = "#baffbd";
        }
        else{
            em.style.backgroundColor = "#ffbaba";
        }
    });
    $("#start").click(function(){
        t = document.getElementById("time").value;
        showSlides()
    });
});
var slideIndex = 0;
function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    

    slides[slideIndex-1].style.display = "block";  
    setTimeout(showSlides, parseInt(t)); // Change image every 2 seconds
}