const carousel = document.querySelector(".carousel"),
firstImg = carousel.querySelectorAll("img")[0],
arrowIcons = document.querySelectorAll(".wrapper i");


let isDragStart = false, prevPageX, prevScrollleft;
let firstImgWidth = firstImg.clientWidth+14;

arrowIcons.forEach(icon => {

	icon.addEventListener("click", () =>{
		carousel.scrollLeft += icon.id == "left" ? -firstImgWidth : firstImgWidth
	});
});

const dragStart = (e) => {
	isDragStart = true;
	prevPageX = e.pageX;
	prevScrollleft = carousel.scrollLeft;
} 

const dragging = (e) => {
	if (!isDragStart) return;
	e.preventDefault();
	let positionDiff = e.pageX - prevPageX;
	carousel.scrollLeft = prevScrollleft - positionDiff ;
}

const dragStop = () => {
	isDragStart = false;
}

carousel.addEventListener("mousemove", dragStart);
carousel.addEventListener("mousemove", dragging);
carousel.addEventListener("mouseup", dragStop);