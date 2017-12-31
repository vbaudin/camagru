const deletePic = (e) => {
    const mainDiv = e.path[2]
    mainDiv.remove()
}
const picHandler = () => {
    const deleteBtns = Array.from(document.querySelectorAll("#delete"))
    const pushToGalBtns = Array.from(document.querySelectorAll("#pushToGalBtn"))
    deleteBtns.forEach(deleteBtn => {
        deleteBtn.addEventListener('click', deletePic)
    })
    pushToGalBtns.forEach(pushToGalBtn => {
        pushToGalBtn.addEventListener('click', sendPic)
    })
}
