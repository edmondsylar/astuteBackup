<!-- EXTERNAL JAVASCRIPT -->
<script type="text/javascript">
    function calculateCheckin() {
        
//         var name = document.getElementById("new-document-name").value;
         var length = 9;
         var map = "";
         
//        if(document.getElementById("new5").checked === true){
//             var map = document.getElementById("new5").value;
//         }else{
//             var map = null;
//         }
         for (i = 1; i < length; i++) { 
            if(document.getElementById("new"+i).checked === true){
                 map += document.getElementById("new"+i).value + ",";
            }
         
//            var map += document.getElementById("new"+i).value + ",";
            }
         
//         document.getElementById('new-map').value = name;
         document.getElementById('mapping').value = map;
         
//         for (i = 0; i < cars.length; i++) { 
//                text += cars[i] + "<br>";
//            }
//        var checkin = document.getElementById("checkin").value;
//        var checkout = document.getElementById("checkout").value;
//        var fee = document.getElementById("roomfee").value;
//        var discount = document.getElementById("discount").value;
//        var vat = document.getElementById("vat").value;
//
//        var oneDay = 24 * 60 * 60 * 1000;
//        var firstDate = new Date(checkin);
//        var secondDate = new Date(checkout);
//        var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime()) / (oneDay)));
//
//        var diffmsg = "";
//        var totalfee = "";
//        var totalamount = "";
//        if (diffDays == 0 || diffDays == 1) {
//            diffmsg = 1 + ' day';
//            totalfee = fee;
//            totalamount = totalfee - discount;
//        } else if (diffDays > 1) {
//            diffmsg = diffDays + ' days';
//            totalfee = diffDays * fee;
//            totalamount = totalfee - discount;
//        }
//
//
//        document.getElementById('totalfee').value = totalfee;
//        document.getElementById("totaldays").value = diffmsg;
//        document.getElementById("totalamount").value = totalamount;
//        if (totalfee > 0) {
//            document.getElementById("discount").readOnly = false;
//            var percent = (discount / totalfee) * 100 + '%';
//            document.getElementById("percent").value = percent;
//        } else {
//            document.getElementById("discount").value = "";
//            document.getElementById("percent").value = "";
//            document.getElementById("discount").readOnly = true;
//        }

    }

//    function calculateCheckin2() {
//        var totalfee = document.getElementById("totalfee").value;
//        var discount = document.getElementById("discount").value;
//        var vat = document.getElementById("vat").value;
//
//        var totalamount = totalfee - discount;
//        var percent = (discount / totalfee) * 100 + '%';
//
//        document.getElementById("totalamount").value = totalamount;
//        document.getElementById("percent").value = percent;
//    }
</script>