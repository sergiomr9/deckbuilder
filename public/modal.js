document.addEventListener('DOMContentLoaded', function() {
    var btn = document.querySelectorAll('.imageButton');
    btn.forEach(function(el) {
        el.addEventListener('click', function(){
            var modalElement = document.querySelector(`#modal-${this.dataset.open}`);
            modalElement.style.display = "block";
        });
    });
    var span = document.getElementsByClassName("close-modal");
    for(let i = 0; i< span.length; i++){
        span[i].onclick = function() {
            modalElement.style.display = "none";
        }
    }
    window.onclick = function(event) {
        for(let i = 0; i< span.length; i++){
            var modalElement = document.querySelector(`#modal-${i+1}`);
            if (event.target == modalElement) {
                modalElement.style.display = "none";
            }
        }
    }
});
