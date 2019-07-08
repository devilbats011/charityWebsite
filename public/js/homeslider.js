
const Buttons  = Array.from(document.getElementsByClassName('dots_panel')[0].children); //ClassName
const ArrowLeft = document.getElementsByClassName('arrowLeft')[0];
const ArrowRight = document.getElementsByClassName('arrowRight')[0];
const Images = Array.from(document.getElementById('header').getElementsByTagName('figure')); //TagName
const smokescreen = document.getElementById('smokescreen');
const TEXT_IMAGE = document.getElementById('TEXT_IMAGE');


console.log(slider.tajuk[0]);
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n)
{
  var i;
  var slides = Images;
  var dots = Buttons;
  var curtainscreen = smokescreen;
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++)
  {

  	curtainscreen.style.opacity="1"; 
  	slides[i].style.display = "none"; 
  	TEXT_IMAGE.style.display = "none"; 
    slides[slideIndex-1].style.background = `url(${slider.gambar[slideIndex-1]}`;
    curtainscreen.style.transition = "0.6s"; 
    setTimeout(()=>{ 
      curtainscreen.style.opacity="0";
      slides[slideIndex-1].style.display = "block"; 
      TEXT_IMAGE.children[0].innerHTML = slider.tajuk[slideIndex-1];
      TEXT_IMAGE.children[1].innerHTML = slider.content[slideIndex-1];
  		TEXT_IMAGE.style.display = "block"; 
     	
  	  },600);
  }
}

