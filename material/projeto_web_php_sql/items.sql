# Criar a Tabela no Azure SQL

Execute no Azure SQL Database:

CREATE TABLE Items (
    Id INT PRIMARY KEY IDENTITY(1,1),
    Nome NVARCHAR(100),
    Descricao NVARCHAR(255)
);