// Get the modal element
var modal;
var btn = document.querySelectorAll('.open-modal');
btn.forEach(function (el) {
    el.addEventListener('click', function () {
        modal = document.getElementById(this.dataset.open);
        modal.style.display = "block";
    });
});
var span = document.getElementsByClassName("close-modal");
for (let i = 0; i < span.length; i++) {
    span[i].onclick = function () {
        modal.style.display = "none";
    }
}
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
//ajax para guardar los valores del select sin enviar el form
// function saveOption() {
//     var select = document.getElementById("set_name");
//     var selectedOption = select.options[select.selectedIndex].value;
//     $.ajax({
//       type: "POST",
//       url: "save.php",
//       data: { option: selectedOption }
//     });
//   }