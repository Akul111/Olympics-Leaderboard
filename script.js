 const regex = /^[A-Z]{3}$/;

    $(document).ready(function () {
    $("form").submit(function (event) {
        event.preventDefault();
        const country_1Value = $(event.target).find("#country_1").val();
        const country_2Value = $(event.target).find("#country_2").val();
        console.log(country_1Value);
        console.log(country_2Value);

        if(regex.test(country_1Value) && regex.test(country_2Value)){
            let country1 = $("#country_1").val();
            let country2 = $("#country_2").val();

            $.get("simplecompare.php", { country_1: country1, country_2: country2 }, function (responseData) {
                $("#serverResponse").html(responseData);
            });
        }

        else {
            $("#serverResponse").html("Please enter a valid ISO ID");
        }
    });
});

    $(document).ready(function () {
    let responseData2;
    $("form").submit(function (event) {
    event.preventDefault();
    $.get("criterion.php", function (responseData) {

    responseData2 = JSON.parse(responseData);
    let len = responseData2.length;
    let insertedHtml = "<table border=1 id = 'allCountryTable'>";
    insertedHtml += "<tr>" +
    "<th>Rank</th>" +
    "<th>Country</th>" +
    "<th><button id='sortByGold'>Gold Medals</button></th>" +
    "<th><button id='sortByCyclist'>No. Cyclist</button></th>" +
    "<th><button id='sortByAge'>Average age</button></th>" +
    "</tr>";

    let prebiousNoOfGold = responseData2[0].gold;
    for (let i = 0; i < len; i++) {
    let countryname = responseData2[i].country_name;
    let gold = responseData2[i].gold;
    let noOfCyclist = responseData2[i].cyclistCount;
    let age = responseData2[i].avgAge;



    insertedHtml += "<tr>" +
    "<td align='center'>" + (i + 1) + "</td>" +
    "<td align='center'>" + countryname + "</td>" +
    "<td align='center'>" + gold + "</td>" +
    "<td align='center'>" + noOfCyclist + "</td>" +
    "<td align='center' >" + Math.round(age) + "</td></tr>";
}

    insertedHtml += "</table>";
    $("#bigTable").html(insertedHtml);


    $("#sortByGold").click(function () {


    let allCountryTableCopy = $("#allCountryTable");
    let rows = allCountryTableCopy.find("tr").toArray();


    rows.sort(function (a, b) {
    let firstGoldtemp = parseInt($(a).find("td:eq(2)").text());
    let secondGoldtemp = parseInt($(b).find("td:eq(2)").text());
    return secondGoldtemp - firstGoldtemp;
});


    let rank = 1;
    let previousCountry = null;
    $.each(rows, function (index, row) {
    let firstColumn = $(row).find("td:first-child");
    let gold = parseInt($(row).find("td:eq(2)").text());
    if (gold < previousCountry) {
    rank = rank + 1;
}
    firstColumn.text(rank);
    previousCountry =gold;
});

    $.each(rows, function (index, row) {
    allCountryTableCopy.append(row);
});
});


    $("#sortByCyclist").click(function () {
    let allCountryTableCopy = $("#allCountryTable");
    let rows = allCountryTableCopy.find("tr").toArray();

    rows.sort(function (a, b) {
    let firstCyclistNo = parseInt($(a).find("td:eq(3)").text());
    let secondCyclistNo = parseInt($(b).find("td:eq(3)").text());
    return secondCyclistNo - firstCyclistNo;
});

    let rank = 1;
    let previousCountry = null;
    $.each(rows, function (index, row) {
    let firstColumn = $(row).find("td:first-child");
    let noOfCyclist = parseInt($(row).find("td:eq(3)").text());
    if (noOfCyclist < previousCountry) {
    rank = rank + 1;
}
    firstColumn.text(rank);
    previousCountry =noOfCyclist;
});



    $.each(rows, function (index, row) {
    allCountryTableCopy.append(row);
});
});



    $("#sortByAge").click(function () {
    let allCountryTableCopy = $("#allCountryTable");
    let rows = allCountryTableCopy.find("tr").toArray();

    rows.sort(function (a, b) {
    let firstAge = parseInt($(a).find("td:eq(4)").text());
    let secondAge = parseInt($(b).find("td:eq(4)").text());
    return firstAge - secondAge;
});


    let rank = 1;
    let previousCountry = null;
    $.each(rows, function (index, row) {
    let firstColumn = $(row).find("td:first-child");
    let avg = parseInt($(row).find("td:eq(4)").text());
    if (avg > previousCountry) {
    rank = rank + 1;
}
    firstColumn.text(rank);
    previousCountry = avg;
});

    $.each(rows, function (index, row) {
    allCountryTableCopy.append(row);
});
});
});







});
});

