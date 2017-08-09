$(document).ready(function () {
    var fileItems = Array();
    var tableItems = Array();
    var fullTableItems = Array();
    var xValues = [];
    var yValues = [];
    var flag=true;
    var monthTotals = Array();
    var jsonFile = jQuery.getJSON(
        'proxy.php',
        function (data) {
            jsonitems = data;
            var tableContainer = document.getElementById('visualTable');
            var fileItems= [];
            $.each(jsonitems, function(index, value){
                fullTableItems.push([value.name, value.amount, value.date]);
                var month = value.date.substr(0,7);
                // month+= "-15";
                if(monthTotals[month] === undefined){
                    monthTotals[month] = value.amount;
                }
                else{
                    monthTotals[month] += value.amount;
                }
            });
            for(var key in monthTotals){
                tableItems.push([key, Math.round((monthTotals[key] + 0.00001)*100)/100]);
                fileItems.push({x:key, y:monthTotals[key], label:{content: Math.round((monthTotals[key] + 0.00001)*100)/100}});
            }
            $('#dataTable').DataTable({
                data: tableItems,
                columns: [
                    {title: "Month"},
                    {title: "Total Amount"}
                ]
            });
            $('#dataFullTable').DataTable({
                data: fullTableItems,
                columns: [
                    {title: "Name"},
                    {title: "Amount"},
                    {title: "Date"}
                ]
            });
            var container = document.getElementById('visualization');

            var date = new Date();
            var today = date.toISOString();
            var oneWeekAgo = new Date();
            oneWeekAgo.setFullYear(oneWeekAgo.getFullYear() - 1);
            var dataset = new vis.DataSet(fileItems);
            var options = {
                // style:'bar',
                // barChart: {width:50, align:'center'}, // align: left, center, right
                // legend: {right: {position: 'top-left'}},
                drawPoints: {style: 'circle',
                    size: 10
                },
                start: oneWeekAgo,
                end: today
            };
            var graph2d = new vis.Graph2d(container, dataset, options);
            // $('.vis-line-graph').find('text').hide();
            // graph2d.on('changed', function (params) {
            //     flag=true;
            //     $('.vis-line-graph').find('text').hide();
            // });
            graph2d.on('click', function (params) {
                if(flag) {
                    flag = false;
                    $('.vis-line-graph').find('text').show();
                }else{
                    flag = true;
                    $('.vis-line-graph').find('text').hide();
                }
            });
    });
});

function validateForm(){
    var newName = document.forms["mainForm"]["newName"].value;
    var newAmt = document.forms["mainForm"]["newAmt"].value;
    var newDate = document.forms["mainForm"]["newDate"].value;
    if (newName == "") {
        alert("Name must be filled out");
        return false;
    }
    if (newAmt == "" || !isNumber(newAmt)) {
        alert("Amount must be filled out and should be a number");
        return false;
    }
    if (newDate == "") {
        alert("Date must be filled out");
        return false;
    }
}
function isNumber(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}


