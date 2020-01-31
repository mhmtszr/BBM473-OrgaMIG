$(document).ready(function(){
    initType();

    function initType()
    {
        $('#season').hide();
        $('#amountOfMilkSugar').hide();

        $("select.type-selector").change(function(){
            var e = document.getElementById('type');
            var selected = e.options[e.selectedIndex].value;

            if (selected == "FoodOfAnimalOrigin"){
                $('#meatType').show();
                $('#season').hide();
                $('#amountOfMilkSugar').hide();
            }

            else if (selected == "FruitsAndVegetables"){
                $('#season').show();
                $('#meatType').hide();
                $('#amountOfMilkSugar').hide();
            }

            else if (selected == "MilkAndMilkProducts"){
                $('#amountOfMilkSugar').show();
                $('#season').hide();
                $('#meatType').hide();
            }
        });
        
    }
});