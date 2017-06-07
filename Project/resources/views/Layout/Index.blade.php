<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>AnhDuong</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <p> Day la trang index </p>
        
        <table border="1">
            <thead>
                <tr>
                    <th>Manager</th>
                    <th>Register</th>
                    <th>Statistic</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <a href={!! url('/Manager') !!} > Manager </a> </td>
                    <td> <a href= {!! url('/Register')!!}> Register </a> </td>
                    <td> <a href={!! url('/Statistic')!!} > Statistic </a> </td>
                </tr>
            </tbody>
        </table>

    </body>
</html>