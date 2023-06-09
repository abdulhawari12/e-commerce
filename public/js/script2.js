$(document).ready(function(){
const flash = $(".box-modal").data("flash");
if (flash) {
Swal.fire({
  icon: 'success',
  title: flash,
  showConfirmButton: true,
  timer: 3000
})
}
$('#profile').change(function(){
    var input = this;
    var imgdata = $("#img").data("g");
    var url = $(this).val();
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext ==
    "jpeg" || ext == "jpg" || ext == "webp")) 
     {
        var reader = new FileReader();

        reader.onload = function (e) {
           $('#img').attr('src', e.target.result);
           $('#picture').attr('value', e.target.result);
        }
       reader.readAsDataURL(input.files[0]);
    }
  });
})