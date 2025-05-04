# Base de Datos de plata go api

## Entidades

### LOGIN
- `idlogin` **INT(PK)** 
- `idusuario` **INT(FK)**
- `usuario` **VARCHAR(20)**
- `password` **VARCHAR(20)**
- `nivel` **TINYINT** 1=> cliente , 2=>admin
- `estado` **TINYINT** 1=> activo , 0=> inactivo

### USUARIOS
- `idusuario` **INT(PK)**
- `nombres` **VARCHAR(50)**
- `apellidos` **VARCHAR(50)**
- `edad` **INT**
- `dni` **INT**
- `telefono` **INT**
- `ciudad` **VARCHAR(50)**
- `genero` **VARCHAR(50)**
- `email` **VARCHAR(100)**
- `fechaNac` **DATE**
- `nivel` **TINYINT  ** 0=>nuevo, 1=>bronce, 2=>plata, 3=>oro para hacer tipo competencia
- `puntaje` **TINYINT** puntaje total segun los retos que cumpla

### PREGUNTAS son pregunta que ayudaran a determinar su perfil social
- `idpreguntas`
- `pregunta`
- `peso`

### PERFIL_SOCIAL
- `idperfil`
- `nombre`
- `descripcion`
- `ponderado`

### CATEGORIA
- `idcategoria`
- `categoria` adolescente, puberto, joven
- `rangomenor` edad 18
- `rangomayor` edad 25
- ``

### cliente_detalles
- `idclientedetalle`
- `idclientes`
- `idcategoria`
- `idperfil`