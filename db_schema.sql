DROP DATABASE IF EXISTS ventas;
CREATE DATABASE IF NOT EXISTS ventas;
USE ventas;
CREATE TABLE productos(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	Idreferencia VARCHAR(255) NOT NULL,
	Nombre VARCHAR(255) NOT NULL,
	Laboratorio VARCHAR(255) NOT NULL,
	FechaVto DATE NOT NULL,
	existencia DECIMAL(5, 2) NOT NULL,
	FechaIngreso DATE NOT NULL,
	PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

CREATE TABLE ventas(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	fecha DATETIME NOT NULL,
	total DECIMAL(7,2),
	PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

CREATE TABLE productos_vendidos(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_producto BIGINT UNSIGNED NOT NULL,
	cantidad BIGINT UNSIGNED NOT NULL,
	id_venta BIGINT UNSIGNED NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY(id_producto) REFERENCES productos(id) ON DELETE CASCADE,
	FOREIGN KEY(id_venta) REFERENCES ventas(id) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

INSERT INTO productos(id, Idreferencia, Nombre, Laboratorio, FechaVto, existencia) 
VALUES
(1, '1', 'Guantes de latex', 'bayer', 01-06-2022, 100),
(2, '2', 'Tensiometro', 'Novartis', 01-04-2023, 100),
(3, '3', 'Gotero', 'Roche', 12-08-2023, 100),
(4, '4', 'Ropa desechable', 'GSK', 01-02-2023, 100),
(5, '5', 'Gasa', 'Sanofi', 24-10-2022, 100);

# Correcto
