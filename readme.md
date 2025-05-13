# Sorting Algorithms in PHP

Este proyecto contiene implementaciones en PHP 8 de tres algoritmos de ordenamiento clásicos junto con sus pruebas unitarias. Aquí encontrarás una explicación rápida de cada uno, su complejidad y ejemplos de uso.

## Tabla de contenidos

- [Insertion Sort](https://chatgpt.com/c/6822b379-2868-8009-a8ef-4aff65273448#insertion-sort)
    
- [Bubble Sort](https://chatgpt.com/c/6822b379-2868-8009-a8ef-4aff65273448#bubble-sort)
    
- [QuickSort](https://chatgpt.com/c/6822b379-2868-8009-a8ef-4aff65273448#quicksort)
    
- [Cómo ejecutar las pruebas](https://chatgpt.com/c/6822b379-2868-8009-a8ef-4aff65273448#como-ejecutar-las-pruebas)
    

---

## Insertion Sort

**Definición**  
Recorre el arreglo de izquierda a derecha e inserta cada elemento en la posición correcta dentro de la porción ya ordenada.

**Complejidad**

|Caso|Tiempo|Espacio|
|---|---|---|
|Mejor|O(n)|O(1)|
|Promedio|O(n²)|O(1)|
|Peor|O(n²)|O(1)|

**Uso recomendado**  
Listas pequeñas (<= 50 elementos) o casi ordenadas. Es estable, in‑place y fácil de implementar.

**Llamada desde el código**

```php
use App\Sorting;

$arr = [9, 5, 1, 4, 3];
Sorting::insertion($arr);
print_r($arr); // [1, 3, 4, 5, 9]
```

---

## Bubble Sort

**Definición**  
Realiza pasadas repetidas sobre el arreglo, "burbujeando" el valor mayor (o menor) hacia el final mediante intercambios adyacentes.

**Complejidad**

|Caso|Tiempo|Espacio|
|---|---|---|
|Mejor*|O(n²)|O(1)|
|Promedio|O(n²)|O(1)|
|Peor|O(n²)|O(1)|
|*Se puede optimizar ligeramente si se detecta que ya está ordenado.|||

**Uso recomendado**  
Mayormente didáctico; rara vez se utiliza en producción por su baja eficiencia.

**Llamada desde el código**

```php
use App\Sorting;

$arr = [7, 2, 9, 4];
Sorting::bubble($arr);
print_r($arr); // [2, 4, 7, 9]
```

---

## QuickSort

**Definición**  
Algoritmo "divide y vencerás" que elige un pivote, particiona elementos menores y mayores, y ordena recursivamente cada parte.

**Complejidad**

|Caso|Tiempo|Espacio (pila)|
|---|---|---|
|Mejor|O(n log n)|O(log n)|
|Promedio|O(n log n)|O(log n)|
|Peor|O(n²)|O(n)|

**Uso recomendado**  
Ordenamiento general: uno de los métodos más rápidos en la práctica cuando se elige un buen pivote.

**Llamada desde el código**

```php
use App\Sorting;

$sorted = Sorting::quick([5, 3, 8, 4, 2]);
print_r($sorted); // [2, 3, 4, 5, 8]
```

---

## Cómo ejecutar las pruebas

1. Instala dependencias:
    
    ```bash
    composer install
    ```
    
2. Lanza PHPUnit con el script ya configurado:
    
    ```bash
    composer test
    ```
    
    Deberías ver algo como:
    
    ```
    PHPUnit 10.x by Sebastian Bergmann and contributors.
    .......                                                             7 / 7 (100%)
    
    Time: 00:00.xxx, Memory: 6.00 MB
    
    OK (7 tests, 14 assertions)
    ```
    

> **Nota**: todas las implementaciones se encuentran en `src/Sorting.php` y las pruebas en `tests/SortingTest.php`. Si quieres profundizar o añadir nuevos algoritmos, sigue la misma estructura.

---

# Stack (Pila)

## Definición

Una **pila** es una estructura de datos que sigue el principio **LIFO** (_Last In, First Out_), lo que significa que el último elemento en entrar es el primero en salir.

## Operaciones principales

|Operación|Descripción|Complejidad Big O|
|---|---|---|
|`push()`|Inserta un elemento en la cima|O(1)|
|`pop()`|Elimina y retorna el elemento cima|O(1)|
|`peek()`|Muestra el elemento de la cima|O(1)|
|`isEmpty()`|Verifica si la pila está vacía|O(1)|
|`size()`|Retorna la cantidad de elementos|O(1)|
|`clear()`|Vacía la pila completamente|O(1)|

## Ejemplo de uso

```php
use DataStructures\Stack;

$stack = new Stack();
$stack->push("uno");
$stack->push("dos");
echo $stack->pop(); // dos
```

## Casos de uso comunes

- Deshacer operaciones en un editor de texto
    
- Recorrido de árboles
    
- Validación de expresiones con paréntesis
    
- Evaluación de expresiones postfijas (notación polaca inversa)
    

## Pruebas unitarias

Este repositorio incluye un archivo de pruebas con PHPUnit para garantizar el funcionamiento correcto de la clase `Stack`.

```bash
./vendor/bin/phpunit tests/StackTest.php
```

## Requisitos

- PHP 8.0+
    
- PHPUnit 9+