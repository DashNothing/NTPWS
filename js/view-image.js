const photoOverlay = document.querySelector(".photo-overlay");
const photo = document.querySelector(".photo-container img");

const close = document.querySelector(".close");

const gallleryPhotos = document.querySelectorAll(".photo-gallery img");


gallleryPhotos.forEach(photo => {
  photo.addEventListener("click", () => {
    showPhotoOverlay(photo.src);
  });
});

close.addEventListener("click", closePhotoOverlay);

photoOverlay.addEventListener("click", function (e) {
  if (e.target != this)
    return;

  closePhotoOverlay();
});


function showPhotoOverlay(src) {
  photoOverlay.classList.add("show");
  photo.src = src;
  document.body.classList.add("noscroll");
}


function closePhotoOverlay() {
  photoOverlay.classList.remove("show");
  document.body.classList.remove("noscroll");
}