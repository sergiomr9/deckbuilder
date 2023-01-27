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
//script de live search

// $(document).ready(function(){
//     $('#search').keyup(function(){
//         var txt = $(this).val();
//         if(text != ''){
//             $.ajax({
//                 url:"index.php",
//                 method:"post",
//                 data:{search:txt},
//                 dataType:"text",
//                 success:function(data)
//                 {
//                     $('#card').html(data);
//                 }
//             })
//         }else{
//             $('#card').html('');
//             $.ajax({
//                 url:"index.php",
//                 method:"post",
//                 data:{search:txt},
//                 dataType:"text",
//                 success:function(data)
//                 {
//                     $('#card').html(data);
//                 }
//             })
//         }
//     });
// });