<?php
echo $setPassword = 'senha12345';
#
echo "<br>";
#
echo $CryptoPassword = password_hash($setPassword, PASSWORD_DEFAULT);
#
echo "<br>";
#
if (password_verify($setPassword, $CryptoPassword)) {
    #
    echo 'Senha Correta';
    #
    echo "<br>";
    #
} else {
    #
    echo 'Senha Incorreta';
    #
    echo "<br>";
    #
}
echo $password = base64_encode('Mi5tEri0@2023');
#
echo "<br>";
#
echo base64_decode($password);
