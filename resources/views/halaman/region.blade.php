<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar Dasar Ajax</title>
</head>
<body>
    <h1>Tutorial Ajax</h1>
    <div id="hasil1"></div>

    <select name="test1" id="test1">
        <option value="">pilih</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>

    <select name="test2" id="test2">
        <option value="1">berhasil</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>

    <script>
        function loadContent(){
            $(document).ready(function() 
            {
                $(#test1).select('hide');
            });

            /*
            var xhr = new XMLHttpRequest();
            var url = "https://api.github.com/users/petanikode";
            xhr.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    document.getElementById("hasil1").innerHTML = 'berhasil';
                }
            };
            xhr.open("GET", url, true);
            xhr.send();
            */
        }
    </script>
</body>
</html>