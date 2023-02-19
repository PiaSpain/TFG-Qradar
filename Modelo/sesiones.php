<?php
if (session_status() !== PHP_SESSION_ACTIVE){ // id !=0 ya hay sesion
session_start(); // inicie la sesion
}

#session_status() se usa para devolver el estado de la sesión actual
#PHP_SESSION_DISABLED si las sesiones están deshabilitadas.
#PHP_SESSION_NONE si las sesiones están habilitadas, pero no existe ninguna.
#PHP_SESSION_ACTIVE si las sesiones están habilitadas, y existe una.
#session_start() - Iniciar una nueva sesión o reanudar la existente
?>