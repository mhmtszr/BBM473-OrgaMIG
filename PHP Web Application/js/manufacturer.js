$(document).ready(function(){
    initSelect();

    function initSelect()
    {
        $("select.manufacturer_city").change(function(){
            var e = document.getElementById('city');
            var selected = e.options[e.selectedIndex].value;

            $.ajax({
                type: "POST",
                url: "change_manufacturer.php",
                data: {
                    city: selected
                },
                success: function(data){
                    $('tbody').html(data);
                }
            });


        });
    }
});