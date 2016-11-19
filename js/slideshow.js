var firstreel=new reelslideshow({
wrapperid: "myreel", //ID of blank DIV on page to house Slideshow
dimensions: [518, 270], //width/height of gallery in pixels. Should reflect dimensions of largest image
imagearray:[ 
["slideshow/d1.jpg"], //["image_path", "optional_link", "optional_target"]
["slideshow/d2.jpg"],
["slideshow/d8.jpg"],
["slideshow/4.jpg"],
["slideshow/d6.jpg"],
["slideshow/d7.jpg"],
["slideshow/d3.jpg"],
["slideshow/d9.jpg"],
["slideshow/d11.jpg"],
["slideshow/d12.jpg"],
["slideshow/d10.jpg"] //<!--no trailing comma after very last image element!-->
],
displaymode: {type:'auto', pause:5000, cycles:2, pauseonmouseover:true},
orientation: "v", //Valid values: "h" or "v"
persist: true, //remember last viewed slide and recall within same session?
slideduration: 2500 //transition duration (milliseconds)
})