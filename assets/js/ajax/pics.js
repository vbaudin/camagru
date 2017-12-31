const sendPic = (e) => {
    const canvas = e.path[2].childNodes[0]
    const xhr = new XMLHttpRequest()
    xhr.open("POST", 'http://localhost/camagru/index.php', true)
    //Send the proper header information along with the request
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                console.log('ok')
            } else {
                console.log('error with AJAX Request')
            }
        }
    }
    xhr.send(canvas.toDataURL('image/png')) 
}