Dylan Medina
18-12-2025


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


3. ¿Se puede eliminar registros?

No, los registros no se eliminan físicamente del sistema se usa un borrado lógico para conservar el historial de los pedidos es decir aquellos que se han decido archivar por una razón u otra. 

