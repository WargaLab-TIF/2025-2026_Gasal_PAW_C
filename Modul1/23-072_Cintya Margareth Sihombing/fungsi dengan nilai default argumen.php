<?php
function setHeight($minheight = 50) {   // membuat function dengan parameter $minheight, default = 50
  echo "The height is : $minheight <br>"; // mencetak teks + isi variabel
}

setHeight(350);   // memanggil function dengan argumen 350
setHeight();      //// will use the default value of 50  // tidak memberi argumen = pakai default 50
setHeight(135);   // memanggil function dengan argumen 135
setHeight(80);    // memanggil function dengan argumen 80
?>
