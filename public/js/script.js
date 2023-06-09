const items = document.querySelectorAll(".nav-items");
for (let i = 0; i < items.length; i++) {
  if(items[i].href === location.href){
    items[i].classList.add("actived");
  }
}
function increaseCount(a, b) {
  var input = b.previousElementSibling;
  var value = parseInt(input.value, 10);
  const max = input.getAttribute("max");
  if(value < max){
  value = isNaN(value) ? 0 : value;
  value++;
  input.value = value;
  }
}

function decreaseCount(a, b) {
  var input = b.nextElementSibling;
  var value = parseInt(input.value, 10);
  if (value > 1) {
    value = isNaN(value) ? 0 : value;
    value--;
    input.value = value;
  }
}
function increment(a, b) {
  var input = b.previousElementSibling;
  var value = parseInt(input.value, 10);
  const max = input.getAttribute("max");
  if(value < max){
  value = isNaN(value) ? 0 : value;
  value++;
  input.value = value;
  }
}

function decrement(a, b) {
  var input = b.nextElementSibling;
  var value = parseInt(input.value, 10);
  if (value > 1) {
    value = isNaN(value) ? 0 : value;
    value--;
    input.value = value;
  }
}
var slideIndex = 0;
var slides = document.getElementsByClassName("slider")[0].getElementsByTagName("img");

showSlide(slideIndex);

function showSlide(n) {
  if (n < 0) {
    slideIndex = slides.length - 1;
  } else if (n >= slides.length) {
    slideIndex = 0;
  }

  for (var i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex].style.display = "block";
}

function changeSlide(n) {
  showSlide(slideIndex += n);
}

setInterval(function() {
  changeSlide(1);
}, 5000);
