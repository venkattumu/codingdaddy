$(function(){
    $('.search').keyup(function(){
        var search = $(this).val();
        $.post('http://localhost/codingdaddy/codingdaddy/core/ajax/search.php', {serach:search}, function(data){
             $('.search-result').html(data); 
         });
    });
});