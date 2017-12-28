const addFrame = (dataSrc) => {
    const img = document.createElement("img")
    const videoRender = document.querySelector('#video-render')
    img.classList.add('video-stream')
    img.setAttribute('src', dataSrc)
    img.setAttribute('id', 'img-frame')
    videoRender.appendChild(img)
}
  
const frameHandler = e => {
    const frames = Array.from(document.querySelectorAll('*[id^="frame"]'))
    const dataSrc = e.srcElement.getAttribute('data-src')
    const imgFrame = document.querySelector('#img-frame')
    if (imgFrame){
        imgFrame.remove()
    }
    if (e.srcElement.checked === true){
        frameImg.src = dataSrc
        frames.forEach(frame => frame.checked = false)
        e.srcElement.checked = true
        addFrame(dataSrc)
        takePicBtn.disabled = false
    }
    else{
        e.srcElement.checked = false
        frameImg.src = ''
        takePicBtn.disabled = true
    }
}

frames.forEach(frame => frame.addEventListener('change', frameHandler))