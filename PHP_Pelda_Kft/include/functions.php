<?php

function hashPassword(string $password): string
{

//    return md5($password);
    return password_hash($password, PASSWORD_BCRYPT);
}

