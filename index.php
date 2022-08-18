<!DOCTYPE html>
<html>
<head>
    <title> CORS </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" crossorigin="anonymous"></script>
</head>
<body>
<header></header>

<center> <h1 style="color: red"> VERIFICADOR DE CORS </h1> </center>
<a href="https://github.com/Edsonjorgef1/simple-cors-checker" target="_blank"><img style="height:100px; width:100px; position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png" alt="Fork me on GitHub"></a>
<p></p>
<form id="idForm" method="post">
    <label for="url" class="form-label">Insert the URL and Check all the data below! Note: <b> Now only working for GET Methods</b> </label>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon3">http://examplesite.com/api/test</span>
        <input type="text" class="form-control" id="url" aria-describedby="basic-addon3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

<hr>
<h3 id="data"></h3>
<p id="list"></p>
<h4 id="error" style="color: red"></h4>


<script type="text/javascript">
    $('#idForm').submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        var url = $("#url").val();
        console.log("LINK: " + url)

        $.ajax({
            type: "GET",
            dataType: "json",
            url: url,
            success: function (data) {
                console.log(data);
                    $('#data').text('Response Success => ' + url);
                    $('#list').text(JSON.stringify(data));
            },
            error: function(error) {
                console.log(error)
                $('#data').text('Response Error => ' + url);
                $('#list').text("Blocked by CORS policy");
                $('#error').text('Consider opening your Console to check more');
            },
        });
    });
</script>

</body>
</html>

