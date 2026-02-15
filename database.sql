
CREATE DATABASE IF NOT EXISTS sistema_gerenciamento
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE sistema_gerenciamento;

-- ========================================
-- TABELA: fornecedores
-- ========================================

CREATE TABLE fornecedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    cnpj VARCHAR(20) NOT NULL UNIQUE,
    email VARCHAR(150) NOT NULL,
    telefone VARCHAR(20),
    status ENUM('ativo', 'inativo') DEFAULT 'ativo',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ========================================
-- TABELA: produtos
-- ========================================

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    descricao TEXT,
    codigo_interno VARCHAR(50) NOT NULL UNIQUE,
    status ENUM('ativo', 'inativo') DEFAULT 'ativo',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ========================================
-- TABELA: produto_fornecedor (N:N)
-- ========================================

CREATE TABLE produto_fornecedor (
    produto_id INT NOT NULL,
    fornecedor_id INT NOT NULL,

    PRIMARY KEY (produto_id, fornecedor_id),

    CONSTRAINT fk_produto
        FOREIGN KEY (produto_id)
        REFERENCES produtos(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    CONSTRAINT fk_fornecedor
        FOREIGN KEY (fornecedor_id)
        REFERENCES fornecedores(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);



CREATE INDEX idx_produto_id ON produto_fornecedor(produto_id);
CREATE INDEX idx_fornecedor_id ON produto_fornecedor(fornecedor_id);
