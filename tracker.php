<!DOCTYPE html>

<html>
    <head>
        <title>Raid Tracker</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
        
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>

        <script id="raid-template" type="text/x-handlebars-template">
            <table>
                <thead>
                    <tr>
                        {{#each headers}}
                            <th>{{this}}</th>
                        {{/each}}
                    </tr>
                </thead>
                <tbody>
                    {{#each raids}}
                        <tr>
                            <td>{{ID}}</td>
                            <td>{{Name}}</td>
                            <td>{{Guild}}</td>
                            <td>{{'Completed On'}}</td>
                            <td>{{Wipes}}</td>
                            <td>{{'Clear Time'}}</td>
                        </tr>
                    {{/each}}
                </tbody>
            </table>
        </script>

        <script id="item-template">

        </script>

        <script type="text/javascript">
            function loadRaids() {
                $.ajax({
                    url: 'processTracker.php',
                    method: 'POST',
                    async: false,
                    success: function(returnedData){
                        let data = JSON.parse(returnedData);
                        console.log(returnedData);

                        if(data.error == null) {
                            let templateScript = $("#raid-template").html();
                            let template = Handlebars.compile(templateScript);
                            // let compiledHtml = template({"data": data});
                            let compiledHtml = template(data);
                            $("#table-wrapper").html(compiledHtml);
                        }
                        else {
                            $("#test-div").html("<center><h1 style='color:red'>" + data.error + "</h1></center>")
                        }
                    }
                });
            }

            $(function() {
                loadRaids();
            });

            Handlebars.registerHelper('each', function(context, options) {
                var ret = "";

                for(var i=0, j=context.length; i<j; i++) {
                    ret = ret + options.fn(context[i]);
                }

                return ret;
            });

        </script>

    </head>

    <body>
        <div id="main-wrapper">

            <div class="title-div">Raid Tracker</div>
            <div id="table-wrapper"></div>
        
        </div>

        <script src="app.js" type="text/javascript"></script>
    </body>
</html>