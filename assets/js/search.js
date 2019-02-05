$(function search(){
    $('.search').keyup(function(){
        var search = $(this).val();
        $.post('http://localhost/codingdaddy/core/ajax/search.php', {serach : search}, function(data){
             $('.search-result').html(data); 
         });
    });
});