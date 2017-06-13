<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

    @if(Session::has('LoginMeg'))
        <p>{!! Session::get('LoginMeg') !!} </p>
    @endif

        <form  action ="" name="Login" method="POST">
            <input type="hidden" name = "_token" value="{!! csrf_token() !!}"  />
            <table border="2">
                <tbody>
                    <tr>
                        <td>UserName</td>
                        <td><input type="text" name="userName" value="" /></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" value="" /></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Login" name="login" /></td>
                        <td><input type="reset" value="Reset" name="reset" /></td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>