<html>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>

<body>
<script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js "></script>
<script src="script.js"></script>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <h1 class="navbar-brand mb-0 h1">Cyclist detes</h1>
  </div>
</nav>

<div id = 'leftTable'>
    <form method="get" id="details">
        <table style="border: 1px solid black;">
            <tr>
                <td><label for="country_1">Country 1</label></td>
                <td>
                    <input name="country_1" type="text" class="larger" id="country_1" value="USA" size="5" />
                </td>
            </tr>
            <tr>
                <td><label for="country_2">Country 2</label></td>
                <td>
                    <input name="country_2" type="text" class="larger" id="country_2" value="UKR" size="5" />
                </td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" id="submit" class="larger" /></td>
            </tr>
        </table>
        </table>
    </form>
    <div id="serverResponse"></div>
</div>

<div id='rightTable'>
    <div id="bigTable"></div>
</div>
</body>

</html>