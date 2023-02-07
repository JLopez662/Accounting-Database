CREATE TABLE individuo
(
    SSN varchar(11),
    PRIMARY KEY(SSN)
);

CREATE TABLE empleados
(
    EID varchar(4),
    FirstName varchar(25),
    LastName varchar(64),
    User varchar(40),
    Pass varchar(40),
    PRIMARY KEY(EID)
);

CREATE TABLE registro
(
    ID varchar(4),
    PRIMARY KEY(ID)
);



CREATE TABLE demograficos
(
    ID varchar(4),
    Nombre varchar(64),
    NombreComercial varchar(64),
    Dir varchar(250),
    Tipo varchar(64),
    Patronal varchar(10),
    SSN varchar(11),
    Incorporacion date,
    Operaciones date,
    Industria varchar(60),
    NAICS int,
    Descripcion varchar(250),
    Contacto varchar(64),
    Telefono varchar(15),
    Celular varchar(15),
    DirFisica varchar(150),
    DirPostal varchar(150),
    Email varchar(64),
    Email2 varchar(64),
    CID varchar(25),
    MID varchar(25),
    PRIMARY KEY(ID),
    FOREIGN KEY (ID) REFERENCES registro(ID)
);

CREATE TABLE contributivos
(
    ID varchar(4),
    Nombre varchar(64),
    NombreComercial varchar(64),
    Estatal varchar(15),
    Poliza varchar(15),
    RegComerciante varchar(15),
    Vencimiento date,
    Choferil varchar(15),
    DeptEstado varchar(15),
    CID varchar(25),
    MID varchar(25),
    PRIMARY KEY(ID),
    FOREIGN KEY (ID) REFERENCES registro(ID)
);

CREATE TABLE identificacion
(
    ID varchar(4),
    Nombre varchar(64),
    NombreComercial varchar(64),
    Accionista varchar(64),
    SSNA varchar(11),
    Cargo varchar(25),
    LicConducir varchar(25),
    Nacimiento date,
    CID varchar(25),
    MID varchar(25),
    PRIMARY KEY(ID),
    FOREIGN KEY (ID) REFERENCES registro(ID)
);

CREATE TABLE administrativo
(
    ID varchar(4),
    Nombre varchar(64),
    NombreComercial varchar(64),
    Contrato date,
    Facturacion varchar(25),
    FacturacionBase varchar(12),
    IVU varchar(12),
    Staff varchar(64),
    StaffDate date,
    CID varchar(25),
    MID varchar(25),
    PRIMARY KEY(ID),
    FOREIGN KEY (ID) REFERENCES registro(ID)
);

CREATE TABLE pago
(
    ID varchar(4),
    Nombre varchar(64),
    NombreComercial varchar(64),
    BankClient varchar(64),
    Banco varchar(12),
    NumRuta varchar(10),
    NameBank varchar(25),
    TipoCuenta varchar(25),
    BankClientS varchar(64),
    BancoS varchar(12),
    NumRutaS varchar(10),
    NameBankS varchar(25),
    TipoCuentaS varchar(25),
    NameCard varchar(64),
    Tarjeta varchar(16),
    TipoTarjeta varchar(64),
    CVV varchar(3),
    Expiracion date,
    PostalBank varchar(60),
    NameCardS varchar(64),
    TarjetaS varchar(16),
    TipoTarjetaS varchar(64),
    CVVS varchar(3),
    ExpiracionS date,
    PostalBankS varchar(60),
    CID varchar(25),
    MID varchar(25),
    PRIMARY KEY(ID),
    FOREIGN KEY (ID) REFERENCES registro(ID)
);

CREATE TABLE confidencial
(
    ID varchar(4),
    Nombre varchar(64),
    NombreComercial varchar(64),
    UserSuri varchar(64),
    PassSuri varchar(64),
    UserEftps varchar(64),
    PassEftps varchar(64),
    PIN int,
    UserCFSE varchar(64),
    PassCFSE varchar(64),
    UserDept varchar(64),
    PassDept varchar(64),
    UserCofim varchar(64),
    PassCofim varchar(64),
    UserMunicipio varchar(64),
    PassMunicipio varchar(64),
    CID varchar(25),
    MID varchar(25),
    PRIMARY KEY(ID),
    FOREIGN KEY (ID) REFERENCES registro(ID)
);

CREATE TABLE fileRoom
(
    ID varchar(4),
    Nombre varchar(64),
    NombreComercial varchar(64),
    Dir varchar(250),
    PRIMARY KEY(ID),
    FOREIGN KEY (ID) REFERENCES registro(ID)
);
