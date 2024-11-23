const mysql = require("mysql2");

const db = mysql.createPool({
  host: "localhost",
  user: "root", // Replace with your database username
  password: "yourpassword", // Replace with your database password
  database: "sustanify", // Replace with your database name
});

module.exports = db;