$(document).ready(function(){
    $('.myTab a ').click(function (e) {
        e.preventDefault();
        alert('foo');
        $(this).tab('show');
    });
});
