const likes = Array.from(document.querySelectorAll('.like-btn'))
likes.forEach(like => {
    like.addEventListener('click', likesHandler)
})