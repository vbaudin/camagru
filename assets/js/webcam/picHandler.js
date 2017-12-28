const deletePic = (e) => {
    console.log(e.srcElement)
    e.srcElement.remove()
}
const picHandler = () => {
    const pics = Array.from(document.querySelectorAll("canvas"))
    pics.forEach(pic => {
        pic.addEventListener('click', deletePic)
    })
}
