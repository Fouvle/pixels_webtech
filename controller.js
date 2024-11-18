const db = require("../models/db");

// Fetch all sustainability criteria
const getCriteria = (req, res) => {
  const query = "SELECT * FROM sustainability_criteria";
  db.query(query, (err, results) => {
    if (err) {
      console.error("Error fetching criteria:", err);
      return res.status(500).json({ error: "Database query failed" });
    }
    res.json(results);
  });
};

// Fetch all recognized certifications
const getCertifications = (req, res) => {
  const query = "SELECT * FROM recognized_certifications";
  db.query(query, (err, results) => {
    if (err) {
      console.error("Error fetching certifications:", err);
      return res.status(500).json({ error: "Database query failed" });
    }
    res.json(results);
  });
};

module.exports = { getCriteria, getCertifications };