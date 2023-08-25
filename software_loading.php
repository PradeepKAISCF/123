<!DOCTYPE html>

<html>
    <head>
        <meta charset = "utf-8">
        <title>
            Eprom Fussion
        </title>
        <style>
            table, tr, th, td, caption {
                border: 1px solid #0d0d0d;
                font-family: 'Courier New', Courier, monospace;
                border-collapse: collapse;
                padding: 0.5rem;
            }
        </style>

    </head>

    <body>
        <h1>Software Loading</h1>
        <div>
            <form method="post">
                <table>
                    <tr>
                        <td>Name of the DDCS software
                            application</td>
                        <td>Dropdown from Version Control Module</td>
                    </tr>
                    <tr>
                        <td>Existing Version</td>
                        <td><input type="text" name = "existing_v" , id ="existing_v" ></td>
                    </tr>
                    <tr>
                        <td>New Version</td>
                        <td><input type="text" name = "new_v" , id ="new_v" ></td>
                    </tr>
                    <tr>
                        <td>List of Servers / Display Stations
                            where software loaded</td>
                        <td><input type="textarea" , name = 'listOfServers' id = 'listOfServers'></td>
                    </tr>
                    <tr>
                        <td>Date and time of modification
                            done</td>
                        <td><input type="date" , name = 'date', id = 'date' max="<?php echo date('Y-m-d'); ?>"></td>
                    </tr>
                </table>
                <p><button>Submit</button></p>
            </form>
        </div>
    </body>
</html>