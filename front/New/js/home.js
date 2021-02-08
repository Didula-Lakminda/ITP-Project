/*slide show start */
var x = 0;
var images = [];
var time = 2000;


images[0] = "../image/pizza.jpg";
images[1] = "../image/nooldes.jpg";
images[2] = "../image/chips.jpg";
images[3] = "../image/hilton.jpg";
images[4] = "../image/proms 1.jpg";


function changeImg() {
    document.slide.src = images[x];


    if (x < images.length - 1) {

        x++;
    } else {

        x = 0;
    }


    setTimeout("changeImg()", time);
}

window.onload = changeImg;

/*slide show end */