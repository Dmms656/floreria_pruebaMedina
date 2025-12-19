Dylan Medina
18-12-2025

Link del Git: https://github.com/Dmms656/floreria_pruebaMedina.git

Diseño 
1.  Tabla Pedidos en PostgresSQL
## Tabla: Pedidos

| Campo        | Tipo PostgreSQL   |
|--------------|-------------------|
| id           | bigserial (PK)    |
| cliente      | varchar(100)      |
| telefono     | varchar(20)       |
| direccion    | varchar(150)      |
| tipo_arreglo | varchar(100)      |
| fecha_entrega| date              |
| estado       | varchar(20)       |
| notas        | text              |
| archived_at  | timestamp         |
| created_at   | timestamp         |
| updated_at   | timestamp         |


2 ¿Se puede eliminar registros?

No, los registros no se eliminan físicamente del sistema se usa un borrado lógico para conservar el historial de los pedidos es decir aquellos que se han decido archivar por una razón u otra. Sin embargo, en caso de errores dentro de los archivados y como caso casi expecional existe la función de borrado permanente. 

