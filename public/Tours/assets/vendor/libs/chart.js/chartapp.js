$(document).ready(function(){
$.ajax({
            url:"http://localhost/admin/data.php",
            method:"GET",
            success:function(data) {
                console.log(data);
                var dayno = [];
                var boardingno = [];

                for(var i in data) {
                    dayno.push("")
                }
            }







});

});