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



# Queue (Cola)

## Definición
Una **cola** es una estructura de datos que sigue el principio **FIFO** (*First In, First Out*), lo que significa que el primer elemento en entrar es el primero en salir.

## Operaciones principales

| Operación | Descripción | Complejidad Big O |
|---------------|----------------------------------------|-------------------|
| `enqueue()` | Inserta un elemento al final de la cola| O(1) |
| `dequeue()` | Elimina y retorna el primer elemento | O(1) |
| `peek()` | Muestra el primer elemento sin sacarlo | O(1) |
| `isEmpty()` | Verifica si la cola está vacía | O(1) |
| `size()` | Retorna el número de elementos | O(1) |
| `clear()` | Vacía la cola | O(1) |

## Ejemplo de uso

```php
use DataStructures\Queue;

$queue = new Queue();
$queue->enqueue("uno");
$queue->enqueue("dos");
echo $queue->dequeue(); // uno
```

## Casos de uso comunes

- Impresión de documentos
- Procesamiento por lotes
- Sistemas de mensajería
- Control de tareas en sistemas operativos

## Pruebas unitarias

Este repositorio incluye pruebas automatizadas con PHPUnit para asegurar el correcto funcionamiento de la clase `Queue`.

bash
CopiarEditar

`./vendor/bin/phpunit tests/QueueTest.php`

## Requisitos

- PHP 8.0+
- PHPUnit 9+## Casos de uso comunes

- Impresión de documentos
- Procesamiento por lotes
- Sistemas de mensajería
- Control de tareas en sistemas operativos

## Pruebas unitarias

Este repositorio incluye pruebas automatizadas con PHPUnit para asegurar el correcto funcionamiento de la clase `Queue`.

bash
CopiarEditar

`./vendor/bin/phpunit tests/QueueTest.php`

## Requisitos

- PHP 8.0+
- PHPUnit 9+

----


# Linked List (Lista Enlazada)

## Definición

Una **lista enlazada** es una estructura de datos lineal donde cada elemento (nodo) contiene un valor y una referencia al siguiente nodo en la secuencia.

## Operaciones principales

|Operación|Descripción|Complejidad Big O|
|---|---|---|
|`insertAtBeginning()`|Inserta un nodo al inicio|O(1)|
|`insertAtEnd()`|Inserta un nodo al final|O(n)|
|`remove()`|Elimina el nodo que contiene cierto valor|O(n)|
|`contains()`|Verifica si un valor está en la lista|O(n)|
|`toArray()`|Devuelve la lista como arreglo|O(n)|
|`size()`|Retorna el número de nodos|O(1)|
|`isEmpty()`|Verifica si la lista está vacía|O(1)|

## Ejemplo de uso

```php
use DataStructures\LinkedList;

$list = new LinkedList();
$list->insertAtBeginning("C");
$list->insertAtBeginning("B");
$list->insertAtBeginning("A");
print_r($list->toArray()); // ["A", "B", "C"]
```

## Casos de uso comunes

- Implementación de pilas y colas
    
- Manejo de memoria eficiente sin realocación
    
- Representación de grafos
    
- Almacenamiento de datos dinámicos
    

## Pruebas unitarias

Este repositorio incluye pruebas con PHPUnit para verificar la funcionalidad de la clase `LinkedList`.

```bash
./vendor/bin/phpunit tests/LinkedListTest.php
```

## Requisitos

- PHP 8.0+
    
- PHPUnit 9+



-----


# HashMap (Mapa de Hash / Diccionario)

## Definición

Una **HashMap** es una estructura de datos que permite almacenar pares clave-valor, permitiendo un acceso extremadamente rápido a los valores mediante su clave.

## Operaciones principales

|Operación|Descripción|Complejidad Big O promedio|
|---|---|---|
|`set()`|Asigna un valor a una clave|O(1)|
|`get()`|Obtiene el valor asociado a una clave|O(1)|
|`has()`|Verifica si la clave existe|O(1)|
|`delete()`|Elimina una clave y su valor|O(1)|
|`keys()`|Devuelve todas las claves almacenadas|O(n)|
|`values()`|Devuelve todos los valores almacenados|O(n)|

## Ejemplo de uso

```php
use DataStructures\HashMap;

$map = new HashMap();
$map->set("nombre", "Mario");
$map->set("edad", 30);
echo $map->get("nombre"); // Mario
```

## Casos de uso comunes

- Tablas de búsqueda
    
- Índices en bases de datos
    
- Representación de datos tipo JSON
    
- Contadores de frecuencia
    

## Pruebas unitarias

Este repositorio incluye pruebas con PHPUnit para validar el comportamiento de la clase `HashMap`.

```bash
./vendor/bin/phpunit tests/HashMapTest.php
```

## Requisitos

- PHP 8.0+
    
- PHPUnit 9+

-----

# Binary Search Tree (Árbol Binario de Búsqueda)

## Definición

Un **árbol binario de búsqueda (BST)** es una estructura de datos jerárquica donde cada nodo tiene como máximo dos hijos. Para cada nodo, los valores en el subárbol izquierdo son menores y en el subárbol derecho son mayores que el valor del nodo.

## Operaciones principales

|Operación|Descripción|Complejidad Big O promedio|
|---|---|---|
|`insert()`|Inserta un nuevo valor|O(log n)|
|`contains()`|Verifica si un valor existe en el árbol|O(log n)|
|`inOrderTraversal()`|Devuelve los valores ordenados|O(n)|

## Ejemplo de uso

```php
use DataStructures\BinarySearchTree;

$bst = new BinarySearchTree();
$bst->insert(10);
$bst->insert(5);
$bst->insert(15);

print_r($bst->inOrderTraversal()); // [5, 10, 15]
```

## Casos de uso comunes

- Estructuras jerárquicas ordenadas
    
- Implementaciones de diccionarios y conjuntos
    
- Algoritmos de búsqueda y recorrido
    

## Pruebas unitarias

Este repositorio incluye pruebas con PHPUnit para verificar el comportamiento de la clase `BinarySearchTree`.

```bash
./vendor/bin/phpunit tests/BinarySearchTreeTest.php
```

## Requisitos

- PHP 8.0+
    
- PHPUnit 9+



------

# MinHeap (Montículo mínimo)

## Definición

Un **MinHeap** es una estructura de datos basada en árbol binario donde el valor de cada nodo es menor o igual que los valores de sus hijos. El valor mínimo siempre está en la raíz.

## Operaciones principales

|Operación|Descripción|Complejidad Big O|
|---|---|---|
|`insert()`|Agrega un nuevo elemento al heap|O(log n)|
|`extractMin()`|Elimina y retorna el valor mínimo|O(log n)|
|`peek()`|Retorna el valor mínimo sin eliminarlo|O(1)|
|`isEmpty()`|Verifica si el heap está vacío|O(1)|
|`size()`|Retorna el número de elementos en el heap|O(1)|

## Ejemplo de uso

```php
use DataStructures\MinHeap;

$heap = new MinHeap();
$heap->insert(10);
$heap->insert(4);
$heap->insert(7);
echo $heap->extractMin(); // 4
```

## Casos de uso comunes

- Implementación de colas de prioridad
    
- Algoritmo de Dijkstra
    
- Simulaciones con eventos ordenados cronológicamente
    
- Scheduling de procesos en sistemas operativos
    

## Pruebas unitarias

Incluye pruebas con PHPUnit para asegurar el comportamiento correcto de `MinHeap`.

```bash
./vendor/bin/phpunit tests/MinHeapTest.php
```

## Requisitos

- PHP 8.0+    
- PHPUnit 9+


------


# Graph (Grafo)

## Definición

Un **grafo** es una estructura de datos que consiste en un conjunto de nodos (vértices) conectados por enlaces (aristas). Puede ser dirigido o no dirigido, y puede ser representado mediante listas de adyacencia.

## Operaciones principales

|Operación|Descripción|Complejidad Big O|
|---|---|---|
|`addVertex()`|Añade un nuevo nodo al grafo|O(1)|
|`addEdge()`|Conecta dos vértices (bidireccionalmente)|O(1)|
|`hasEdge()`|Verifica si existe una conexión entre dos nodos|O(n)|
|`getAdjacencyList()`|Devuelve toda la estructura de conexión|O(1)|
|`depthFirstTraversal()`|Recorre el grafo en profundidad desde un nodo|O(V + E)|

## Ejemplo de uso

```php
use DataStructures\Graph;

$graph = new Graph();
$graph->addEdge("A", "B");
$graph->addEdge("A", "C");
print_r($graph->depthFirstTraversal("A")); // ["A", "B", "C"]
```

## Casos de uso comunes

- Redes sociales
    
- Sistemas de navegación (rutas)
    
- Algoritmos de búsqueda (BFS, DFS)
    
- Análisis de dependencias
    

## Pruebas unitarias

Este repositorio incluye pruebas automatizadas para verificar el correcto comportamiento de `Graph`.

```bash
./vendor/bin/phpunit tests/GraphTest.php
```

## Requisitos

- PHP 8.0+
- PHPUnit 9+

