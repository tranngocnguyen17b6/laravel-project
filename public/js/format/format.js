 $(document).ready(function(){
    $('#select-answer').trigger('change');
 })
 $('#select-answer').change( function(){
        var selected_option= $('#select-answer').val();
        if(selected_option==="form")
        {
            $('#other-input').hide()
            $('#fix').hide()
        }
        if(selected_option!=="form")
        {
            $('#other-input').show()
            $('#fix').show()
        }
        if(selected_option === "radio"||selected_option === "checkbox")
        {
            $('#create-radio').show()
        }
        if(selected_option !== "radio" && selected_option !=="checkbox" )
        {
            $('#create-radio').hide()
        }     
})
// .$(selector).click(function (e) { 
//     e.preventDefault();
    
// });
   
    
//  thêm câu trả lời bằng radio
var id=1;
$('#add-input').click(function () { 
    var count = $("#create-radio").find('.count-input').length;
    if (count >= 10) return $('#notification-limit').show();
    $('#create-input').append(
        `<div class="mb-10" number="stt-${++id}">
        <input form="my-form" name="answer_title[]" value="" class="input count-input" type="text">
        <button style="background-color: #e884f8" id="remove-input" type="submit" class="btn">削除</button>
        </div>
        <div class="clear-fix></div>"`
    );
    
});
console.log($(".count-input").length);
//xóa 1 câu trả lời trong input
$('#create-input').on('click', '#remove-input', function (e) {
    e.preventDefault();//tránh tình trạng cuộn lên đầu trang
    var stt= $(this).closest('div').attr('number');
    $('#create-input div').each(function(){
        if($(this).attr('number')==stt)
        {
            $(this).remove();
        }
    })
}); 



