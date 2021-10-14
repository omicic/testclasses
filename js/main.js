let filepath = document.querySelector('.filepath');
let fileimage = document.querySelector('.fileimage');
//console.log(filepath);
filepath.onchange = evt => {
    const [file] = filepath.files
    if (file) {
        fileimage.src = URL.createObjectURL(file)
    }
  }
