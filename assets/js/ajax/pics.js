function ajaxPost(url, data) {
    const xhr = new XMLHttpRequest()
    xhr.open("POST", url, true)
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                console.log('ok')
            } else {
                console.log('error with AJAX Request')
            }
        }
    }
    xhr.send(data)
}

const sendPic = (e) => {
    const canvas = e.path[2].childNodes[0]
    ajaxPost('http://localhost/camagru/index.php', canvas.toDataURL('image/png'))
}

function likesHandler(e) {
    const id = e.path[2].childNodes[1].attributes.id.value.substring(4)
    if (this.classList.contains('islike')){
        this.classList.remove('islike')
        ajaxPost('http://localhost/camagru/gallery.php', `like=unlike&id=${id}`)
    }
    else {
        this.classList.add('islike')
        ajaxPost('http://localhost/camagru/gallery.php', `like=like&id=${id}`)
    }
}