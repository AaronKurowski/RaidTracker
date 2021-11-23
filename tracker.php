<!DOCTYPE html>

<html>
    <head>
        <title>Raid Tracker</title>
        <link rel="stylesheet" href="styles.css">
        
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

        <script id="raid-template" type="text/javascript">
            
        </script>

        <script type="text/javascript">
            function loadRaids() {
                $.ajax({
                    url: 'processTracker.php',
                    method: 'POST',
                    async: false,
                    success: function(returnedData){
                        let data = JSON.parse(returnedData);

                        if(data.err == null) {
                            console.log(data);
                        }
                    }
                });
            }

            $(function() {
                loadRaids();
            });

        </script>

    </head>

    <body>
        <div id="main-wrapper">
            <div id="table-wrapper">
                <div id="title">Raid Tracker</div>
                <table>
                    <thead>
                        <!-- These Table headers need to be changeable and populated from the accociated array coming back-->
                        <tr>
                            <th>ONE</th>
                            <th>TWO</th>
                            <th>THREE</th>
                            <th>FOUR</th>
                            <th>FIVE</th>
                            <th>SIX</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>A</td>
                            <td>B</td>
                            <td>K</td>
                            <td>D</td>
                            <td>D</td>
                            <td>T</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <script src="app.js" type="text/javascript"></script>
    </body>
</html>