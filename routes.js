const express = require("express");
const { getCriteria, getCertifications } = require("../controllers/criteriaController");

const router = express.Router();

// Route to fetch sustainability criteria
router.get("/", getCriteria);

// Route to fetch recognized certifications
router.get("/certifications", getCertifications);

module.exports = router;