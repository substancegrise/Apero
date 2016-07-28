(function ($) {
    

console.log('ici jquery')
    
$(function () {
    
    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });

 })

})(jQuery)

