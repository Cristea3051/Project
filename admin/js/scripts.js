
$(document).ready(function() {
  $('#summernote').summernote();
});


$(document).ready(function() {
  $('#selectAllCheckBoxes').click(function(event){
if(this.checked){
$('.checkBoxes').each(function(){
this.checked = true;
});


}else {

  $('.checkBoxes').each(function(){
    this.checked = false;
    });

}

  });
});


