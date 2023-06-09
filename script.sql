drop table cliente cascade constraints;

drop table funcionario cascade constraints;

drop table fornecimento cascade constraints;

drop table fornecedor cascade constraints;

drop table nota_fiscal cascade constraints;

drop table nota_fiscal_produto cascade constraints;

drop table historico_preco cascade constraints;

drop table produto cascade constraints;

drop table fornecimento cascade constraints;

CREATE TABLE cliente (
    cpf NUMBER(11) NOT NULL,
    nome_cliente VARCHAR2(30) NOT NULL,
    telefone_cliente VARCHAR2(14)
);

ALTER TABLE
    cliente
ADD
    CONSTRAINT cliente_pk PRIMARY KEY (cpf);

CREATE TABLE fornecedor (
    cnpj NUMBER(14) NOT NULL,
    nome_fornecedor VARCHAR2(30) NOT NULL,
    contato VARCHAR2(14) NOT NULL
);

ALTER TABLE
    fornecedor
ADD
    CONSTRAINT fornecedor_pk PRIMARY KEY (cnpj);

CREATE TABLE fornecimento (
    data_fornecimento DATE NOT NULL,
    fornecedor_cnpj NUMBER(14) NOT NULL,
    produto_id_produto NUMBER(10) NOT NULL
);

ALTER TABLE
    fornecimento
ADD
    CONSTRAINT formecimento_pk PRIMARY KEY (
        data_fornecimento,
        fornecedor_cnpj,
        produto_id_produto
    );

CREATE TABLE funcionario (
    id_funcionario NUMBER(10) NOT NULL,
    cpf NUMBER(11) NOT NULL,
    nome_funcionario VARCHAR2(30) NOT NULL,
    telefone_funcionario VARCHAR2(14),
    salario NUMBER(10, 2) NOT NULL,
    data_nascimento DATE NOT NULL
);

ALTER TABLE
    funcionario
ADD
    CONSTRAINT funcionario_pk PRIMARY KEY (id_funcionario);

ALTER TABLE
    funcionario
ADD
    CONSTRAINT funcionario__unv1 UNIQUE (cpf);

CREATE TABLE historico_preco (
    produto_id_produto NUMBER(10) NOT NULL,
    preco_antigo NUMBER(7, 2) NOT NULL,
    data_modificacao DATE NOT NULL
);

ALTER TABLE
    historico_preco
ADD
    CONSTRAINT historico_preco_pk PRIMARY KEY (preco_antigo, data_modificacao, produto_id_produto);

CREATE TABLE nota_fiscal (
    id_nota_fiscal NUMBER(10) NOT NULL,
    cliente_cpf NUMBER(11) NOT NULL,
    funcionario_id_funcionario NUMBER(10),
    data_emissao DATE NOT NULL
);

ALTER TABLE
    nota_fiscal
ADD
    CONSTRAINT nota_fiscal_pk PRIMARY KEY (id_nota_fiscal);

CREATE TABLE nota_fiscal_produto (
    nota_fiscal_id_nota_fiscal NUMBER(10) NOT NULL,
    produto_id_produto NUMBER(10) NOT NULL,
    quantidade NUMBER(10) NOT NULL,
    preco_vendido NUMBER(7, 2) NOT NULL
);

CREATE TABLE produto (
    id_produto NUMBER(10) NOT NULL,
    nome_produto VARCHAR2(30) NOT NULL,
    preco NUMBER(7, 2) NOT NULL,
    quant_estoque NUMBER(10)
);

ALTER TABLE
    produto
ADD
    CONSTRAINT produto_pk PRIMARY KEY (id_produto);

ALTER TABLE
    produto
ADD
    CONSTRAINT produto__un UNIQUE (nome_produto);

ALTER TABLE
    fornecimento
ADD
    CONSTRAINT formecimento_fornecedor_fk FOREIGN KEY (fornecedor_cnpj) REFERENCES fornecedor (cnpj);

ALTER TABLE
    fornecimento
ADD
    CONSTRAINT formecimento_produto_fk FOREIGN KEY (produto_id_produto) REFERENCES produto (id_produto) ON DELETE CASCADE;

ALTER TABLE
    historico_preco
ADD
    CONSTRAINT historico_preco_produto_fk FOREIGN KEY (produto_id_produto) REFERENCES produto (id_produto) ON DELETE CASCADE;

ALTER TABLE
    nota_fiscal
ADD
    CONSTRAINT nota_fiscal_cliente_fk FOREIGN KEY (cliente_cpf) REFERENCES cliente (cpf);

ALTER TABLE
    nota_fiscal
ADD
    CONSTRAINT nota_fiscal_funcionario_fk FOREIGN KEY (funcionario_id_funcionario) REFERENCES funcionario (id_funcionario);

--  ERROR: FK name length exceeds maximum allowed length(30)
ALTER TABLE
    nota_fiscal_produto
ADD
    CONSTRAINT nota_fiscal_produto_nota_fiscal_fk FOREIGN KEY (nota_fiscal_id_nota_fiscal) REFERENCES nota_fiscal (id_nota_fiscal) ON DELETE CASCADE;

ALTER TABLE
    nota_fiscal_produto
ADD
    CONSTRAINT nota_fiscal_produto_produto_fk FOREIGN KEY (produto_id_produto) REFERENCES produto (id_produto);

insert into
    cliente
values
    (10000, 'Yasmim Augusta', '(31)99587-4993');

insert into
    cliente
values
    (20000, 'Guilherme Augusto', '(31)12345-6789');

insert into
    cliente
values
    (30000, 'Pedro Veloso', '(31)11111-1111');

insert into
    cliente
values
    (40000, 'Luiz Leroy', '(31)98798-7987');

insert into
    cliente
values
    (50000, 'Evandrino', '(31)97070-7070');

insert into
    fornecedor
values
    (123456789, 'Fornecedor 1', '(11)99999-9999');

insert into
    fornecedor
values
    (987654321, 'Fornecedor 2', '(13)90800-1010');

insert into
    fornecedor
values
    (789101112, 'Fornecedor 3', '(31)3571-2456');

insert into
    fornecedor
values
    (082135610, 'Fornecedor 4', '(21)2187-0456');

insert into
    fornecedor
values
    (345345345, 'Fornecedor 5', '(31)99999-9999');

insert into
    funcionario
values
    (
        1,
        60000,
        'Funcionario 1',
        '(31)94002-8922',
        3000.00,
        '01/01/1999'
    );

insert into
    funcionario
values
    (
        2,
        70000,
        'Funcionario 2',
        '(31)94002-8922',
        2500.00,
        '02/02/2003'
    );

insert into
    funcionario
values
    (
        3,
        80000,
        'Funcionario 3',
        '(31)94002-8922',
        2750.00,
        '03/03/2000'
    );

insert into
    funcionario
values
    (
        4,
        90000,
        'Funcionario 4',
        '(31)94002-8922',
        2550.00,
        '04/04/2001'
    );

insert into
    funcionario
values
    (
        5,
        100000,
        'Funcionario 5',
        '(31)94002-8922',
        2600.00,
        '05/05/2001'
    );

insert into
    nota_fiscal
values
    (01, 10000, 1, '29/03/2023');

insert into
    nota_fiscal
values
    (02, 20000, Null, '02/04/2023');

insert into
    nota_fiscal
values
    (03, 30000, 5, '23/04/2023');

insert into
    nota_fiscal
values
    (04, 40000, 3, '10/05/2023');

insert into
    nota_fiscal
values
    (05, 50000, 1, '01/06/2023');

insert into
    produto
values
    (11, 'P�o de Queijo', 2.00, 15);

insert into
    produto
values
    (22, 'Coxinha', 3.50, 12);

insert into
    produto
values
    (33, 'Empada', 3.00, 9);

insert into
    produto
values
    (44, 'Suco', 1.50, 30);

insert into
    produto
values
    (55, 'Pastel', 4.20, 25);

insert into
    nota_fiscal_produto
values
    (01, 11, 2, 2.00);

insert into
    nota_fiscal_produto
values
    (01, 44, 2, 1.50);

insert into
    nota_fiscal_produto
values
    (02, 22, 3, 3.50);

insert into
    nota_fiscal_produto
values
    (03, 55, 10, 4.10);

insert into
    nota_fiscal_produto
values
    (04, 11, 1, 2.00);

insert into
    nota_fiscal_produto
values
    (05, 33, 4, 3.00);

insert into
    nota_fiscal_produto
values
    (05, 44, 4, 1.50);

insert into
    historico_preco
values
    (11, 1.50, '13/03/2013');

insert into
    historico_preco
values
    (11, 1.00, '13/10/2010');

insert into
    historico_preco
values
    (22, 2.50, '20/05/2015');

insert into
    historico_preco
values
    (33, 4.50, '22/12/2020');

insert into
    historico_preco
values
    (55, 7.00, '17/01/2021');

insert into
    fornecimento
values
    ('12/07/2022', 123456789, 11);

insert into
    fornecimento
values
    ('30/01/2023', 123456789, 44);

insert into
    fornecimento
values
    ('28/02/2023', 123456789, 22);

insert into
    fornecimento
values
    ('18/03/2023', 123456789, 33);

insert into
    fornecimento
values
    ('25/04/2023', 123456789, 11);