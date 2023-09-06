<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
<link rel="stylesheet" href="style.css">
<script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js "></script>
<script src="script.js"></script>


<nav class="navbar sticky-top bg-body-tertiary" aria-label="Basic example">

    <h1>Cyclist details</h1>

    <div id='leftTable'>
        <form method="get" id="details">

            <table class="table table-borderless ">
                <tr>
                    <td><label for="country_1">Country 1</label></td>
                    <td>
                        <input name="country_1" type="text" class="larger" id="country_1" value="USA" size="5"/>
                    </td>

                    <td><label for="country_2">Country 2</label></td>
                    <td>
                        <input name="country_2" type="text" class="larger" id="country_2" value="UKR" size="5"/>
                    </td>

                    <td></td>
                    <td><input type="submit" id="submitButton" class="larger"/></td>
                </tr>
            </table>
        </form>


    </div>


    <div class=" btn-group">

        <button id="countryCompareButton" type="button" class="btn btn-primary">Country Compare</button>
        <button id="leaderboardButton" type="button" class="btn btn-primary">Leaderboard</button>

    </div>
</nav>


<div class="stadium "></div>


<div id="serverResponse"></div>


<!--<div id='rightTable'>-->
<div id="bigTable"></div>
</div>
</body>

</html>