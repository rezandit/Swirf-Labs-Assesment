CREATE TABLE IF NOT EXISTS employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    identification_number VARCHAR(50) NOT NULL,
    name VARCHAR(100) NOT NULL,
    place_of_birth VARCHAR(100),
    date_of_birth DATE NOT NULL,
    occupation ENUM('Unemployed', 'Programmer', 'Designer', 'Architect', 'Artist') NOT NULL,
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY unique_employee (identification_number, name)
);