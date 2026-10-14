<?php

require_once __DIR__ .'/../src/validaciones.php';

$casosNombre = [
    ["Nombre válido: Teclado", "Teclado", true],
    ["Nombre vacío", "", false],
    ["Nombre con espacios", "   ", false],
    ["Nombre válido: Mouse", "Mouse", true]
];

$casosCantidad = [
    ["Cantidad válida: 10", 10, true],
    ["Cantidad inválida: 0", 0, false],
    ["Cantidad negativa: -5", -5, false],
    ["Cantidad no numérica: 'abc'", "abc", false]
];

$correctas = 0;
$fallidas = 0;

echo "=== PRUEBAS DE NOMBRE ===\n";
foreach ($casosNombre as [$descripcion, $entrada, $esperado]) {

    $obtenido = validarNombreProducto($entrada);

    if ($obtenido === $esperado) {
        echo " - $descripcion\n";
        $correctas++;
    
    } else {
        echo "FAIL - $descripcion\n";
        echo " Esperado: ". var_export($esperado, true) . "\n";
        echo " Obtenido: ". var_export($obtenido, true) . "\n";
        $fallidas++;
    }
}

echo "\n=== PRUEBAS DE CANTIDAD ===\n";
foreach ($casosCantidad as [$descripcion, $entrada, $esperado]) {

    $obtenido = validarCantidadProducto($entrada);

    if ($obtenido === $esperado) {
        echo " - $descripcion\n";
        $correctas++;
    
    } else {
        echo "FAIL - $descripcion\n";
        echo " Esperado: ". var_export($esperado, true) . "\n";
        echo " Obtenido: ". var_export($obtenido, true) . "\n";
        $fallidas++;
    }
}

// Extraer solo las entradas usadas en cada grupo de pruebas
$entradasNombre   = array_map(fn($caso) => var_export($caso[1], true), $casosNombre);
$entradasCantidad = array_map(fn($caso) => var_export($caso[1], true), $casosCantidad);

echo "\n---RESUMEN---\n";
echo "Total de nombre: " . count($casosNombre) . "\n";
echo "Total de cantidad: " . count($casosCantidad) . "\n";
echo "Correctas: $correctas\n";
echo "Fallidas: $fallidas\n";

echo "\n---DETALLE DE ENTRADAS USADAS---\n";
echo "Entradas de nombre:   [" . implode(', ', $entradasNombre) . "]\n";
echo "Entradas de cantidad: [" . implode(', ', $entradasCantidad) . "]\n";


exit($fallidas > 0 ? 1 : 0);