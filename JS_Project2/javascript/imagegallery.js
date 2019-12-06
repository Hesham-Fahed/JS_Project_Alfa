
function openModalgallery(_src) {
  var modal = document.getElementById("myModal");
  console.log(_src);
  var img = _src;
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");

  modal.style.display = "block";
  modalImg.src = _src.src;
  captionText.innerHTML = _src.alt;


  var span = document.getElementsByClassName("close")[0];

  span.onclick = function () {
    modal.style.display = "none";
  }
}