
document.addEventListener("DOMContentLoaded", function () {
    const contents = document.querySelectorAll(".mt");
    const showMoreButton = document.querySelectorAll(".show-more");
    const hidden = document.querySelectorAll(".hidden");

    contents.forEach((content, index) => {
        if (content.scrollWidth > content.clientWidth) {
            content.style.display = "block";
            console.log(index);
            
            showMoreButton[index].style.display = "block";
            showMoreButton[index].addEventListener("click", function () {
                content.style.width = "300px";
                content.style.textOverflow = "unset";
                content.style.overflow = "unset";
                content.style.whiteSpace = "unset";
                hidden[index].style.display = "block";
                console.log(hidden[index]);


                showMoreButton[index].style.display = "none";
            });

            hidden[index].addEventListener('click',()=> {
                content.style.width = "200px";
                content.style.textOverflow = "ellipsis";
                content.style.overflow = "hidden";
                content.style.whiteSpace = "nowrap";
                showMoreButton[index].style.display = "block";
                hidden[index].style.display = "none";
            });
        }
    });
});