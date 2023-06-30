const bar = document.getElementById('bar')
const close = document.getElementById('close')
const nav = document.getElementById('navbar')

if (bar) {
  bar.addEventListener('click', () => {
    nav.classList.add('active')
  })
}
if (close) {
  close.addEventListener('click', () => {
    nav.classList.add('active')
  })
}

var mainImage = document.getElementById('mainImg')
var smallImages = document.querySelectorAll('.small-img')

smallImages.forEach(function (smallImage) {
  smallImage.addEventListener('click', function () {
    var tempSrc = mainImage.src
    mainImage.src = smallImage.src
    smallImage.src = tempSrc
  })
})
