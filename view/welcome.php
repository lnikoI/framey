<!DOCTYPE html>
<html>
    <head>
        <title>
            Welcome
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
                background-color: #ffffff;
                background-repeat: no-repeat;
                background-position: top left;
                background-attachment: fixed;
            }

            h1 {
                font-family: Arial, sans-serif;
                color: #000000;
                background-color: #ffffff;
            }

            p {
                font-family: Georgia, serif;
                font-size: 14px;
                font-style: normal;
                font-weight: normal;
                color: #000000;
                background-color: #ffffff;
            }
        </style>
    </head>
    <body>
        <h1>Welcome page</h1>
        <div>
            <table border="1px solid">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>

                <?php foreach ($data['users'] as $user): ?>
                    <tr>
                        <td><?php echo $user['name'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>