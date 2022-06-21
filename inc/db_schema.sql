-- UoS Bus Database Schema
-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS uosbus;
-- Create the table for users
CREATE TABLE IF NOT EXISTS uosbus.users (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    fname VARCHAR(255) NOT NULL,
    lname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    is_admin BOOLEAN NOT NULL DEFAULT FALSE,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
-- Create the table for buses
CREATE TABLE IF NOT EXISTS uosbus.buses (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    bus_number VARCHAR(30) NOT NULL,
    bus_assigned BOOLEAN NOT NULL DEFAULT FALSE,
    bus_capacity INTEGER(100) NOT NULL,
    bus_created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);
-- Create the table for seats
CREATE TABLE IF NOT EXISTS uosbus.seats (
    bus_number VARCHAR(155) PRIMARY KEY NOT NULL,
    seat_booked VARCHAR(255) DEFAULT NULL
);
-- Create the table for routes
CREATE TABLE IF NOT EXISTS uosbus.routes (
    `id` int(100) NOT NULL AUTO_INCREMENT,
    `route_id` varchar(255) NOT NULL,
    `bus_no` varchar(155) NOT NULL,
    `route_cities` varchar(255) NOT NULL,
    `route_dep_date` date NOT NULL,
    `route_dep_time` time NOT NULL,
    `route_step_cost` int(100) NOT NULL,
    `route_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
-- Table structure for table `customers`
--
CREATE TABLE IF NOT EXISTS uosbus.customers (
    `id` int(100) NOT NULL AUTO_INCREMENT,
    `customer_id` varchar(255) NOT NULL,
    `customer_name` varchar(30) NOT NULL,
    `customer_phone` varchar(10) NOT NULL,
    `customer_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;