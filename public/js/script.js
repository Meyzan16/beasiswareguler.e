// // change gambar
function preview() {
  const file = document.querySelector(".foto");
  const fileLabel = document.querySelector(".custom-file-label");
  const imgPreview = document.querySelector(".img-preview");

  //tulisan label
  fileLabel.textContent = file.files[0].name;

  //ganti gambar
  const filefile = new FileReader();
  filefile.readAsDataURL(file.files[0]);

  filefile.onload = function (e) {
    imgPreview.src = e.target.result;
  };
}

// // change namafile
// function previewfile() {
//   const file = document.querySelector("#file");
//   const fotoLabel = document.querySelector(".custom-file-label");

//   //tulisan label
//   fotoLabel.textContent = file.files[0].name;
// }
